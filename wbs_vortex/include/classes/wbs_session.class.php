<?

	class wbs_session {
	
		private $opens; //sessões abertas
		
		private $online; //usuarios online no WBS
		
		private $arquivos; //arquivos de sessão no diretorio
		
		private $diretorio; //diretorio da sessão
		
		private $destruidas;
		
		private $criadas;
		
		private $read_files; //arquivos lidos do diretorio
		
		private $wbs_sessions;
		
		private $sessions;
		
		private $empt_sessions;
		
	
		public function get_arraydir(){
		
			$cmd = 'ls -l /tmp';
			
			exec($cmd, $this->arquivos);
			
			return $this->arquivos;
			
		}
		
		public function oFill(){
				$this->arquivo = '';
				$rs = $this->get_arraydir($this->diretorio);
				foreach($rs as $k=>$v){
					$aux[$k] = explode(' ',$v);
					$z = $aux[$k];
					if ($aux[$k][3] != '') { 
						$this->arquivo[$k]['nome'] = $aux[$k][count($z)-1];
						$this->arquivo[$k]['hora'] = $aux[$k][count($z)-2];
						$this->arquivo[$k]['dia'] = $aux[$k][count($z)-3];
						$this->arquivo[$k]['mes'] = $aux[$k][count($z)-5];
						$this->arquivo[$k]['tamanho'] = $aux[$k][count($z)-6];
						$this->arquivo[$k]['usuario'] = $aux[$k][2];
						$this->arquivo[$k]['grupo'] = $aux[$k][3];
					}
				}
		
		}
		
		public function get_arquivos(){		
		
			unset($this->arquivo);
			
			$this->oFill();
			
			return $this->arquivo;
			
		}
		
		private function parse($value) {
		
			$aux = explode(':',$value,2);
			
			switch ($aux[0]) {
			
				case 'b' : {
				
					$rs = ($aux[1])?true:false;
				
				}; break;
				case 's' : {
				
					$a1 = explode(':',$value,2);
					$a2 = explode(':',$a1[1],2);
					$rs = $a2[1];
				
				}; break;
				case 'i' : {
					
					$a1 = explode(':',$value);
					$rs = $a1[1];
				
				};break;
				default : {
				
					$a1 = explode(':',$value);
					$rs = $a1[1];
					
				}; break;	
			}
			
			return $rs;
		
		}
		
		public function load_files(){
		
			$arq = $this->get_arquivos();
			
			foreach ($arq as $k => $v){
			
				$aux = explode('_',$v['nome']);
				
				$n = file('/tmp/'.$v['nome']);
				$aux_2 = explode(';', $n[0]);
				
				foreach ($aux_2 as $k1 => $v1){
					if (strpos($v1,'|')) { 
						$aux_2[$k1] = explode('|',$v1);
						$aux_2[$k1][1] = $this->parse($aux_2[$k1][1]);
						$we[$aux_2[$k1][0]]=$aux_2[$k1][1];
					}
				}
				$we['file_id'] = $aux[1];
				$this->sessions_filenames[] = $we;
			}
			return $this->sessions_filenames;
		
		}
				
		public function kill_session($id){
			exec('ls -l /tmp',$rs);
			foreach($rs as $k=>$v){
				$aux[$k] = explode(' ',$v);
				$z = $aux[$k];
				$tams[$k] = array('tamanho'=>$aux[$k][count($z)-6],'id'=>$aux[$k][count($z)-1]);
				
			}
			if(is_array($tams)) array_shift($tams);
			if(is_array($tams)) array_shift($tams);
			$tams=(is_array($tams))?$tams:array();	
			foreach ($tams as $k => $v) {
				$id2 = 'sess_'.$id;
				if ($v['id'] == $id2) {
					$aux = explode('_',$v['id']);
					SetCookie("PHPSESSID", $v['id'] , time()-3600, "/", "http://wbs-teste.maxxmicro.com.br", 0);
					$_COOKIE['PHPSESSID'] = $aux[1];
					session_start();
					session_destroy();
					session_unset();
				}
			}
		}
		
		public function kill_oldsessions(){
		
			
		
		}
		
		public function get_wbs_sessions(){
		
			$files = $this->load_files();
			
			foreach ($files as $k => $v) {

				if ($files[$k][0][0]=='WBS') {
					$this->wbs_sessions[$k] = $v;
				}
				
			}
					
			return $this->wbs_sessions;
		}
	
	}

?>
