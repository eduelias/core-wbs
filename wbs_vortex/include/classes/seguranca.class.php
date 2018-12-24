<?
	class seguranca extends bd{
	
			private $array_simples;
			private $raw;
			private $sql;
			private $array_tabelar;
			private $seguranca = null;
	
		/*function gera_array($campos = '*',$tab_conf,$filtros = 'TRUE',$key){
			$this->raw = parent::gera_array($campos,'seguranca',$filtros);
			$menu_raw = parent::gera_array('codmenu,menu','seguranca_menu','true','codmenu');
			if (is_array($this->raw)){
				foreach ($this->raw as $field=>$value){
					foreach($value as $fi=>$val){ 
						if($fi == 'codmenu'){
							$value['menu'] = $menu_raw[$value['codmenu']]['menu'];
						}
						$seguranca[$field] = $value;
					}
				}	
				return $seguranca;
			} else {
				return $seguranca;
			}
		}	*/
	}
?>