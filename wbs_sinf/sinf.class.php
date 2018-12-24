<?php

	class sinf {
		
		private $host = ':c:/Sinf/Dados/sinf.fdb';
		private $lojafab = ':c:/Sinf/Dados/sinf.fdb';
		//private $lojafab = 'SINFLOJAFAB:c:/Sinf/Dados/sinf.fdb';
		//private $fabrica = 'SINFFABRICA:c:/Sinf/Dados/sinf.fdb';
		private $user = 'SYSDBA';
		private $pass = 'masterkey';
		
		public $res;
		
/*		public function sinf($emp) {
		
			if ($emp == 15) {
				$this->host = $this->lojafab;	
			} else {
				//$this->host = $fabrica;
				die('EMPRESA ERRADA');
			}
			
		}*/
		
		public function error($sql){
			echo '<div class="error">"'.ibase_errmsg().'" na pesquisa: <br>'.$sql.'<br></div>';
		}
		
		public function query($sql) {
			//echo SINF_HST.$this->host.'<br>';
			//echo $sql.'<br>';
			ibase_connect(SINF_HST.$this->host,$this->user,$this->pass);
			$this->res = ibase_query($sql) or die ($this->error($sql));
			
			return $this->res;
		}
		
		public function gera($sql) {
			return $this->fetch($this->query($sql));
		}
		
		public function fetch($res = '0'){
			if ($res=='0') $res = $this->res;
			return ibase_fetch_assoc($res);
		}
		
		public function show($sql){
			
			$res = $this->query($sql);
			echo '<table>';
			while ($a = $this->fetch($res)){
				echo '<tr>';
				foreach ($a as $k => $v) {
					echo '<td>'.$v.'</td>';
				}
			  	echo '</tr>';
			}
			echo '</table>';
		}
		
		public function insere_cliente($param){
			$sql = 'INSERT INTO FORCLI (';
			$fields = ''; 
			$values = '';
			foreach ($param as $field => $value) {
				$fields .= $field.',';
				$values .= (is_string($value))?'\''.$value.'\',':$value.',';
			}
			$sql .= substr($fields,0,-1).') VALUES ('.substr($values,0,-1).')';
			$this->query($sql);
		}
	}

?>