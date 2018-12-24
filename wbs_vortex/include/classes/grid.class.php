<?

	class grid {
	
		private $instancia;
		
		private $paginadir;
	
		private $ds = array();
		
		private $configs;
		
		private $dt_eventos;
		
		private $ds_eventos;
		
		private $tb_desc = "''";
	
		private $coluna = array();
		
		private $saida;
		
		private $head = '<table class="grid_actions" style="border: medium none ;"><tr><td rowspan=2><img src=modulos/mod_rma/images/arrow.png></td>';
		
		private $head_top;
		
		private $head_lab;
		
		private $tem_header = false;
		
		private $e_ou = ''; //SELECT PARA AND/OR SELECTION
		
		private $pesquisa_where; //ARRAY COM PESQUISA DE CAMPOS WHERE - REAIS
		
		private $pesquisa_having; //ARRAY COM PESQUISA DE CAMPOS CALCULADOS - HAVING
		
		private $has_pesquisa = false;
		
		private $jn ;
		
		private $caller = "alert('GRID NAO GERADO')";
		
		private $totalW = 0;
		
		private $total_w_calculado = 0;
		
		private function json($array) {
			
			$this->jn = new Services_JSON();
			
			return $this->jn->encode($array,false);
		
		}
		
		public function grid($tbname,$src,$param = array(idname=>false, chave=>false, rows=>'30')) {
				
			$this->tbname = $tbname;
			$this->idname = ($param[idname])?$param[idname]:'id_'.$tbname;
			$this->source =  ereg_replace("[\r\t\n]"," ",$src).'&';
			$this->keyfield = ($param[chave])?$param[chave]:false;
			$this->rows = (isset($param['rows']))?$param['rows']:'30';
			
			foreach ($param as $k => $v) {
			
				$this->$k = $v;
			
			}
			if (isset($this->maxw)) {}		
		
		}
				
		public function getSchema() {
		
			$ret = array(
				resultsList => "'records'",
				fields => $this->ds,
				metaFields => array("totalRecords"=>"'totalRecords'","msg"=>"'msg'","debug"=>"'debug'","erro"=>"'erro'","pagesize"=>"'pagesize'")
			);
			
			return $ret;
		}
		
		public function showConfigs(){
		
			return $this->configs;
		
		}
		
		public function SetConfigs($aConfigs = array(),$pConfigs = array()){			
			
			$def_gen_request = " function(oState, oSelf){ oState = oState || {pagination:null,sortedBy:null}; var sorte = (oState.sortedBy.key) ? oState.sortedBy.key : ".$this->coluna[0]['key'].";var dir = (oState.sortedBy && oState.sortedBy.dir === DT.CLASS_DESC) ? 'DESC' : 'ASC'; var startIndex = (oState.pagination) ? oState.pagination.recordOffset : 0; var results = (oState.pagination) ? oState.pagination.rowsPerPage : 20; return  '&startIndex=' + startIndex + '&results=' + results+ '&dir=' + dir + '&sort=' + sorte; }";

			$default_array = array(
				dynamicData => true,
				caption => $this->tb_desc,
				initialRequest =>"'startIndex=0&results=30",
				initialLoad => true,
				draggableColumns => true,
				paginator => true,
				sortedBy=>array('key'=>$this->coluna[0]['key'],'dir'=>"asc"),
				MSG_EMPTY => "'<center><br><b><font size=\"2\">NENHUM REGISTRO ENCONTRADO</font></b><br><br></center>'",
				MSG_ERROR => "'<center><br><b><font size=\"2\">ERRO ENCONTRADO</font></b><br><br></center>'"
			);
			#generateRequest => 'this.requestBuilder',
			$aConf = array_merge($default_array,$aConfigs);
			
			$this->configs = $aConf;
			$this->source_sort = "&sort=".$this->configs[sortedBy]['key'].'&dir='.$this->configs[sortedBy]['dir'];		
			$this->configs[sortedBy] = array('key'=>"'".$this->configs[sortedBy]['key']."'",'dir'=>"'".$this->configs[sortedBy]['dir']."'");
			$this->configs[paginator] =  ($this->configs[paginator])?'new YAHOO.widget.Paginator('.$this->getPaginador($pConfigs).')':NULL;
			$this->configs[initialRequest] .= $this->source_sort."'"; 
			$this->configs[caption] = ($this->tem_head)?"'".$this->getHeader()."'":$this->configs[caption];
			$this->keyfield = (!$this->keyfield)?$this->coluna[0]['key']:$this->keyfield;

		}
		
		private function image($imag) {
			$r = "'<img src=$imag width=14px height=14px>'";
			return $r;
		}
		
		public function getPaginador($arr = array()){
		
			$shpg = 'PageLinkLabel';
			
			$def_array = array(
				'rowsPerPage' => $this->rows,
				'rowsPerPageOptions' => array(10,15,30,60,100),
				'updateOnChange' => false,
				'containers' => "'bottom_".$this->idname."'",
				'template' => "'Registros:{RowsPerPageDropdown} | {FirstPageLink}{PreviousPageLink}{PageLinks}{NextPageLink}{LastPageLink}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | P&aacute;gina:{CurrentPageReport}'",
				'pageLinks' => 10,
				'first'.$shpg => "'< <'",
				'previous'.$shpg => "' < '",
				'next'.$shpg => "' > '",
				'last'.$shpg => "' > > '"
			);
			
			$aConfigs = array_merge($def_array,$arr);
			
			$this->rowsperpage = $aConfigs[paginator][rowsPerPage];
			
			$this->rows = $this->rowsperpage;
			
			$this->configs[dynamicData] = ($this->configs[dynamicData])?true:false;
			
			$this->paginador = $aConfigs;
			
			return $this->json($this->paginador);

		}
		
		public function AddEditor ($sCall, $sOptions) {
			$this->editor[] = 'this.editor.'.$sCall. ' = '.$sOptions.' ;';
			return 'YAHOO.widget.'.$sCall.'(this.editor.'.$sCall.')';
		}
		
		public function AddFormatter($sFname, $sJSFunc) {
		
			$fncid = 'this.formatter.'.$sFname;
			
			$this->formatter[] = $fncid.' = function(elCell,oRecord,oColumn,oData)'.$sJSFunc;
			
			return $fncid;
		
		}
		
		public function AddHeader($img,$label, $par = array(msg=>'')){
			
			$this->tem_head++;
			
			$this->head_top .= "<td align=center><img src=\"$img\" title=\"$par[msg]\" width=32px id=\"head_$this->tem_head\"></td>";
			$this->head_lab .= "<td style=\"font-size:1em\">$label</td>";
		
		}
		
		public function getHeader(){
		
			$ret = $this->head;

			return $this->head.$this->head_top.'</tr><tr>'.$this->head_lab.'</tr></table>';
		
		}
		
		public function formList($el,$event,$func) {
		
			return "YAHOO.util.Event.addListener(document.getElementById('$el'),'$event',function(e) { $func }  , WBS.modulo.".$this->tbname.".dt,true);";
		
		}
		
		public function getListeners(){
		
			$ret = '';
			if (is_array($this->funcoes)) {
				foreach ($this->funcoes as $pos => $funcaller) {
					$id = $pos+1;
					$ret .= $this->formList("head_$id","click",'WBS.modulo.'.$this->tbname.'.dt.'.$funcaller['id'].'('.$funcaller['params'].')');
				}
				return $ret;
			} else {
				return '';
			}
		
		}
		
		public function AddFuncao($sFid, $sJSFnc, $pos = 1, $params = '') {
		
			$pos = ($pos==1)?count($this->funcoes):$pos;
			
			#$pos = ($pos==0)?1:$pos;
		
			$fncid = $sFid;
			
			$this->funcoes[$pos] = array('id'=>$fncid, 'fun'=>'this.dt.'.$fncid.' = function'.$sJSFnc, 'params'=>$params);
			
			return $fncid;
		
		}
		
		public function AddFormatter_dpr($fmt){
			$fncid = $fmt[0];
			$this->formatter[] = $fmt[1];
			return $fncid;
		}
		
		public function AddColuna($mArg) {
		
			$prim4 = array(0=>'field',1=>'label',2=>'width',3=>'type');
			
			$pos = count($this->coluna);
			
			$args = func_get_args();
			
			$this->coluna[$pos]['key'] = "'".$args[0]."'"; #'_'.$pos."'";
			
			$this->ds[$pos]['key'] = "'".$args[0]."'";

			foreach ($args as $k => $v) {
			
				switch (true) {
					case ($k == 2):{
						
						$this->coluna[$pos][$prim4[$k]] = $v;
						$this->totalW += $v;
				 		
					}break;
					case ($k <= 3):{
						
						$this->coluna[$pos][$prim4[$k]] = "'".$v."'";
						
					}break;
					case ($k == 3):{
						$this->coluna[$pos]['type'] = "'".$v."'";
						$this->ds[$pos]['parser'] = 'YAHOO.util.DataSource.parse'.$v;	
					
					}break;
					default:{
						if (is_array($v)){
							foreach ($v as $def => $val) {
								$this->coluna[$pos][$def] = $val;
							}
						} else {
							$ax = explode(':',$v);
							$this->coluna[$pos][$ax[0]] = $ax[1];
						}						
					};
				};
				
				$this->coluna[$pos][sortable] = (isset($this->coluna[$pos][sorteable]))?$this->coluna[$pos][sortable]:true; 
				$this->coluna[$pos][resizeable] = (isset($this->coluna[$pos][resizeable]))?$this->coluna[$pos][resizeable]:true; 
				$this->sorted = (isset($this->coluna[$pos][ordem]))?$this->coluna['key']:false;
			};
		
		}
		
		public function AddCampo($key,$parser = 'YAHOO.util.DataSource.parseString'){
		
			$pos = count($this->ds);
			
			$this->ds[$pos] = array('key' => "'".$key."'",'parser'=> $parser);
		
		}		
		public function AddDTEvento($eventID,$fnCall) {
		
			$this->dt_eventos[] = 'this.dt.subscribe("'.$eventID.'",'.$fnCall.')';
		
		}
		
		public function AddDSEvento($eventID, $fnCall){
		
			$this->ds_eventos[] = 'this.ds.subscribe("'.$eventID.'",'.$fnCall.')';
		
		}
		
		public function calcWidth() {
		
			$maxW = (isset($this->maxw))?$this->maxw:760;
			
			$fat = ($maxW/($this->totalW));
		
			$rows = $this->coluna;
		
			foreach ($rows as $k => $v) {
			
				$f = $fat*$this->coluna[$k][width];
				$f = round(0.9201*$f,0);
				
				$this->coluna[$k][width] = $f;
				$this->total_w_corrigido += $f;
			}
			$rows = $this->coluna;
			
			$this->debug[width][maxw] = $this->maxw;
			$this->debug[width][maxW] = $maxW;
			$this->debug[width][totalW] = $this->totalW;
			$this->debug[width][fat] = $fat;
		
			$row = count($this->coluna);
			$this->total_w_corrigido += ($row * 7)+2;
		}
		
		public function AddPesquisa($campo,$label, $tipo = 'filtro'/* filtro = where, having=having */, $libera_ou = false){
			$camp =  str_replace('.','',$campo);
			$this->p_tipo = $tipo;
			$this->has_pesquisa = true;
			if (count($this->pesquisa)==0) {
				$this->e_ou = "<div class='pfirst'><input type=hidden id='junc_$this->tbname$camp' value=' ".(($tipo=='filtro')?'AND':'')." '></input>";
			} elseif ($libera_ou) {
				$this->e_ou = "<div class='pother'><select id='junc_$this->tbname$camp'><option value=' AND '>E</option><option value=' OR '>OU</option></select>";
			} else {
				$this->e_ou = "<div class='pother'><input type=hidden id='junc_$this->tbname$camp' value=' ".(($tipo=='filtro')?'AND':'')." ' ></input>";
			}
			$like_is = "<select id='like_$this->tbname$camp'><option value=' LIKE '>CONT&Eacute;M</option><option value=' = '>&Eacute;</option></select>";
			$this->pesquisa[1][] = "$this->e_ou <b>".strtoupper($label).":</b> $like_is <input type='text' name='$campo' id='input_$this->tbname$camp'></input></div>";
			$this->pesq_ids[] = $camp;
		}
		
		public function getdbg($sIndx = 'width'){
		
			return $this->debug;
		
		}
		
		public function loadGrid() {			
			
			#$this->saida[] = "YAHOO.util.Event.addListener(window, 'load', function() {";
			$this->calcWidth();
			$this->saida[] = "<style>.page$this->tbname { width:".$this->total_w_corrigido."px !important;} .header{background:#D8D8DA url(http://img1.wbs.maxxmicro.com.br/amarelo_sprite.png) repeat-x scroll 0 -1400px; border:1px outset #000000; height:16px; margin:10px -2px -1px -2px; zindex:50; padding:3px 3px 3px 10px;} </style><div id='grid_main' class='page' style='width:".($this->total_w_corrigido)."px'>";
			
			if ($this->has_pesquisa) $this->saida[] = "<div class='header' id='head_$this->tbname$camp' name=''><div class='pesqui'></div>Pesquisa<div class='closebut' id='close_head_$this->tbname$camp' name='$this->tbname$camp' onClick='new function() { var p = document.getElementById(\"P1_$this->tbname\"); p.style.display = (p.style.display==\"none\") ? \"\" : \"none\" ;}'></div></div><div id='P1_$this->tbname' class='pesq' style='display:none'></div>"; 
			
			$this->saida[] = "<div class='wbshead'></div><div id='tbcont_".$this->idname."'></div><div id='bottom_".$this->idname."'></div></div>";
			
			$this->saida[] = "<script>";
			$this->saida[] = " 	WBS.modulo.".$this->tbname." = new function() {";
			$this->saida[] = "	this.formatter = {};";
			if(is_array($this->formatter)){
				foreach ($this->formatter as $k => $v) {
					$this->saida[] = $v;
				}
			}	
			
			$this->saida[] = "	this.editor ={};";		
			if(is_array($this->editor)){
				foreach ($this->editor as $k => $v) {
					$this->saida[] = $v;
				}
			}	
			if ($this->has_pesquisa)  $this->saida[] = "  this.pq = document.getElementById('P1_".$this->tbname."');";
			if ($this->has_pesquisa)  $this->saida[] = "  this.pq.style.display = 'none'";			
			
			$this->saida[] = "	this.coldefs = ".$this->json($this->coluna).";";
			//$this->saida[] = "  this.source = '".$this->source."'; alert(this.source.length);";
			$this->saida[] = "	this.ds = new YAHOO.util.DataSource('".$this->source."');";
			$this->saida[] = " 	this.ds.responseType = YAHOO.util.DataSource.TYPE_JSON;";
			$this->saida[] = " 	this.ds.responseSchema = ".$this->json($this->getSchema()).";";
			
			$this->saida[] = " 	this.confs = ".$this->json($this->configs).";";
			
			$this->saida[] = " 	this.dt = new YAHOO.widget.DataTable('tbcont_".$this->idname."', this.coldefs, this.ds, this.confs);";
			
			$this->saida[] = "this.dt.requestBuilder = function(oState, oSelf) { \r\n
				
				oState = oState || {pagination:null, sortedBy:'eduardo'};
				if (oState.sortedBy == 'null') { alert('null'); } else {
				
				var sorte = oState.sortedBy.key || oSelf.getColumnSet().keys[0].getKey();
				var dir = (oState.sortedBy && oState.sortedBy.dir === YAHOO.widget.DataTable.CLASS_DESC) ? 'DESC' : 'ASC'; 
				
				var startIndex = (oState.pagination) ? oState.pagination.recordOffset : 0; 
				var results = (oState.pagination) ? oState.pagination.rowsPerPage : ".(isset($this->rows))?$this->rows:'30'."; 
				var filtro = oSelf.filtro || '';
		
				return filtro + '&startIndex=' + startIndex + '&results=' + results+ '&dir=' + dir + '&sort=' + sorte;}  }";

			//FUNCOES ESPECIFICAS DO GRID
			if(is_array($this->funcoes)){
				foreach ($this->funcoes as $k => $v) {
					$this->saida[] = $v['fun'];
				}
			}
			$this->saida[] = 'this.dt.set("MSG_LOADING","CARREGANDO ...");';
			$this->saida[] = "this.dt.getSelectedsAsPost = function(){
				var sels = this.getSelectedRows();
				var retData = '',amp = '?';
				for (recKey in sels) {
					if (recKey != '______array') {
						var record = this.getRecord(sels[recKey]);
						retData += amp+recKey+'='+record.getData(".$this->keyfield.");
						amp = '&';
					};
					
				};
				return retData;
			}; ";
			$this->saida[] = "this.dt.sendPesquisaFiltro = function(){
				var oState = this.getState() || {pagination:{recordOffset:0, rowsPerPage:10}, sortedBy:{key: ".$this->configs[sortedBy]['key']." ,dir:'ASC'}}; 
				var sorte = oState.sortedBy.key || ".$this->coluna[0]['key'].";
				var dir = (oState.sortedBy && oState.sortedBy.dir === YAHOO.widget.DataTable.CLASS_DESC) ? 'DESC' : 'ASC'; 
				var startIndex = oState.pagination.recordOffset || 0; 
				var results = oState.pagination.rowsPerPage || 20; 
				this.filtro = this.pfunc();
				var url = this.filtro + '&startIndex=' + startIndex + '&results=' + results+ '&dir=' + dir + '&sort=' + sorte; 
				
				this.getDataSource().sendRequest(url, {
					success:this.onDataReturnReplaceRows,
					failure:this.onDataReturnReplaceRows,//onDataReturnInitializeTable,
					scope:this,
					argument:this
				}
			);
			}; ";
			$this->saida[] = "this.dt.reload = function() { this.requery(this.requestBuilder(this.getState(),this)); } ";	
			//EVENTOS PROPRIOS DO OBJETO TABLE
			$this->saida[] = 'this.dt.subscribe("rowUnselectEvent", function(ev) { this.dt.onEventUncheckCheckbox(ev); });';
			$this->saida[] = 'this.dt.subscribe("renderEvent", function(ev) { 
				if (WBS.tooltips.length>0) { 		
					var ttr = document.getElementById("ttr");
					if (ttr != null) { document.body.removeChild(ttr); }
					WBS.tooltip = new YAHOO.widget.Tooltip("ttr", { context: WBS.tooltips });
					WBS.tooltips = new Array();
				}
	 		})';
			//SERIALIZANDO ARRAY DE EVENTOS
			if(is_array($this->dt_eventos)){
				foreach ($this->dt_eventos as $k => $v) {
					$this->saida[] = $v;
				}
			}
			
			$this->saida[] = "this.dt.set('generateRequest',this.dt.requestBuilder);";
			
			$this->saida[] = 'this.dt.subscribe("cellDblclickEvent", this.dt.onEventShowCellEditor );';
			
			$this->saida[] = "this.dt.handleDataReturnPayload = function(oRequest, oResponse, oPayload) {
				var msg = oResponse.meta.msg;
				var debug = oResponse.meta.debug;
				if (typeof(msg) != 'undefined') this.set('MSG_EMPTY','<center><br><b><font size=\"2\">'+msg+'</font></b><br><br></center>'); 
				if (typeof(oResponse.meta.debug) != 'undefined') WBS.console.add_sql(debug);
				oPayload.totalRecords = oResponse.meta.totalRecords;
				return oPayload;}";
				

			
			
			//SUBSCRIBERS DE EVENTOS ATRELADOS AO DATASOURCE			
				#EVENTO QUE MOSTRA A MASCARA 'CARREGANDO ...'
			$this->saida[] = "this.ds.subscribe('requestEvent', function(ev) { WBS.wait.show(); });";
			
			
				#EVENTO QUE ESCONDE A MASCARA AO ACABAR DE CARREGAR
			$this->saida[] = "this.ds.subscribe('responseParseEvent',function(ev) { WBS.wait.hide(); });";	
			
			
			if(is_array($this->ds_eventos)){
				
				foreach ($this->ds_eventos as $k => $v) {
				
					$this->saida[] = $v;
				
				}
				
			}			
			if ($this->has_pesquisa) {
				$this->saida[] = "this.pq.innerHTML =\"\" "; 
				foreach ($this->pesquisa[1] as $k => $val){
					$this->saida[] = "this.pq.innerHTML += \"$val\"";
				}	
						
				$this->saida[] = "this.pq.style.display = '';";
				$this->saida[] = "this.pq.innerHTML += \"<button onclick='WBS.modulo.$this->tbname.dt.sendPesquisaFiltro()'>Pesquisar</button>\";";
				$this->saida[] = "this.dt.pfunc = function() {";
				$this->saida[] = " var condicoes = ''";  
				foreach ($this->pesq_ids as $k=>$id){
					$this->saida[] = "var junc_$this->tbname$id = document.getElementById('junc_$this->tbname$id');";
					$this->saida[] = "var input_$this->tbname$id = document.getElementById('input_$this->tbname$id') || '';";
					$this->saida[] = "var likeis_$this->tbname$id = document.getElementById('like_$this->tbname$id') || '';";
					$this->saida[] = "var valor_$this->tbname$id = (likeis_$this->tbname$id.value == ' LIKE ') ? '%'+input_$this->tbname$id.value+'%' : input_$this->tbname$id.value;";
					$this->saida[] = "if ((valor_$this->tbname$id!='') && (valor_$this->tbname$id!='%%')) condicoes += junc_$this->tbname$id.value + input_$this->tbname$id.name + likeis_$this->tbname$id.value + '\"'+valor_$this->tbname$id+'\"' ";
				}
				
				$this->saida[] = " return changeIt('&".$this->p_tipo."='+condicoes)";
				$this->saida[] = "}";
			}
			if ($this->has_pesquisa) $this->saida[] = " this.pq.style.display = 'none'";
			$this->saida[] = " };";
			$this->caller = " WBS.modulo.".$this->tbname."();  ";
			$this->saida[] = $this->getListeners();
			$this->saida[] = "</script>";
			$this->loaded = true;
			return $this->saida;
		}
		
		public function caller() {
			return $this->caller;
		}
		
		public function imprime(){	
			
			$ext = (!$this->loaded)?$this->loadGrid():$this->saida;			
			foreach ($ext as $k => $linha) {
				echo $linha."\r\n";
			}
		
		}
	}

?>