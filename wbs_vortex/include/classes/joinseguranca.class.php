<?
	class joinseguranca {
	
		function get_sql(){
			$this->bseg->get_sql();
		}
	
		function gera_array($p1,$p2,$id,$p4){
			$this->bseg = new bd();
			$seguranca = $this->bseg->gera_array('*','seguranca','TRUE','1');
			//pre($seguranca);
			$acesso = $this->bseg->gera_array('codpg,codgrp','segurancaacesso','codgrp='.$id,'codpg');
			//pre($acesso);
			foreach ($seguranca as $seg){
				if (is_array($acesso[$seg['codpg']])){
					$seguranca2[] = array(
						'codpg' => $seg['codpg'],
						'nomem' => $seg['nomem'],
						'arquivo' => $seg['arquivo'],
						'actionpg' => $seg['actionpg'],
						'descr' => $seg['descr'],
						'codmenu' => $seg['codmenu'],
						'checked' => $acesso[$seg['codpg']]['codgrp']);
				} else {
					$seguranca2[] = array(
						'codpg' => $seg['codpg'],
						'nomem' => $seg['nomem'],
						'arquivo' => $seg['arquivo'],
						'actionpg' => $seg['actionpg'],
						'descr' => $seg['descr'],
						'codmenu' => $seg['codmenu'],
						'checked' => 'false');
				}
			}
			//pre($seguranca2);
			return $seguranca2;
			$i = 0;
			foreach ($seguranca as $seg) {
				if ($i > 0) { $sef[] = $seguranca[$i-1]; };
				$i++;
			};
		}
		
		function cria_acesso($codpg,$codgrp){
			$this->bseg = new bd();
			$arr = array('segurancaacesso@codpg' => $codpg,'segurancaacesso@codgrp' => $codgrp);
			$res = $this->bseg->insere($arr);
		}
		
		function retira_acesso($codpg,$codgrp){
			$this->bseg = new bd();
			$res = $this->bseg->send_sql('DELETE FROM segurancaacesso WHERE codpg = '.$codpg.' AND codgrp = '.$codgrp);
		}
	}
?>