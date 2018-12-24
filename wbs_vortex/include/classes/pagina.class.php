<?

	class pagina {

		public $paginaNome; // nome da página, referencia todos os objetos q serão criados, grid (myDataTable$paginaNome, tree$paginaNome)
		
		public $html; //Código html dos objetos - ainda não muito usado
		
		public $cpanel; // entrada do colapsible pannel;
		
		public $grid; //objeto grid
		
		public $filtro;
		
		public $head; // dados a serem impressos no cabeçalho da página
		
		public $data; //objeto que carrega todos os dados html para serem impressos com $pagina->imprime();
		
		public $titulo; //Objeto que formata o título da página - ainda não usado
		
		public $modulo; // Identificador do módulo. Ainda não usado - carregará permissões.
		
		public $formid; // Identificador de formulário. Ainda não usado - carrega dados dos formulário a serem impressos.
		
		public $tabs; // Carregador das tabs;
		
		public $cap_pesq; // Caption do cpanel de pesquisa.
		
		public $script; //public $data_head; // Objeto que carregará os dados da 'cabeça' da página. ** Mudou o nome de $data_head para script ** 
		
		public $includes; //public $links; // Objeto que carrega todos os arquivos JS carregados para esta página; - trocou nome de $links para $includes;
		
		public $oTree; // Objeto da classe tree
		 
		public $tree; // Elemento html da tree;
		
		public $scripts; //
		
		public function addTree($child = array('campos'=>'*','obj'=>'','cond'=>'true'), $self = array('ID'=>0,'label'=>'/')){
			
			$this->includes[] = '<link rel="stylesheet" type="text/css" href="includes/yui/'.YUI_VER.'/build/treeview/assets/skins/sam/treeview.css">';
			$this->includes[] = '<script src = "includes/yui/'.YUI_VER.'/build/treeview/treeview'.((JSMIN)?'-min':'').'.js" ></script>';
			$this->tree[] = '<div id="tree_div'.$id.'"></div>';
			include(C_PATH_CLASS."tree.class.php");
			$this->oTree = new tree($child, $self);
		}
		
		public function pagina($paginaNome, $titulo = '') {
			$this->titulo = (($titulo!='')?$titulo:$paginaNome);
			$this->paginaNome = (string) $paginaNome;
			$this->script[] = "<script  type=\"text/javascript\">WBS.wait.show(); var pagina = new WBS.pagina; WBS.pagina.atual = '".$paginaNome."'; \r\n </script>";
			$this->head[] = "<h2 class='$paginaNome tit_pagina'>".iconv('utf-8','iso-8859-1',$this->titulo)."</h2><div style='width:600px'>&nbsp;</div>";
		}

		public function addTab($label,$content, $way = "true", $mod = ''){
			if (method_exists($this->tabs,addOnTab)) {
				$this->tabs->addTab($label,$content,$way);
			} else {	
				$this->tabs = new tabs($mod);
				$this->tabs->addTab($label,$content,$way);
			}
		}
		
		public function addPopup($trigger, $id = 'context', $lazyload = 'true', $itens){
			if (is_array($itens)) {
			$aux = '[';
				foreach ($itens as $tipo => $valor) {
					$aux .= "{ text: '".$valor['text']."', onclick: { fn: ".$valor['fn']."} },";
				}
				$sql = substr($sql,0,-1);
			$aux .= ']';
			} else { $aux = $itens; };
			$this->script[] = "<script> var oContextMenu = new YAHOO.widget.ContextMenu('".$id."', { trigger:'".$trigger."', lazyload:".$lazyload.", itemdata:".$aux." });";
			$this->script[] = 'oContextMenu.subscribe("triggerContextMenu", onTriggerContextMenu); </script>';
		}
		
		public function placeTabs($act = 0){
			$this->tabs->setActive($act);
			$this->tabs->show_tabs();
		}

		public function setGrid($campos, $obj, $condicao, $caption, $id, $alter_tab = '', $dt = '') {
/*			$this->includes[] = '<script type="text/javascript" src="include/yui/2.5/datatable/datatable-beta.js"></script>';
			$this->includes[] = '<script type="text/javascript" src="include/js/formatters.js"></script>';*/
			$this->caption = (isset($this->caption))?$this->caption:$caption;
			$this->grid = new geraGrid($campos, $obj, $condicao, $this->caption, $id, $alter_tab, $this->paginaNome, $dt);
			$this->grid->pagNome = $this->paginaNome;
		}
		
		public function loadGrid($rows = '15', $active = true) {
			$this->data[] = $this->grid->loader;
			$this->data[] = $this->grid->fmts;
			$this->data[] = $this->grid->imprimeGrid($this->paginaNome, $rows, $active);
			$this->data[] = $this->grid->script;
		}
		
		public function addPesquisa($html) {
			$this->addObj($html);
		}
		
		public function addObj($html, $titulo = '<legend class="pesquisa_tit">PESQUISA </legend>') {
			$this->data[] = "<center><fieldset class='pagina_obj'>".$titulo."<form action='javascript: return false' style='text-align:center'>".$html."&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Pesquisar' onclik='javascript:alert(this.value);' style='margin-left:20px;'></input></form></fieldset></center>";
		}
		
		public function addPanObj($html, $titulo = 'PESQUISA ') {
			$this->data[] = "<center><fieldset class='pagina_obj'><legend class='pesquisa_tit'>".$titulo."</legend>".$html."&nbsp;&nbsp;&nbsp;&nbsp;</fieldset></center>";
		}
		
		public function addCpanel($arquivo = '',$titulo = '') {
			$this->cpanel = "cp_".$this->paginaNome;
			
			$this->data[] = "<div id=\"".$this->cpanel."\" class=\"CollapsiblePanel\">
						 <div class=\"CollapsiblePanelTab\" tabindex=\"0\"><img src='images/view2.gif' border='no'>Pesquisar:</div>
						 <div class=\"CollapsiblePanelContent\"></div>
						 </div>";
			$this->script[] = "<script type=\"text/javascript\"> onscreen._cpanel = new Spry.Widget.CollapsiblePanel(\"".$this->cpanel."\", {contentIsOpen:true, enableAnimation:false}); WBS.pagina.showForm.init('ajax_html.php?file=".encode($arquivo)."', '".$titulo."', '".$this->cpanel."'); </script> \r\n";
			
		}
		
		public function addCpanelOff($titulo, $content){
			$this->cpanel = "cp_".$this->paginaNome.$titulo;
			$this->head[] = "<div id=\"".$this->cpanel."\" class=\"CollapsiblePanel\">
							 <div class=\"CollapsiblePanelTab\" tabindex=\"0\"><img src='images/view2.gif' border='no' class='img_pesq'>".$titulo."</div>
							 <div class=\"CollapsiblePanelContent\"> ".$content."
							 </div>
							 </div>";
			$this->head[] = "<script type=\"text/javascript\"> WBS.pagina._cpanel = new Spry.Widget.CollapsiblePanel(\"".$this->cpanel."\", {contentIsOpen:false, enableAnimation:false});  </script> \r\n";
		}

		public function imprime() {
			if (is_array($this->includes)) {
				foreach($this->includes as $linha) {
					echo $linha."\r\n";
				}
			}
			if (is_array($this->head)) {
				foreach($this->head as $linha) {
					echo $linha."\r\n";
				}
			}
			if (is_array($this->data)) {
				foreach($this->data as $linha) {
					echo $linha."\r\n";
				}
				echo "<script> sfFocus(); </script>";
			}
			if (is_array($this->script)) {
				foreach($this->script as $linha) {
					echo $linha."\r\n";
				}
			}
		}
		
		public function str_grid(){
			if (is_array($this->data)) {
				foreach($this->data as $linha) {
					$str_grid .= $linha."\r\n";
				}
			}
			return $str_grid;
		}
		
		public function head(){
			if (is_array($this->data_head)){
				foreach($this->data_head as $linha){
					echo $linha."\r\n";
				}
			}
		}

	}
?>