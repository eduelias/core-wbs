<?

	class layout {
	
		public $dependencias;
		
		public $saida;
		
		public function layout(){
		
			$this->saida[] = '';
			
		}	
		
		public function make_layout($hook = ''){
		
			//CARREGANDO CONFIGURAÇÕES DO OBJETO VINDAS COMO PARÂMETRO		
			$units = '{units:[';
			foreach ($this->units as $un) {
				$units .= $un->get_confs().',';
			}
			$units = substr($units, 0, -1);
			$units .= "]}\r\n";
			$layout_name = 'lay'.gera_str_rand(2);
			$this->saida[] = '<script> var '.$layout_name.' = new YAHOO.widget.Layout("'.$hook.'",'.$units.'); </script>'; 		
			$this->saida[] = '<script> '.$layout_name.'.on("render", function() { 
				'.$layout_name.'.getUnitByPosition("top").setStyle("zIndex",1);
				onscreen.topo = '.$layout_name.'.getUnitByPosition("top");
				onscreen.corpo = '.$layout_name.'.getUnitByPosition("center");
				onscreen.corpo.addClass(onscreen.color);
				YAHOO.example.onMenuBarReady();
				'.$layout.name.'.getUnitByPosition("center").addClass(onscreen.color);'."
				var loader = new YAHOO.util.YUILoader({base:'include/css'}); \r\n				
				loader.addModule({
					name:'estilo',
					type:'css',
					fullpath:'include/css/estilo.css',
					varName:'ECSS'
				});
			}); </script>';";	
			$this->saida[] = '<script> '.$layout_name.'.render(); loader.insert();</script>';
			$this->saida[] = "<style>
    .yui-skin-sam .yui-layout .yui-layout-unit-top,
    .yui-skin-sam .yui-layout .yui-layout-unit-top div.yui-layout-bd-nohd {
        overflow: visible;
    }
</style>";
			foreach ($this->saida as $k => $v){
				echo $v."\r\n";
			}
		}
		
		public function addUnit($conf_arr = array()){
			
			$this->units[] = new unit($conf_arr);
					
		}
	
	}
	
	class unit {
	
		private $position;
		
		private $header;
		
		private $width;
		
		private $height;
		
		private $resize;
		
		private $gutter;
		
		private $footer;
		
		private $collapse;
		
		private $scroll;
		
		private $body;
		
		private $animate;
		
		private $configs;
		
		public function unit($arr = array()){
		
			$this->scroll = true;
			foreach ($arr as $chave => $valor){
				
				$this->configs[] = $chave;
				if (!(($chave=='width')||($chave=='resize')||($chave=='scroll')||($chave=='collapse')||($chave=='height'))) {
				
					$this->$chave = '"'.$valor.'"';
					
				} else {
				
					$this->$chave = $valor;
					
				}
			
			}
		
		}
		
		public function get_confs(){
			
			$ret = '{';
			
			foreach ($this->configs as $conf => $val){
			
				$ret .= $val.':'.$this->$val.',';
			
			}
			$ret = substr($ret, 0, -1);
			$ret .= "}";
			
			return $ret;
		}
	
	}
?>