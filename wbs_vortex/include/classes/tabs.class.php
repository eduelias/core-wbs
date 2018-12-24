<?php

	class tabs {
		
		public $includes; // carrega as dependencias js da classe;
		
		public $data; //public $echodata; // Variável que carrega o codigo html das tabs;
		
		public $mod;
		
		public function tabs($mod, $ori = 'top'){
			
		
			$this->includes[] =  $str;
			$this->mod = $mod;
			$this->data[] = "<script type=\"text/javascript\">\r\nvar myTab".$mod." = new YAHOO.widget.TabView(\"demo".$mod."\", {orientation:\"".$ori."\"});\r\n myTab".$mod.".subscribe('beforeContentChange',WBS.wait.show); \r\n </script><div id=\"demo".$mod."\" class=\"yui-navset\"></div>";
		}
				
		public function addTab($conteudo, $label, $way = "false"){
			$i = count($this->data);
			$this->data[] = "<script> myTab".$this->mod.".addTab( new YAHOO.widget.Tab({label:'".iconv('utf-8','iso-8859-1',$label)."', dataSrc:'ajax_html.php?file=".encode($conteudo)."', cacheData:'".$way."', height:700, conteudo:'".$conteudo."'})); </script>";
		}
		
		public function setActive($ind){
			$this->data[] = "<script> myTab".$this->mod.".set('activeIndex',".$ind."); </script>";
		}
		
		public function get_dependencias(){
			$aux = '';
			if (is_array($this->includes)){
				foreach ($this->includes as $k => $v){
					$aux .= $v;
				}
			} else {
				$aux = $this->includes;
			}
			return $aux;
		}
		
		public function get_tabhtml(){
			$aux = '';
			if (is_array($this->data)){
				foreach ($this->data as $k => $v){
					$aux .= $v;
				}
			}
			return $aux;
		}
		
		public function show_tabs($ind = '0'){
			$this->data[] = "<script> onscreen.tab['".$this->mod."'] = 'myTab".$this->mod."' ;</script>";
			$this->data[] = "<script> myTab".$this->mod.".set('activeIndex',".$ind."); </script>";
			$this->data[] = "<script> myTab".$this->mod.".subscribe('beforeActiveTabChange', function(e) { if (!e.newValue.get('dataLoaded')) { WBS.wait.show(); };})</script>"; 
			
			echo $this->get_dependencias();
			
			echo $this->get_tabhtml();
		}
		
		public function gera_tab(){
			return $this->data;
		}
	}

?>