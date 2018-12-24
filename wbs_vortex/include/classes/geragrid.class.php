<?
	/** 
	 * Cria um elemento de datagrid no corpo do documento HTML
	 * Utiliza a biblioteca javascript Yahoo YUI
	 *
	 */
	class geraGrid {
	
		// PARAMETRO QUE GUARDA O NOME DO OBJETO JAVASCRIPT;
		public $nome;

		/**
		 * nome da classe do objeto que sera listado na tabela
		 */
		public $obj;
		/**
		 * condição inicial da pesquisa no objeto
		 */
		public $condicao;
		/**
		 * array de objetos do tipo coluna
		 */
		public $coluna;
		/**
		 * título da tabela
		 */
		public $caption;
		/**
		 * nome do campo de ID da tabela
		 */
		public $ID;
		/**
		 * array $sortedby(colKey => "", dir => "ASC")
		 */
		public $sortedby;
		/**
		 * dados para preencher a tabela (formato json)
		 */
		public $data;
		/**
		 * nome do arquivo "ver dados"
		 */
		public $viewFile;
		/**
		 * nome do arquivo "alterar dados"
		 */
		public $editFile;
		/**
		 * nome do arquivo "deletar dados"
		 */
		public $deleteFile;
		
		public $full = true; //full screen;
		
		public $alter_tab;

		public $masterTable;
		
		public $detailTable;
		
		public $etq_file;
		
		public $modulo;
		
		public $wrelative;
		
		public $width;
		
		public $height;
		
		public $scrollable;
		
		public $barra;
		
		public $pagNome;
		
		public $fmts; // Guarda o javascript dos formatadores
		
		public $script; // usando para guardar o script de busca (ainda com BUG)
		
		public $referencia; //referencia ao nome Javascript do Grid gerado.
		
		public $loader;
		
		public $datasource; //arquivo que gera o JSON para o GRID.
		
		public $live_data = true; //define se paginação/ordenação serão server-side(true) ou client-side(false)
		
		public $init_request;
		
		public $screen_size = 680; //tamanho normal da tela;
		
		public $sort_dir = 'asc';
		
		public $event_render = false;
		
		public $editor = array();
		
		public function setSorted($campo, $dir = 'asc'){
			$this->sortedby = $campo;
			$this->sort_dir = $dir;
		}
		
		public function setModulo($mod){
			$this->modulo = $mod;
		}
		
		public function setMD($master,$detail) {
			$this->masterTable = $master;
			$this->detailTalbe = $detail;
		}
		
		function loader($sucesso = ''){
		
		}
		
		public function addFuncao($tipo, $arquivo, $params = ''){
		

			switch ($tipo) {
				case 'panel':{			
					$this->arquivo = $arquivo;
					if (is_array($params)){
						$this->comando = $this->arquivo;
						foreach ($params as $k => $v){
							$this->comando .= '&'.$k.'='.$v;
						}
					}
					$this->barra_superior .= '$this->barra .= "<img src=\''.(($params['imagem'])?$params['imagem']:'images/inserir.gif\'').' class=\'dt_insert\' style=\'height:24px; 	cursor:pointer;\' onclick=\'JAVASCRIPT:divCentral.carrega(\\\\\"".$this->comando."\\\\\",$tbb)\'>";';
				}break;
				case 'addIDTree':{
					//nesse caso, tipo = type, arquivo = objeto tree;
					$this->barra_superior .=  "<img src=".(($params['imagem'])?$params['imagem']:"'images/addmult.png'")." class='dt_insert' style='height:24px; cursor:pointer;' onclick='JAVASCRIPT:WBS.addIDTree(myDataTable".$tipo.",\\\"".$tipo."\\\",".$arquivo.")'>";
				}break;
				case 'empacota':{
				
					$this->barra .= $params['html'];
				
				}break;
				default:{
				
				}break;
			}
		}
		
		public function addInsert($formid){
			$form = "&formid=".$formid;
			$tbb = $this->nome;
			$this->barra .= "<div><img src='images/inserir.png' onclick='javascript:divCentral.carrega(\\\"".encode('modulos/formularios/act_gera.php')."".$form."\\\");' class='dt_insert' style='cursor:pointer;'></div><br>";
		}
		
		public function addIDInsert($type, $tree = 'treelateral'){
			$this->barra .= "<img src='images/addmult.png' class='dt_insert' style='height:24px; cursor:pointer;' onclick='JAVASCRIPT:WBS.addIDTree(myDataTable".$type.",\\\"".$type."\\\",".$tree.")'>";
		}
		
		public function addPesq($aquivo){
			$this->barra .= "<img src='images/BotConsulta.gif' class='dt_pesq' onclick='JAVASCRIPT:divCentral.carrega(\\\"".$aquivo."\\\")'>";
		}
	
	   /**
		* constroi uma nova instância de grid
		*
		* @param    string     $obj    nome do objeto que será listado
		* @param    string     $condicao    condição inicial da pesquisa no objeto
		* @param    string     $caption    título da tabela
		* @param    int     $id    nome do campo de ID da tabela
		* 
		* 
		*/
		public function geraGrid($campos, $obj, $condicao, $caption, $id, $alter_tab, $pagNome = '', $uniqueid) {
			$this->sumTam = 0;
			$this->start_size;
			//$this->tReal= 680;
			$this->nav = explode(' ',$_SERVER['HTTP_USER_AGENT']);
			$this->tReal= ($this->nav[0] == 'Mozilla/4.0')?(1.14*$this->screen_size):($this->screen_size);
			//$this->bigger = 0;	
			$this->pagNome = $pagNome;
			$this->uniqueID = ($uniqueid!='')?$uniqueid:$pagNome.'0';
			$this->nome = 'myDataTable'.$this->pagNome.'["'.$this->uniqueID.'"]';
			$this->campos = (string) $campos;
			$this->alter_tab = (string) $alter_tab;
			$this->obj = (string) $obj;
			$this->condicao = (string) $condicao;
			$this->caption = (string) $caption;
			$this->ID = (string) $id;
			$this->screename = 'onscreen.'.$this->nome;
		}
		

	   /**
		* adiciona uma coluna ao grid
		*
		* @param    string     $campo    nome do campo da coluna na tabela
		* @param    string     $label    título do campo que será impresso no grid
		* @param    string     $type    tipo do campo
		* @param    string     $width    tamanho da coluna na tabela
		* @param    string     $classname    nome da classe a ser aplicada na coluna
		* @param    bool     $sortable    se coluna é sorteável ou não (true ou false)
		* @param    string     $formatter    nome da função que formata a coluna
		* 
		*/
		public function AddColuna($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "", $parser = 'String') {
			$col = new coluna($campo, iconv('utf-8','iso-8859-1','<b>'.$label.'</b>'), $type, $width, $editor, $classname, $sortable, $formatter, $parser);
			$this->bigger = ($this->bigger<<$width)?$width:$this->bigger;
			$width = (isset($width))?$width:'33';
			$this->sumTam += $width;
			$this->coluna[] = $col;
			$this->coluna_ind[$col->getcampo()] = $col->getkey();
		}
		
	   /**
		* adiciona uma ação ao grid
		*
		* @param    string     $acao    nome da ação a ser adicionada à tabela.
		*                               Valores válidos:
		*                               "view" -> para chamar "ver dados"
		*                               "edit" -> para chamar "editar dados"
		*                               "delete" -> para chamar "excluir dados"
		*
		* @param    string     $file    nome do arquivo que executará a função
		*                               indicada pela ação
		* 
		*/
		public function AddAcao($acao, $file = '', $par = array('tamanho'=>'18'), $id = 0) {
			if ($id == 0) { $id = $this->ID; }

			$tamanho = (isset($par['tamanho']))?$par['tamanho']:33;
			$campo = (isset($par['campo'])?$par['campo']:(isset($this->ID))?$this->ID:'cod');
			$sortable = (isset($par['sort'])?'true':'false');
			if ($campo == '') { echo 'campo " "'; };

			if (!$par['modulo']) { $par['modulo'] = $this->pagNome; }
			$param['campo'] = $campo;
			$param['arquivo'] = $file;
			$param['tipo'] = $acao;
			$param['args'] = $par;
			$format = new formatter($param);
			$this->fmts .= $format->get($acao);

			$this->AddColuna($par['campo'], $par['head'], "string", $tamanho, $par['editor'], "", $sortable, "YAHOO.widget.DataTable.format".$acao);

		}
		
		public function setsource($arquivo, $init, $live = false) {
			
			$this->init_request = $init;
			$this->datasource = $arquivo;
			$this->live_data = $live;
		
		}
		
	   /**
		* adiciona uma evento pra ser executado nos itens selecionados no grid 
		*
		* @param    string     $text    Texto com o nome da ação a ser executada
		*
		* @param    string     $value   nome da função javascript que será executada
		*                               ao chamar este evento
		*
		* @param	string	   $img     Avatar à ser mostrado no pool de eventos
		* 
		*/
		public function AddEvento($text, $value) {
			$e = new evento;
			$e->settext($text);
			$e->setvalue($value);
			$this->eventos[] = $e;
		}
		
		public function get_formatters(){
			return $this->fmts;
		}
		
		public function calc_width(){
		//	$resto = ($this->tReal % $this->sumTam);
		//	$this->sumTam += $resto;
			$this->fator_conversao = ($this->tReal/$this->sumTam);
			foreach ($this->coluna as $k=>$col){
				//$tamanho = ($this->bigger == $col->getwidth())?$resto:0;
				$tamanho = 0;
				$col->setWidth(round(($col->getwidth()+$tamanho)*$this->fator_conversao));
			}
		}
		
		public function set_rowformatter($sNomeDaFuncao){
		
			$this->rowformatter = $sNomeDaFuncao;
		
		}
		
		public function addEditor($sNomefuncao) {
			
			$this->editor[$sNomefuncao] = 'new '.$sNomefuncao;
			
			return $sNomefuncao;
		
		}
		
		public function addHidden($k,$f = false,$parser = false) {
			$f = ($f)?$f:$k;
			$Arr = array('k'=>$k,'f'=>$v,'p'=>$parser);
			$this->hidcol[] = $Arr;
		
		}

	   /**
		* retorna o código HTML do grid para ser impresso na tela 
		*
		* @param    string     $pagNome    Nome da página onde o grid será impresso
    	* @return   string     $grid 	   código HTML do grid gerado
		* 
		*/
		public function imprimeGrid($pagNome, $rowsperpage = '15', $active) {
			//$grid .= $this->barra;
			$editor = array(); //DEFINIÇÃO PARA TROCAR OS TIPOS DE EDITORES EM ARQUIVOS CRIADOS EM YUI2.5 ADAPTANDO PARA 2.6;
			
			$this->editor["'textbox'"] = 'new YAHOO.widget.TextboxCellEditor({disableBtns:false,asyncSubmitter:onCellEdit})';
			$this->editor["Date"] = 'new YAHOO.widget.DateCellEditor({disableBtns:false,asyncSubmitter:onCellEdit})';
			
			//GERANDO NOME GERAL DOS OBJETOS E ID ÚNICO.
			$this->pagNome = $pagNome;	
			
			
			//ATENÇÃO, SE VOCÊ ESTA DESESPERADO QUERENDO SABER O Q RAIOS É 'TBB', É O NOME JAVASCRIPT DO GRID, OK?
			$tbb = 'onscreen.'.$this->nome;
	
			$grid .= "<script> onscreen.myDataTable".$this->pagNome." = new Array();
				var ".$this->pagNome.$this->uniqueID." = {}; </script>";
			
			//div onde vai ficar a tabela
			$grid .= "<center><div id=\"div_".$this->uniqueID."\" class='yui-skin-sam'></div><div id='pg_cont".$this->uniqueID."'></div></center>";
			
			$grid .= "<script>";	//evento que é executado ao 'PAGINAR'
			
			//função que cuida das transações de paginação/ordenação/pesquisa
			$grid .= "var myRequestBuilder".$this->pagNome.$this->uniqueID." = function (oState, oSelf) {

		  // Get states or use defaults

             oState = oState || {pagination:null, sortedBy:null};

             var startIndex = (oState.pagination) ? oState.pagination.recordOffset : 0;

             var results = (oState.pagination) ? oState.pagination.rowsPerPage : 20;

			 var sorter = '';
			 
			 if (oState.sortedBy != null) {
			 
			 	var dir = (oState.sortedBy['dir']=='yui-dt-asc')? 'asc':'desc';
				
				var sorter = '&sort= ' + oState.sortedBy['key'] + '&dir= ' + dir;
				
				var exSort = ".$tbb.".oSort = {'dir':dir,'key':oState.sortedBy['key']};
			
			} else {
			
				var sorter = '&sort= ' + ".$tbb.".oSort['key'] + '&dir=' + ".$tbb.".oSort['dir'];
				
			}

			 // Build custom request
			 var exCond = ".$tbb.".sCond || '".$this->condicao."';			 

             return  './ajax_json.php?campos=".$this->campos."&obj=".$this->obj."&condicao='+exCond+\"&startIndex=\"+startIndex +\"&results=\"+results+sorter;
				 				 	
			};";
			$grid .= "\r\n var onCellEdit = function(fnCallBack, oNewValue) {\r\n";
			
			$grid .= "var oldData = this.value || \"\";\r\n";	
			$grid .= "var newId = oNewValue || \"\";\r\n";
			
			$grid .= "M = this; ";
			$grid .= "var chaveee = this._oRecord._oData['".$this->ID."']; \r\n";
			$grid .= "var url = \"ajax_html.php?file=".encode("ajax_altera.php")."&tabela=".$this->alter_tab."&keyfield=".$this->ID."&id=\"+chaveee+\"&field=\"+this._oColumn.field+\"&val=\"+encodeURIComponent(newId); \r\n";
			$grid .= "M.unblock();";
			$grid .= "var WB = function (O, N) { 
				var P = YAHOO.widget.DataTable._cloneObject(M.value);
				if (O) {
					M.value = N;
					var cl = M.getColumn();
					cl.key = cl.field;
					M.getDataTable().updateCell(M.getRecord(), cl, N);
					M.getContainerEl().style.display = \"none\";
					M.isActive = false;
					M.getDataTable()._oCellEditor = null;
					M.fireEvent(\"saveEvent\", {editor: M, oldData: P, newData: M.value});
				} else {
					M.resetForm();
					M.fireEvent(\"revertEvent\", {editor: M, oldData: P, newData: N});
				}
				M.unblock();
			};\r\n";
			$grid .= 'var ww = { success: function(o) { WB(true,newId); }, failure:function(o){WB(false,oldData)}};';
			$grid .= "YAHOO.util.Connect.asyncRequest('GET',url, ww, null); \r\n";
			$grid .= "this.value = oNewValue; \r\n";	

	$grid .= "};\r\n</script>";
			

			$this->calc_width();
			//pre($this->coluna);
			//inicia o script e já começa a colocar os headers das colunas
			$grid .= "<script> var myColumnHeaders".$this->uniqueID." = [";

			$aux = "abcdefghijklmnopqrstuvxz";
			$i = 0;
			foreach($this->coluna as $linha) {
				
			$grid .= "{key:\"".$linha->getkey()."\", field:\"".$linha->getcampo()."\", type:'".$linha->gettype()."', label:\"".$linha->getlabel()."\", resizeable:true, width:".($linha->getwidth()).", maxAutoWidth:'".(5+$linha->getwidth())."', className:\"".$linha->getclassname()."\", ".($this->editor[$linha->geteditor()]!=""?"editor: ".$this->editor[$linha->geteditor()].", ":"").($linha->getformatter()!=""?"formatter:".$linha->getformatter().", ":"")."sortable:".$linha->getsortable()."},"; 				
		}

			//retira a última vírgula que sobra
			$grid = substr($grid, 0, -1);
			$grid .= "];\r\n";
			
			

			//SETANDO CONFIGURAÇÕES DO DATA-SOURCE YUI DO GRID;
			$source = ($this->datasource)?$this->datasource:"./ajax_json.php?campos=".$this->campos."&obj=".$this->obj."&";
			$grid .= "var myDataSource".$this->uniqueID."  = new YAHOO.util.DataSource('".$source."');\r\n";
			$grid .= "myDataSource".$this->uniqueID.".responseType = YAHOO.util.DataSource.TYPE_JSON;\r\n";
			$grid .= "myDataSource".$this->uniqueID.".connXhrMode = 'queueRequests'; \r\n";
			$grid .= "myDataSource".$this->uniqueID.".subscribe('requestEvent', function(ev) { WBS.wait.show(); });\r\n";
			$grid .= "myDataSource".$this->uniqueID.".subscribe('responseEvent',function(ev) { WBS.reloga(ev.response.responseText);});\r\n";
			$grid .= "myDataSource".$this->uniqueID.".subscribe('responseParseEvent',function(ev) { WBS.wait.hide(); });\r\n";
			$grid .= "myDataSource".$this->uniqueID.".responseSchema = { resultsList: 'records', fields: [ \r\n";
			$i = 0;
			foreach($this->coluna as $linha) {
				
			    $grid .= "{key:\"".$linha->getcampo()."\"".(($linha->getparser()!="")?", parser:".$linha->getparser():"")."},";$i++;
			}
			if (is_array($this->hidcol)) {
				foreach($this->hidcol as $k => $v){
				
					$grid .= "{key:\"".$v['k']."\", field:\"".$v['f']."\"".(($v[parser]!="")?", parser:".$v[parser]:"")."},";
				
				}
			}
			//retira a última vírgula que sobra
			$grid = substr($grid, 0, -1);
			$grid .= "\r\n], metaFields:{totalRecords:'totalRecords', erro:'erro', msg:'msg', debug:'debug'}};\r\n";
			
			//seta as configurações do grid
			$grid .= "var myConfigs".$this->uniqueID." = {";
			$grid .= ($this->live_data)?"dynamicData:true,":"";
			$grid .= "scrollable:false,";
			$grid .= '_elTrTemplate:function(oRecord,index){
        var d   = document,
            tr  = d.createElement(\'tr\'),
			//tr1 = d.createElement(\'tr\'),
			//tr2 = d.createElement(\'tr\'),
            td  = d.createElement(\'td\'),
            div = d.createElement(\'div\'),
		//	br = d.createElement(\'br\'),
			div1 = d.createElement(\'div\');
		//	div2 = d.createElement(\'div\');
			alert(div2);
		//div.appendChild(div1);
		//div.appendChild(br);
		//div.appendChild(div2);
    
        // Append the liner element
        td.appendChild(div);

        // Create TD elements into DOCUMENT FRAGMENT
        var df = document.createDocumentFragment(),
            allKeys = this._oColumnSet.keys,
            elTd;

        // Set state for each TD;
        var aAddClasses;
        for(var i=0, keysLen=allKeys.length; i<keysLen; i++) {
            // Clone the TD template
            elTd = td.cloneNode(true);

            // Format the base TD
            elTd = this._formatTdEl(allKeys[i], elTd, i, (i===keysLen-1));
                        
            df.appendChild(elTd);
        }
        tr.appendChild(df);
		div1.appendChild(tr);
		tr1.innerHTML = "EDUARDO";
		div1.appendChild(br);
		div1.appendChild(tr1);
		
		
        this._elTrTemplate = div1;
        return div1;
    },';
			$grid .= (isset($this->rowformatter))?"formatRow: ".$this->rowformatter.",":"";
			$grid .= "draggableColumns:true,width:680,";
			$grid .= ($this->live_data)?"generateRequest:myRequestBuilder".$this->pagNome.$this->uniqueID.",":"";
			$grid .= "caption: \"".$this->barra."\",";
			$grid .= "selectionMode: 'singlecell',";
			$grid .= "sortedBy:{key:\"".(isset($this->sortedby)?$this->coluna_ind[$this->sortedby]:$this->coluna[0]->getkey())."\",dir:\"".$this->sort_dir."\"}," ;
			
			//SETANDO AS CONFIGURAÇÕES DO PAGINADOR;
			$grid .= "paginator: new YAHOO.widget.Paginator(
				{rowsPerPage:".$rowsperpage.",
				updateOnChange:false,
				alwaysVisible:true,
				
				containers:'pg_cont".$this->uniqueID."',
				template:' Registros:{RowsPerPageDropdown} | {FirstPageLink}{PreviousPageLink}{PageLinks}{NextPageLink}{LastPageLink}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Página:{CurrentPageReport}',
				pageLinks:10,
				rowsPerPageOptions:[10,15,30,60,100],
				firstPageLinkLabel:'<img src=\"".VIMAGES."2leftarrow.png\" width=\"16px\" height=\"16px\">', 
				previousPageLinkLabel:'<img src=\"".VIMAGES."1leftarrow.png\" width=\"16px\" height=\"16px\">', 
				nextPageLinkLabel:'<img src=\"".VIMAGES."1rightarrow.png\" width=\"16px\" height=\"16px\">', 
				lastPageLinkLabel:'<img src=\"".VIMAGES."2rightarrow.png\" width=\"16px\" height=\"16px\">'}),";
				
			//CHECANDO SE O GRID É SCROLL, LATERAL OU VERTICAL;


			//REQUEST INICIAL DO GRID;
			$grid .= "initialRequest:".(($this->init_request)?"'".$this->init_request."'":"'startIndex=0&results=".$rowsperpage."&sort=".(isset($this->sortedby)?$this->sortedby:$this->ID)."&dir=".$this->sort_dir."&condicao=".$this->condicao."'");
			$grid .= "};\r\n";			
			
			
			//REGISTRA A TABELA NO REGISTRO DE OBJETOS DA PÁGINA;
			$grid .= "onscreen.dt.push('".$tbb."');\r\n"; 
			$grid .= "onscreen.activeTb = '".$tbb."'\r\n";
			$grid .= $tbb." = new YAHOO.widget.DataTable(\"div_".$this->uniqueID."\",myColumnHeaders".$this->uniqueID." ,myDataSource".$this->uniqueID." ,myConfigs".$this->uniqueID." );\r\n";
			
			//Seta a propriedade _IDfield do grid																<= TODA ESTA SEÇÃO ESTÁ ERRADA;
			$grid .= ($this->masterTable!='')?$tbb."._masterTable = myDataTable".$this->masterTable.";\r\n":'';
			$grid .= ($this->detailTable!='')?$tbb."._masterTable = myDataTable".$this->detailTable.";\r\n":'';
			$grid .= $tbb."._IDfield = \"".$this->ID."\";\r\n";
			$grid .= $tbb."._CAMPOS = \"".$this->campos."\";\r\n";
			$grid .= $tbb."._OBJ = \"".$this->obj."\";\r\n";
			$grid .= $tbb."._CINI = \"".$this->condicao."\";\r\n";
			if ($this->viewFile) {
				$grid .= $tbb."._viewFile = \"".$this->viewFile."\";\r\n";
			}
			if ($this->editFile) {
				$grid .= $tbb."._editFile = \"".$this->editFile."\";\r\n";
			}
			if ($this->editIdFile) {
				$grid .= $tbb."._editIdFile = \"".$this->editIdFile."\";\r\n";
			}
			if ($this->listOut) {
				$grid .= $tbb."._listOut= \"".$this->listOut."\";\r\n";
			}
			if ($this->alter_tab) {
				$grid .= $tbb."._tablename = \"".$this->alter_tab."\";\r\n";
				$grid .= $tbb."._campochave = \"".$this->ID."\";\r\n";
			}
			if ($this->deleteFile) {
				$grid .= $tbb."._deleteFile = \"".$this->deleteFile."\";\r\n"; 
				$grid .= $tbb."._tablename = \"".$this->alter_tab."\";\r\n";
				$grid .= $tbb."._campochave = \"".$this->ID."\";\r\n";
			}	
			 
			
			//SETANDO OS EVENTOS E FUNÇÕES RESPONSÁVEIS;
			#$grid .= $tbb.".subscribe(\"rowClickEvent\", ".$tbb.".onEventSelectRowCheck);\r\n";
			$grid .= $tbb.".subscribe(\"rowMouseoverEvent\", function(ev) {".$tbb.".onEventHighlightRow(ev); });\r\n";
			$grid .= $tbb.".subscribe(\"rowMouseoutEvent\", function(ev) {".$tbb.".onEventUnhighlightRow(ev); });\r\n";
			$grid .= (($this->live_data)?$tbb.".handleDataReturnPayload = function(oRequest, oResponse, oPayload) { 
				oPayload.totalRecords = oResponse.meta.totalRecords;
				oPayload.startIndex = oResponse.meta.startIndex;
				return oPayload; 
			};":"");
			$grid .= $tbb.".subscribe(\"rowSelectEvent\", function(ev) { });\r\n";
			$grid .= $tbb.".subscribe(\"rowClickEvent\", function(ev) { });\r\n";
			$grid .= $tbb.".subscribe(\"rowUnselectEvent\", function(ev) {".$tbb.".onEventUncheckCheckbox(ev); });\r\n";
			$grid .= $tbb.".subscribe(\"renderEvent\", function(ev) { ".(($this->event_render)?$this->event_render:'')."});\r\n";
			$grid .= $tbb.".subscribe(\"dataReturnEvent\", function (oArgs) { 
				var msg = oArgs.response.meta.msg;
				if (typeof(msg) == 'undefined') msg = 'NENHUM REGISTRO ENCONTRADO';
				".$tbb.'.set("MSG_EMPTY","<center><br><b><font size=\"2\">"+msg+"</font></b><br><br></center>")'.";
				WBS.wait.hide(); 
			} );\r\n";
		//	$grid .= $tbb.".subscribe(\"dataReturnEvent\", function(ev) {  });\r\n";
		#$grid .= $tbb.".subscribe('cellClickEvent', ".$tbb.".onEventShowCellEditor );\r\n"; 
			$grid .= $tbb.".subscribe(\"cellDblclickEvent\", ".$tbb.".onEventShowCellEditor );\r\n"; 
			/*$grid .= $tbb.".doBeforeShowCellEditor = function (oCellEditor) {
					oCellEditor.value = oCellEditor._oRecord._oData[oCellEditor._oColumn.field];
					oCellEditor.show();
				};";*/
			$grid .= $tbb.'.set("MSG_EMPTY","<center><br><b><font size=\"2\">NENHUM REGISTRO ENCONTRADO</font></b><br><br></center>");';
			$grid .= $tbb.'.set("MSG_ERROR","ERRO NOS DADOS");';
			$grid .= $tbb.'.set("MSG_LOADING","CARREGANDO ...");';
			//$grid .= ($active)?"WBS.upTable.push(".$tbb."); \r\n":'';

	$grid .= "</script>\r\n";
	return $grid;
		}
		
		public function addPesquisa($campo, $elId, $leng = '1'){
			$grid .= "<label> ".$elId.": <input type='text' class='' id='pq_".$this->uniqueID.$elId."' name='".$campo."' onChange='WBS.pagina.pesqByField(document.getElementById(\"pq_".$this->uniqueID.$elId."\"),".$this->screename.");'></label>";
			return $grid;
		}
		
		public function setRender($sJSFunc) {
		
			$this->event_render = $sJSFunc.'();';
			
		}
	}

	/** 
	 * Adiciona uma coluna ao datagrid
	 *
	 */
	class coluna {

		/** 
		 * identificador do campo no objeto
		 */
		private $campo;
		/** 
		 * identificador do editor do campo
		 */
		private $editor;
		/** 
		 * funçao para retornar valor do campo no objeto
		 */
		private $funcao;
		/** 
		 * label do título do grid
		 */
		private $label;
		/** 
		 * tipo do conteúdo (number, string, date)
		 */
		private $type;
		/** 
		 * tamanho da coluna
		 */
		private $width;
		/** 
		 * nome de classe específica para a coluna
		 */
		private $classname;
		/** 
		 * (true ou false) => se é sorteável ou não [tem que tratar como string senão retorna t ou f]
		 */
		private $sortable;
		/** 
		 * função que vai formatar o valor do campo
		 */
		private $formatter;
		/** 
		 * função que vai parsear o valor do campo
		 */
		 private $parser;
		/** 
		 * seta o valor do atributo campo
		 * @param string $campo
		 */
		function setcampo($campo) {
			$this->campo = (string) $campo;
		}
		/** 
		 * seta o valor do atributo campo
		 * @param string $campo
		 */
		function setparser($parser) {
			$this->parser = (string) $parser;
		}
		/** 
		 * seta o valor do atributo campo
		 * @param string $campo
		 */
		function seteditor($editor) {
			$this->editor = (string) $editor;
		}
		
		/** 
		 * seta o valor do atributo funcao
		 * @param string $funcao
		 */
		function setfuncao($funcao) {
			$this->funcao = (string) $funcao;
		}
		/** 
		 * seta o valor do atributo label
		 * @param string $label
		 */
		function setlabel($label) {
			$this->label = (string) $label;
		}
		/** 
		 * seta o valor do atributo type
		 * @param string $type
		 */
		function settype($type) {
			$this->type = (string) $type;
		}
		/** 
		 * seta o valor do atributo width
		 * @param string $width
		 */
		function setwidth($width) {
			$this->width = (string) $width;     
		}
		/** 
		 * seta o valor do atributo classname
		 * @param string $classname
		 */
		function setclassname($classname) {
			$this->classname = (string) $classname;
		}
		/** 
		 * seta o valor do atributo sortable
		 * @param string $sortable
		 */
		function setsortable($sortable) {
			$this->sortable = (string) $sortable;
		}
		/** 
		 * seta o valor do atributo formatter
		 * @param string $formatter
		 */
		function setformatter($formatter) {
			$this->formatter = (string) $formatter;
		}
		
		/** 
		 * seta o valor do atributo key
		 * @param string $key
		 */
		function setkey($key) {
			$this->ukey = (string) $key;
		}

		/** 
		 * pega o valor do atributo campo
		 */
		function getcampo() {
			return (string) $this->campo;
		}
		/** 
		 * pega o valor do atributo campo
		*/
		function getparser() {
			return (string) $this->parser;
		}
		/** 
		 * pega o valor do atributo funcao
		 */
		function getfuncao() {
			return (string) $this->funcao;
		}
		/** 
		 * pega o valor do atributo label
		 */
		function getlabel() {
			return (string) $this->label;
		}
		/** 
		 * pega o valor do atributo label
		 */
		function getkey() {
			return (string) $this->ukey;
		}
		/** 
		 * pega o valor do atributo editor
		 */
		function geteditor() {
			return (string) $this->editor;
		}
		/** 
		 * pega o valor do atributo type
		 */
		function gettype() {
			return (string) $this->type;
		}
		/** 
		 * pega o valor do atributo width
		 */
		function getwidth() {
			return (string) $this->width;
		}
		/** 
		 * pega o valor do atributo classname
		 */
		function getclassname() {
			return (string) $this->classname;
		}
		/** 
		 * pega o valor do atributo sortable
		 */
		function getsortable() {
			return (string) $this->sortable;
		}
		/** 
		 * pega o valor do atributo formatter
		 */
		function getformatter() {
			return (string) $this->formatter;
		}

	   /**
		* constrói um objeto coluna
		*
		* @param    string     $campo    nome do campo da coluna na tabela
		* @param    string     $label    título do campo que será impresso no grid
		* @param    string     $type    tipo do campo
		* @param    string     $width    tamanho da coluna na tabela
		* @param    string     $classname    nome da classe a ser aplicada na coluna
		* @param    bool     $sortable    se coluna é sorteável ou não (true ou false)
		* @param    string     $formatter    nome da função que formata a coluna
		* 
		*/
		function coluna($campo, $label, $type, $width, $editor, $classname, $sortable, $formatter, $parser) {
			$this->setparser(($type != 'checkbox')?"YAHOO.util.DataSource.parse".$type:'YAHOO.util.DataSource.parseNumber');
			$this->seteditor($editor);
			$this->setcampo($campo);
			$this->setkey($campo."-".gera_str_rand(2));
			$this->setlabel($label);
			$this->settype($type);
			$this->setwidth($width);
			$this->setclassname($classname);
			$this->setsortable($sortable);
			$this->setformatter($formatter);
		}
	}


	/** 
	 * Adiciona um evento ao datagrid
	 * Eventos aparecem abaixo do datagrid como um select e são executados
	 * a todos os elementos selecionados por checkbox na tabela.
	 *
	 */
	class evento {

		/** 
		 * texto que vai ser exibido no option
		 */
		private $text;
		/** 
		 * value do option: função js que será executada
		 */
		private $value;

		/** 
		 * seta o valor do atributo text
		 * @param string $text
		 */
		function settext($text) {
			$this->text = (string) $text;
		} 
		/** 
		 * seta o valor do atributo value
		 * @param string $value
		 */
		function setvalue($value) {
			$this->value = (string) $value;
		}

		/** 
		 * pega o valor do atributo text
		 */
		function gettext() {
			return (string) $this->text;
		}
		/** 
		 * pega o valor do atributo value
		 */
		function getvalue() {
			return (string) $this->value;
		}

	}

?>