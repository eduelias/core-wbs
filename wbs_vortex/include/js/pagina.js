
	if (typeof WBS == "undefined") {
		var WBS = {};
	}

	var tempNode = new Array();
	WBS.upTable = new Array();

	WBS.tooltips = new Array();
	
	WBS.console = {
		output:{
			el:document.createElement('div'),
			ex:function(s){
				this.el.innerHTML = s+this.el.innerHTML;		
			},
			init:function(){
				this.el.innerHTML = 'CONSOLE INICIADO <button onclick="WBS.console.clear()"> CLS </button><br>';
				document.body.appendChild(this.el);
			}
		},
		clear:function(){
			this.output.el.innerHTML = 'CONSOLE RESETADO <button onclick="WBS.console.clear()"> CLS </button><br>';
		},
		add_sql:function(o) {		
			
			var saida = '';
			var sql;
			var mysqlerr;
			
			for (var recKey in o){
				eval('sql = o.'+recKey+'.sql ; mysqlerr=o.'+recKey+'.mysqlerr');
				
				saida += ("CALL:["+recKey+"] = SQL: "+sql+"<br>ERRO: "+mysqlerr+"<BR>");
				
			}			
			this.output.ex(saida);
		},
		add:function(o) {
			var saida = '';
			for (var recKey in o){
				saida += recKey+' '+o[recKey];
			}
			this.output.ex('add'+saida+'<br>');
		}
	
	}; //CARREGADOR DO 'FUTURO' DEBUGGER
	
	
	WBS.reloadGrids = function (o) {
		for (i=0; i<onscreen.dt.length; i++){
			if(onscreen.dt[i]) {
				eval(onscreen.dt[i]+'.reloadTable()');
			}
		}
	}

WBS.mascara_valor = function (form_campo, tam)
{
	var tecla;
	
	if (!tam) {
		tam = 13;
	} else {
		if (tam < 6) {
			tam = tam + 1;
		} else {
			if (tam < 9) {
				tam = tam + 2;
			} else {
				if (tam < 11) {
					tam = tam + 3
				} else {
					tam = tam + 3
				}
			}
		}
	}
	
	var code,tecla,e;
	e = event;
	
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which; // Netscape 4.?
	else if (e.charCode) code = e.charCode; // Mozilla 
	
	tecla = code;
	alert(tecla);
	if ((((tecla) > 47) && ((tecla) < 58)&&(tecla != 9)) || (tecla = 8)) //teclas numericas
	{
		//valor do form_campo
		numdig = form_campo.value;
		//tamanho (caracteres) do valor do form_campo
		tamdig = numdig.length;
		//inicia variavel contador
		contador = 0;
		if (tamdig > -1 && tamdig < tam) { //limita 13 caracteres (99.999.999,99)
			//inicia variavel numer		
			numer = "";
			for (i = tamdig; (i >= 0); i--){ //looping de acordo com a variavel tamdig
				if ((parseInt(numdig.substr(i,1))>=0) && (parseInt(numdig.substr(i, 1))<=9)) { //
					//incrementa a variavel contador
					contador++;
					if (contador == 2) {
						//adiciona a "," (vírgula)
						numer = ","+numer;
					}
					if ((contador == 5) || (contador == 8) || (contador == 11)) { //de 3 em 3
						//adiciona o "." (ponto)
						numer = "."+numer;
					}
					//soma o resto do valor com o ponto
					numer = numdig.substr(i, 1)+numer;
				}
			}
			//seta o valor do form_campo
			form_campo.value = numer;
			//retorno da funcao
			return true;
		} else {
			//retorno da funcao
			return false;
		}
	} else {
		//retorno da funcao
		return(false)
	}
}
	myRowFormatter = function(elTr,oRecord) {}; //NÃO DELETAR. ALGUNS ARQUIVOS NÃO TÊM ROW FORMATTER E É SETADO.
	
	WBS.reloga = function(o){
		if (typeof(o) != 'string') {
			eval("resp = " + o);
			if (resp.erro == 1) {
				alert('CONEXÃO ESPIROU. RELOGUE');
				window.location = '<?=DIR_HOME?>';
			}
		}
		return true;
	}
		WBS.conn = YAHOO.util.Connect;
		WBS.conn.startEvent.subscribe(WBS.reloga);
		WBS.conn.failureEvent.subscribe(WBS.reloga);


	YAHOO.widget.DataTable.prototype.requery = function(newRequest){
		
		if (newRequest===undefined){
			if(typeof(this.requestBuilder)=='undefined'){
				newRequest = this.get('initialRequest');
			} else {
				newRequest=	this.requestBuilder(this.getState(),this);
			}
			
		}
		var cb ={ 
		  success : this.onDataReturnInitializeTable, 
		  scope : this, 
		  argument : this.getState() 
		}; 
		this.getDataSource().sendRequest(newRequest, cb, this);
	}
		
	WBS.collapse = function (node){
		while (node.children.length) {
            treelateral._deleteNode(node.children[0]);
        }
		node.childrenRendered = false;
        node.dynamicLoadComplete = false;
        node.updateIcon();
	}
	
	WBS.sendSTDForm = function(form) { //funçao padrão para envio de form, sem setar method ou action;
		YAHOO.util.Connect.setForm(form);
		var _hand = {
			success:function(o){
				divCentral.off();
			}
		}
		var cObj = YAHOO.util.Connect.asyncRequest('post', encodeURI('modulos/formularios/act.php'), _hand);

		return false;
	}
			
	WBS.sendForm = function(form, ccc) { // função com method e action próprios para envio de form.

		WBS.conn.setForm(form);
		var cObj = WBS.conn.asyncRequest(form.method, encodeURI(form.action), {success:function(o){ var oTable;
		eval('oTable = '+onscreen.activeTb);
		oTable.requery();}, failure:function(o){ ;}});

		if ( typeof ccc == 'undefined' ) {
			divCentral.off();
		}
		return false;
	}
	
	WBS.loadNode = function (node){
		callback = {
			success: function (oResponse){ 
				var oResults = eval("(" + oResponse.responseText + ")");
				if((oResults.ResultSet.Result) && (oResults.ResultSet.Result.length)) {
					
					//Result is an array if more than one result, string otherwise
					if(YAHOO.lang.isArray(oResults.ResultSet.Result)) {
						for (var i=0, j=oResults.ResultSet.Result.length; i<j; i++) {
						tempNode = new YAHOO.widget.TextNode(oResults.ResultSet.Result[i], node, false, {id:oResults.ResultSet.Result[i]['ID'], tipo:oResults.ResultSet.Result[i]['tipo']});
						tempNode.labelStyle = oResults.ResultSet.Result[i]['estilo'];
						tempNode.isLeaf = oResults.ResultSet.Result[i]['leaf'];
						}
					} else {
					//there is only one result; comes as string:
						tempNode = new YAHOO.widget.TextNode(oResults.ResultSet.Result, node, false, {id:oResults.ResultSet.Result[i]['ID'], tipo:oResults.ResultSet.Result[i]['tipo']})
						tempNode.labelStyle = oResults.ResultSet.Result[i]['estilo'];
						tempNode.isLeaf = oResults.ResultSet.Result[i]['leaf'];
					}	
				}
			},
			failure: function(oResponse){
				alert('erro 126');	
			}
		}		
		
		var nodeLabel = encodeURI(node.label);
		var sUrl = "modules/mod_teste/hander.php?id=" + node.data['ID'] + "&tipo=" + node.data['tipo'];
		WBS.conn.asyncRequest('GET', sUrl, callback);
	}

	WBS.addIDTree = function (o, tar, elTree) {
		WBS.wait.show();
		var RecordIds = o.getSelectedRows();
		var dataIds = new Array();
		var recordset = o.getRecordSet();
		
		for (i=0; i<RecordIds.length; i++){
			data = recordset.getRecord(RecordIds[i])
			dataIds.push(data._oData['id']);
			WBS.IDs[data._oData['id']] = true;

		}
		
		var target = tar;
		_hande = {	 
			success: function(oResponse){ 
				node = elTree.getNodeByProperty('ID',WBS.MID);
				node.isLeaf = false;
				node.collapse();
				elTree.removeChildren(node);
				node.expand();
				o.unselectAllRows();
				o.refreshView();
				checkboxes = YAHOO.util.Dom.getElementsByClassName(YAHOO.widget.DataTable.CLASS_CHECKBOX, "input", o.getTbodyEl());	
				WBS.wait.hide();

			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].checked == true) {
					checkboxes[i].checked = false;
				}
			}
			//if (l) { 
			//	location.reload(); 
			//}
		},
		failure: function(o){  },
		timeout:1000
			
		}
		
		var dt = '';
		for (var i=0; i==WBS.IDRel.length; i++){
			dt += WBS.IDRel[WBS.nxh[i]]+'_';
		}
		var url = "ajax_html.php?f=WWpJMWFHSklVbXhqYlVWMVkwZG9kdz09&arr="+dataIds+"&tipo="+target+"&tabela=treeadd&keys="+WBS.IDRel['last'];
		//alert(url);
		WBS.conn.asyncRequest('GET',url, _hande, null);		
	}
	
	WBS.callbackrefresh = function (o){
		WBS.reloadGrids(o);
	}
	
	WBS.cbrefresh = {
		success: function(o){
		
		},
		failure: function (o){
			alert('Transação não concluida');
		}
	}
	
	WBS.pagina = function() {};
	
	WBS.findTable = new Array();
	
	[].indexOf || (Array.prototype.indexOf = function(v,n){
		  n = (n==null)?0:n; var m = this.length;
		  for(var i = n; i < m; i++)
			if(this[i] == v)
			   return i;
		  return -1;
		});

	WBS.pagina.prototype._grid = null;
	WBS.pagina.prototype._cpanel = null;
	WBS.pagina.prototype.oldtab = null;
	WBS.pagina._opentabs = new Array();
	WBS.pagina.cl = function (param) {
		var kar = '<span id="tl'+param+'">'+ param+'</span><span class="close"><img src="images/close.gif" alt="Fechar esta aba"></span>';
		return kar;
	}
	
	WBS.pagina.ExtraiScript = function(texto){
		var ini, pos_src, fim, codigo;
    var objScript = null;
    ini = texto.indexOf('<script', 0)
    while (ini!=-1){
	
        var objScript = document.createElement("script");
        //Busca se tem algum src a partir do inicio do script
        pos_src = texto.indexOf(' src', ini)
        ini = texto.indexOf('>', ini) + 1;

        //Verifica se este e um bloco de script ou include para um arquivo de scripts
        if (pos_src < ini && pos_src >=0){//Se encontrou um "src" dentro da tag script, esta e um include de um arquivo script
            //Marca como sendo o inicio do nome do arquivo para depois do src
            ini = pos_src + 4;
            //Procura pelo ponto do nome da extencao do arquivo e marca para depois dele
            fim = texto.indexOf('.', ini)+4;
            //Pega o nome do arquivo
            codigo = texto.substring(ini,fim);
            //Elimina do nome do arquivo os caracteres que possam ter sido pegos por engano
            codigo = codigo.replace("=","").replace(" ","").replace("\"","").replace("\"","").replace("\'","").replace("\'","").replace(">","");
            // Adiciona o arquivo de script ao objeto que sera adicionado ao documento
            objScript.src = codigo;
        }else{//Se nao encontrou um "src" dentro da tag script, esta e um bloco de codigo script
            // Procura o final do script
            fim = texto.indexOf('</script>', ini);
            // Extrai apenas o script
            codigo = texto.substring(ini,fim);
            // Adiciona o bloco de script ao objeto que sera adicionado ao documento
            objScript.text = codigo;
        }
        //Adiciona o script ao documento
       // document.getElementById('container').appendChild(objScript);
        // Procura a proxima tag de <script
        ini = texto.indexOf('<script', fim);
		eval(objScript.text);
		//Limpa o objeto de script
        objScript = null;
    }
	loadform.sucesso();
}
	
	 textCounter = function(field, countfield, maxlimit) {
		if (field.value.length > maxlimit)
		{field.value = field.value.substring(0, maxlimit);}
		else
		{countfield.innerHTML = maxlimit - field.value.length;}
	 }
	
	WBS.pagina.pesqByField = function (oField, oTable, add){
		if (typeof(add)=='undefined') { add = true } else { add = false; }
		var cond = '';
		var counter = 0;
		oTable = (typeof oTable=="undefined")?WBS.upTable[0]:eval(oTable);
		var pgn = oTable.configs.paginator;
		var startIndex = pgn.getStartIndex();
		var results = pgn.getRowsPerPage();
		var sortby = oTable.configs.sortedBy.key;
		pgn.setState({page:1});
		
		if (oField.value != ''){
			if (counter != 0) { cond = cond+' AND '; }
			counter++;
			var str = '*'+oField.value;
			var pass = str.replace('*',"%25");
			pass = pass.replace('*','%25');
			pass = pass.replace('*','%25');
			pass = pass.replace('*','%25');
			if (add) {
				cond = oTable._CINI+' AND '+cond+oField.name+" LIKE '"+pass+"%25'";
			} else {
				cond = cond+oField.name+" LIKE '"+pass+"%25' ";
			}
		} else {
			cond = oTable._CINI;
		}
		
		callback = {
			success: oTable.onDataReturnReplaceRows,
			scope: oTable,
			argument: oTable.getState()
		}			
		var url = '&condicao=' + cond +'&startIndex=0&results='+ results + '&sort=' + sortby + '&ord=asc';
		oTable.sCond = cond;
		oTable.getDataSource().sendRequest(url,callback);
	}
	

WBS.pagina.pesquisa = function (campos, tabelas, oForm, oTable){
		//oForm = oForm.parentNode;
		var cond = '';
		var counter = 0;
		oTable = (typeof oTable=="undefined")?WBS.upTable[0]:eval(oTable);
		var pgn = oTable.configs.paginator;
		var startIndex = pgn.getStartIndex();
		var results = pgn.getRowsPerPage();
		var sortby = oTable.configs.sortedBy.key;
		WBS.form = oForm;
		for (var i=1; i < oForm.elements.length-1; i++){
			if (oForm.elements[i].value != ''){
				if (counter != 0) { cond = cond+' AND '; }
				counter++;
				var str = oForm.elements[i].value;
				var pass = str.replace('*',"%25");
				pass = pass.replace('*','%25');
				pass = pass.replace('*','%25');
				pass = pass.replace('*','%25');
				//alert(pass);
				cond = cond+oForm.elements[i].id+" LIKE '"+pass+"'";
			}
		}
		
		callback = {
			success: oTable.onDataReturnReplaceRows,
			scope: oTable,
			argument: oTable.getState()
		}
		
		var url = '?campos='+campos+'&obj=' + tabelas + '&condicao=' + cond +'&startIndex=' + startIndex + '&results='+ results + '&sort=' + sortby;
		oTable.sCond = cond;
		oTable.getDataSource().sendRequest(url,callback);
		
		//if (counter == 0) { alert('Formulario em branco'); } else {
			//var oDs = oTable.getDataSource();
       		//oDs.sendRequest('?campos='+campos+'&obj=' + tabelas + '&condicao=' + cond +'&pagina=1&numregistro=15',  callback, oTable);
		//}
	}
	
	WBS.pagina._msg = function(tipo, alerta){
		var msg = document.getElementById('msg');
		msg.innerHTML = '<center><div style="Filter: Alpha(Opacity=50); background: url(\'images/msg_'+tipo+'.png\') no-repeat; height:32px; width:300px;"><table height="32px" width="100%"><tr><td></td><td valign="middle" align="center"> '+ alerta + '</td></tr></td></div></center>';
		msg.className="";
		YAHOO.util.Dom.addClass(msg, tipo);
		YAHOO.util.Dom.setStyle(msg, 'display', 'block');
		setTimeout('WBS.pagina._msg.off()',1300);
	}
	
	WBS.pagina._msg.static = function(tipo, alerta){
		var msg = document.getElementById('msg');
	//	msg.innerHTML = alerta;
		msg.innerHTML = '<center style="position:fixed"><div style="background: url(\'images/msg_'+tipo+'.png\') no-repeat; height:32px; width:300px; position:fixed;"><table height="32px" width="100%"><tr><td></td><td valign="middle" align="center"> '+ alerta + '</td></tr></td></div></center>';
		msg.className="";
		YAHOO.util.Dom.addClass(msg, tipo);
		YAHOO.util.Dom.setStyle(msg, 'display', 'block');
	}
	
	WBS.pagina._msg.off = function(){
		document.getElementById('msg').className = '';
		document.getElementById('msg').style.display = 'none';	
	}
	
	WBS.pagina.showForm = {
		_arquivoAcesso:null,
		_caption:null,
		_pan:null,
	
		init:function(arquivoAcesso, caption, pan) {
			//alert(pan);
			this._pan = pan;
			this._arquivoAcesso = arquivoAcesso;
			this._caption = caption;
			//alert(this._pan);
			var transaction = WBS.conn.asyncRequest('GET', arquivoAcesso, WBS.pagina.resultShowForm, null); 
		},
		sucesso:function(o) {
			
			var captionContainer = YAHOO.util.Dom.getElementsByClassName("CollapsiblePanelTab", "div", this._pan);
			var contentContainer = YAHOO.util.Dom.getElementsByClassName("CollapsiblePanelContent", "div", this._pan);

			captionContainer.innerHTML = this._caption;
			contentContainer[0].innerHTML = o.responseText;
			//alert(this._pan);
			YAHOO.util.Dom.setStyle(document.getElementById(this._pan), "display" , "block");

		},
		falha:function(o) {
			alert("Houve um erro ao tentar abrir o conteudo");
		}
	};
	WBS.pagina.resultShowForm = {
		success: WBS.pagina.showForm.sucesso,
		failure: WBS.pagina.showForm.falha,
		scope: WBS.pagina.showForm
	};
	
/**
 * Overridable custom event handler to check the checkboxes of the selected rows
 *
 * @method onEventCheckCheckbox
 * @param oArgs.event {HTMLEvent} Event object.
 * @param oArgs.target {HTMLElement} Target element.
 */
YAHOO.widget.DataTable.prototype.onEventCheckCheckbox = function(oArgs) {
	
	var elTarget;
	var elTag;

	if (YAHOO.lang.isArray(oArgs.el)) {
		elTarget = oArgs.els[0];
	}
	else {
		elTarget = oArgs.el;
	}
	
    elTag = elTarget.tagName.toLowerCase();
	
    // Traverse up the DOM to find the row
    while(elTag != "tr") {
        // Bail out
        if(elTag == "body") {
            return;
        }
        // Maybe it's the parent
        elTarget = elTarget.parentNode;
        elTag = elTarget.tagName.toLowerCase();
    }

	var checkboxes = YAHOO.util.Dom.getElementsByClassName( YAHOO.widget.DataTable.CLASS_CHECKBOX, "input", elTarget);

	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].checked = "true";
	}
};

/**
 * Overridable custom event handler to uncheck the checkboxes of the selected rows
 *
 * @method onEventUncheckCheckbox
 * @param oArgs.event {HTMLEvent} Event object.
 * @param oArgs.target {HTMLElement} Target element.
 */
YAHOO.widget.DataTable.prototype.onEventUncheckCheckbox = function(oArgs) {
	var sel;
	var elTarget;
	var elTag;
	var checkboxes = new Array();
	WBS.arg = oArgs;
	if (YAHOO.lang.isArray(oArgs.el)) {
		
		for (var j = 0; j < oArgs.els.length; j++) {
			
			elTarget = oArgs.el[j];
		    elTag = elTarget.tagName.toLowerCase();

			// Traverse up the DOM to find the row
			while(elTag != "tr") {
				// Bail out
				if(elTag == "body") {
					return;
				}
				// Maybe it's the parent
				elTarget = elTarget.parentNode;
				elTag = elTarget.tagName.toLowerCase();
			}
		
			checkboxes = YAHOO.util.Dom.getElementsByClassName(YAHOO.widget.DataTable.CLASS_CHECKBOX, "input", elTarget);
		
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].checked == true) {
					checkboxes[i].checked = false;
				}
			}
		}
	}
	else {
		elTarget = oArgs.el;
		elTag = elTarget.tagName.toLowerCase();

// Traverse up the DOM to find the row
		while(elTag != "tr") {
			// Bail out
			if(elTag == "body") {
				return;
			}
			// Maybe it's the parent
			elTarget = elTarget.parentNode;
			elTag = elTarget.tagName.toLowerCase();
		}
	
		checkboxes = YAHOO.util.Dom.getElementsByClassName(YAHOO.widget.DataTable.CLASS_CHECKBOX, "input", elTarget);
	
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked == true) {
				checkboxes[i].checked = false;

			}
		}
	}

};

/**
 * Override event handler to manage selection according to desktop paradigm following checkboxes
 *
 * @method onEventSelectRow
 * @param oArgs.event {HTMLEvent} Event object.
 * @param oArgs.target {HTMLElement} Target element.
 */
YAHOO.widget.DataTable.prototype.onEventSelectRowCheck = function(oArgs) {
    var sMode = this.get("selectionMode");
    if ((sMode == "singlecell") || (sMode == "cellblock") || (sMode == "cellrange")) {
        return;
    }
    var evt = oArgs.event;
    var elTarget = oArgs.target;
	WBS.rec = oArgs;
    var bSHIFT = evt.shiftKey;
    var bCTRL = true; //evt.ctrlKey || ((nheavigator.userAgent.toLowerCase().indexOf("mac") != -1) && evt.metaKey);
	//bCTRL = (oArgs.ind)?true:bCTRL;
    var i;
    //var nAnchorPos;

    // Validate target row
    var elTargetRow = this.getTrEl(elTarget);
    if(elTargetRow) {
        var nAnchorRecordIndex, nAnchorTrIndex;
        var allRows = this._elTbody.rows;
        var oTargetRecord = this.getRecord(elTargetRow);
		
        var nTargetRecordIndex = this._oRecordSet.getRecordIndex(oTargetRecord);
        var nTargetTrIndex = this.getTrIndex(elTargetRow);

        var oAnchorRecord = this._oAnchorRecord;
	
        if(oAnchorRecord) {
            nAnchorRecordIndex = this._oRecordSet.getRecordIndex(oAnchorRecord);
            nAnchorTrIndex = this.getTrIndex(oAnchorRecord);
            if(nAnchorTrIndex === null) {
                if(nAnchorRecordIndex < this.getRecordIndex(this.getFirstTrEl())) {
                    nAnchorTrIndex = 0;
                }
                else {
                    nAnchorTrIndex = this.getRecordIndex(this.getLastTrEl());
                }
            }
        }

        // Both SHIFT and CTRL
        if((sMode != "single") && bSHIFT && bCTRL) {
            // Validate anchor
            if(oAnchorRecord) {
                if(this.isSelected(oAnchorRecord)) {
                    // Select all rows between anchor row and target row, including target row
                    if(nAnchorRecordIndex < nTargetRecordIndex) {
                        for(i=nAnchorRecordIndex+1; i<=nTargetRecordIndex; i++) {
                            if(!this.isSelected(i)) {
                                this.selectRow(i);
                            }
                        }
                    }
                    // Select all rows between target row and anchor row, including target row
                    else {
                        for(i=nAnchorRecordIndex-1; i>=nTargetRecordIndex; i--) {
                            if(!this.isSelected(i)) {
                                this.selectRow(i);
                            }
                        }
                    }
                }
                else {
                    // Unselect all rows between anchor row and target row
                    if(nAnchorRecordIndex < nTargetRecordIndex) {
                        for(i=nAnchorRecordIndex+1; i<=nTargetRecordIndex-1; i++) {
                            if(this.isSelected(i)) {
                                this.unselectRow(i);
                            }
                        }
                    }
                    // Unselect all rows between target row and anchor row
                    else {
                        for(i=nTargetRecordIndex+1; i<=nAnchorRecordIndex-1; i++) {
                            if(this.isSelected(i)) {
                                this.unselectRow(i);
                            }
                        }
                    }
                    // Select the target row
                    this.selectRow(oTargetRecord);
                }
            }
            // Invalid anchor
            else {
                // Set anchor
                this._oAnchorRecord = oTargetRecord;

                // Toggle selection of target
                if(this.isSelected(oTargetRecord)) {
                    this.unselectRow(oTargetRecord);
                }
                else {
                    this.selectRow(oTargetRecord);
                }
            }
        }
        // Only SHIFT
        else if((sMode != "single") && bSHIFT) {
            this.unselectAllRows();

            // Validate anchor
            if(oAnchorRecord) {
                // Select all rows between anchor row and target row,
                // including the anchor row and target row
                if(nAnchorRecordIndex < nTargetRecordIndex) {
                    for(i=nAnchorRecordIndex; i<=nTargetRecordIndex; i++) {
                        this.selectRow(i);
                    }
                }
                // Select all rows between target row and anchor row,
                // including the target row and anchor row
                else {
                    for(i=nAnchorRecordIndex; i>=nTargetRecordIndex; i--) {
                        this.selectRow(i);
                    }
                }
            }
            // Invalid anchor
            else {
                // Set anchor
                this._oAnchorRecord = oTargetRecord;

                // Select target row only
                this.selectRow(oTargetRecord);
            }
        }
        // Only CTRL
        else if((sMode != "single") && bCTRL) {
            // Set anchor
            this._oAnchorRecord = oTargetRecord;

            // Toggle selection of target
            if(this.isSelected(oTargetRecord)) {
                this.unselectRow(oTargetRecord);
            }
            else {
                this.selectRow(oTargetRecord);
            }
        }
        // Neither SHIFT nor CTRL and "single" mode
        else if(sMode == "single") {
            this.unselectAllRows();
            this.selectRow(oTargetRecord);
        }
        // Neither SHIFT nor CTRL
        else {
            // Set anchor
            this._oAnchorRecord = oTargetRecord;

            // Select only target
            this.unselectAllRows();
            this.selectRow(oTargetRecord);
        }

        // Clear any selections that are a byproduct of the click or dblclick
        var sel;
        if(window.getSelection) {
        	sel = window.getSelection();
        }
        else if(document.getSelection) {
        	sel = document.getSelection();
        }
        else if(document.selection) {
        	sel = document.selection;
        }
        if(sel) {
            if(sel.empty) {
                sel.empty();
            }
            else if (sel.removeAllRanges) {
                sel.removeAllRanges();
            }
            else if(sel.collapse) {
                sel.collapse();
            }
        }
    }
    else {
    }
};
/* FUNCOES PARA LIMPEZA DE CHAR PARA PESQUISA */
var hexVals = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
              "A", "B", "C", "D", "E", "F");
var unsafeString = "\"<>%\\^[]`\+\$\,";
// deleted these chars from the include list ";", "/", "?", ":", "@", "=", "&" and #
// so that we could analyze actual URLs

function isUnsafe(compareChar)
// this function checks to see if a char is URL unsafe.
// Returns bool result. True = unsafe, False = safe
{
if (unsafeString.indexOf(compareChar) == -1 && compareChar.charCodeAt(0) > 32
    && compareChar.charCodeAt(0) < 123)
   { return false; } // found no unsafe chars, return false
else
   { return true; }
}

function decToHex(num, radix)
// part of the hex-ifying functionality
{
var hexString = "";
while (num >= radix)
      {
       temp = num % radix;
       num = Math.floor(num / radix);
       hexString += hexVals[temp];
      }
hexString += hexVals[num];
return reversal(hexString);
}

function reversal(s) // part of the hex-ifying functionality
{
var len = s.length;
var trans = "";
for (i=0; i<len; i++)
    { trans = trans + s.substring(len-i-1, len-i); }
s = trans;
return s;
}

function convert(val) // this converts a given char to url hex form
{ return  "%" + decToHex(val.charCodeAt(0), 16); }

function changeIt(val)
// changed Mar 25, 2002: added if on 122 and else block on 129 to exclude Unicode range
{
var state   = 'urlenc';
var len     = val.length;
var backlen = len;
var i       = 0;

var newStr  = "";
var frag    = "";
var encval  = "";
var original = val;

if (state == "none") // needs to be converted to normal chars
   {
     while (backlen > 0)
           {
             lastpercent = val.lastIndexOf("%");
             if (lastpercent != -1) // we found a % char. Need to handle
                {
                  // everything *after* the %
                  frag = val.substring(lastpercent+1,val.length);
                  // re-assign val to everything *before* the %
                  val  = val.substring(0,lastpercent);
                  if (frag.length >= 2) // end contains unencoded
                     {
                     //  alert ("frag is greater than or equal to 2");
                       encval = frag.substring(0,2);
                       newStr = frag.substring(2,frag.length) + newStr;
                       //convert the char here. for now it just doesn't add it.
                       if ("01234567890abcdefABCDEF".indexOf(encval.substring(0,1)) != -1 &&
                           "01234567890abcdefABCDEF".indexOf(encval.substring(1,2)) != -1)
                          {
                           encval = String.fromCharCode(parseInt(encval, 16)); // hex to base 10
                           newStr = encval + newStr; // prepend the char in
                          }
                       // if so, convert. Else, ignore it.
                     }
                  // adjust length of the string to be examined
                  backlen = lastpercent;
                 // alert ("backlen at the end of the found % if is: " + backlen);
                }
            else { newStr = val + newStr; backlen = 0; } // if there is no %, just leave the value as-is
           } // end while
   }         // end 'state=none' conversion
else         // value needs to be converted to URL encoded chars
   {
    for (i=0;i<len;i++)
        {
          if (val.substring(i,i+1).charCodeAt(0) < 255)  // hack to eliminate the rest of unicode from this
             {
              if (isUnsafe(val.substring(i,i+1)) == false)
                 { newStr = newStr + val.substring(i,i+1); }
              else
                 { newStr = newStr + convert(val.substring(i,i+1)); }
             }
          else // woopsie! restore.
             {
              //document.forms[0].state.value = "none";
              // document.forms[0].enc[0].checked = true; // set back to "no encoding"
               newStr = original; i=len;                // short-circuit the loop and exit
             }
        }


   }
    return newStr;
}