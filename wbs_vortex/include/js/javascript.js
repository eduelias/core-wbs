function insert_br(el)
{
	var text = el.textContent;
	el.textContent = '';
	var normalized_Enters = text.replace(/\r|\n/g, "\r\n");
	var text_with_br = normalized_Enters.replace(/\r\n/g, "</p><p align='justify'>");
	el.textContent = text_with_br;
	//alert(text_with_br);
	return text_with_br;
}

/*SIGAME = {
	relacionador:'WWxjNWEyUlhlR3hqZVRsNVdsZDRhR1JIYkhaaWJrMTJZMjFXYzFsWFRuWmFXRTExWTBkb2R3PT0=',
	action:null,
	id:null,
	empresa:null,
	nome_campo_a:null,
	nome_campo_b:null,
	valor_campo_a:null,
	valor_campo_b:null,
	nome_tb_a:null,
	nome_tb_b:null,
	nome_tb_rel:null,
	set_action:function(action){
		this.action = action;	
	},
	set_id:function(id){
		this.valor_campo_b = id;
	},
	save:function(){
		var str = 'ajax_html.php?file='+this.relacionador+'&ca='+this.nome_campo_a+'&id1='+this.valor_campo_a+'&cb='+this.nome_campo_b+'&id2='+this.valor_campo_b+'&tb_rel='+this.nome_tb_rel+'&emp='+this.empresa+'&act='+this.action;
		if (this.action=='ul1'){ 
			WBS.pagina._msg('alert','Relacionamento criado');
		} else {
			WBS.pagina._msg('alert','Relacionamento desfeito');
		}
		var trans = YAHOO.util.Connect.asyncRequest('GET', str, null)
	}
}*/

function array_search(busca,oarray){
    //ve se determinado valor existe no array e retorna sua chave
    for(var i in oarray){
        if(oarray[i]==busca){return true;}
    }
    return false;
}

var divCentral = {	
	_opened:false,
	_arquivo:null,
	oTable:null,
	carrega:function(arquivo, oTable){
		this.oTable = oTable;
		this._arquivo = arquivo;
		var trans = YAHOO.util.Connect.asyncRequest('GET', 'ajax_html.php?file='+arquivo, resultDiv)
	},
	on:function(o){
		WBS.panel2.setBody(o.responseText);
		WBS.panel2.show();
		WBS.pagina.ExtraiScript(o.responseText);
		WBS.pagina._msg.off();
	},
		
	off:function(){
		WBS.panel2.hide();
	}
}

var resultDiv = {
	success:divCentral.on, 
	failure:divCentral.off,
	scope:window,
	timeout:5000	
}

var loadform = {
	_div0:null,
	carregando:function(texto){
		WBS.wait.show();  
	},
	aparecer:function(texto){
		WBS.wait.show();
	},
	fundo:function(){
		WBS.wait.show();
	},
	socarrega:function(){
		WBS.wait.show();
	},
	off:function(texto) {
		WBS.wait.hide(); 
	},	
	sucesso:function(){
		setTimeout(function () { loadform.off() },1000);
	},
	sumir:function(){
		setTimeout(function() { loadform.off() }, 1000);	
	}
}

var cria_closes = function() {    
    tabView.on('contentReady', function() { // ensure Tabs exist before accessing
        YAHOO.util.Dom.batch(tabView.get('tabs'), function(tab) {
            YAHOO.util.Event.on(tab.getElementsByClassName('close')[0], 'click', handleClose, tab);
    	});
        
    	YAHOO.util.Event.on('add-tab', 'click', addTab, tabView, true);
  	});
    
    var handleClose = function(e, tab) {
        YAHOO.util.Event.preventDefault(e);
        tabView.removeTab(tab);
    };
};        

//********************************************************************* Resize Panel
YAHOO.namespace("example.container");

// BEGIN RESIZEPANEL SUBCLASS //
YAHOO.widget.ResizePanel = function(el, userConfig) {
	if (arguments.length > 0) {
		YAHOO.widget.ResizePanel.superclass.constructor.call(this, el, userConfig);
	}
}

YAHOO.widget.ResizePanel.CSS_PANEL_RESIZE = "yui-resizepanel";   
   
YAHOO.widget.ResizePanel.CSS_RESIZE_HANDLE = "resizehandle"; 


YAHOO.extend(YAHOO.widget.ResizePanel, YAHOO.widget.Panel, {

    init: function(el, userConfig) {
    
        YAHOO.widget.ResizePanel.superclass.init.call(this, el);
    
        this.beforeInitEvent.fire(YAHOO.widget.ResizePanel);
        
        var Dom = YAHOO.util.Dom,
            Event = YAHOO.util.Event,
            oInnerElement = this.innerElement,
            oResizeHandle = document.createElement("DIV"),
            sResizeHandleId = this.id + "_resizehandle";
         
         oResizeHandle.id = sResizeHandleId;
         oResizeHandle.className = YAHOO.widget.ResizePanel.CSS_RESIZE_HANDLE;
    
        Dom.addClass(oInnerElement, YAHOO.widget.ResizePanel.CSS_PANEL_RESIZE);
    
        this.resizeHandle = oResizeHandle;
    
        function initResizeFunctionality() {
    
            var me = this,
                oHeader = this.header,
                oBody = this.body,
                oFooter = this.footer,
                nStartWidth,
                nStartHeight = '500px',
                aStartPos,
                nBodyBorderTopWidth,
                nBodyBorderBottomWidth,
                nBodyTopPadding,
                nBodyBottomPadding,
                nBodyOffset;
    
    
            oInnerElement.appendChild(oResizeHandle);
    
            this.ddResize = new YAHOO.util.DragDrop(sResizeHandleId, this.id);
    
            this.ddResize.setHandleElId(sResizeHandleId);
    
            this.ddResize.onMouseDown = function(e) {
    
                nStartWidth = oInnerElement.offsetWidth;
                nStartHeight = oInnerElement.offsetHeight;
    
                if (YAHOO.env.ua.ie && document.compatMode == "BackCompat") {
                
                    nBodyOffset = 0;
                
                }
                else {
    
                    nBodyBorderTopWidth = parseInt(Dom.getStyle(oBody, "borderTopWidth"), 10),
                    nBodyBorderBottomWidth = parseInt(Dom.getStyle(oBody, "borderBottomWidth"), 10),
                    nBodyTopPadding = parseInt(Dom.getStyle(oBody, "paddingTop"), 10),
                    nBodyBottomPadding = parseInt(Dom.getStyle(oBody, "paddingBottom"), 10),
                    
                    nBodyOffset = nBodyBorderTopWidth + nBodyBorderBottomWidth + nBodyTopPadding + nBodyBottomPadding;
                
                }
    
                me.cfg.setProperty("width", nStartWidth + "px");
		//		me.cfg.setProperty("height", nStartHeight + "px");
    
                aStartPos = [Event.getPageX(e), Event.getPageY(e)];
    
            };
            
            this.ddResize.onDrag = function(e) {
    
                var aNewPos = [Event.getPageX(e), Event.getPageY(e)],
                
                    nOffsetX = aNewPos[0] - aStartPos[0],
                    nOffsetY = aNewPos[1] - aStartPos[1],
                    
                    nNewWidth = Math.max(nStartWidth + nOffsetX, 10),
                    nNewHeight = Math.max(nStartHeight + nOffsetY, 10),
                    
                    nBodyHeight = (nNewHeight - (oFooter.offsetHeight + oHeader.offsetHeight + nBodyOffset));
    
                me.cfg.setProperty("width", nNewWidth + "px");
    
                if (nBodyHeight < 0) {
    
                    nBodyHeight = 0;
    
                }
    
                oBody.style.height =  nBodyHeight + "px";
    
            };
        
        }
    
    
        function onBeforeShow() {
    
           initResizeFunctionality.call(this);
    		
           this.unsubscribe("beforeShow", onBeforeShow);
    
        }
    
    
        function onBeforeRender() {
    
            if (!this.footer) {
    
                this.setFooter("");
    
            }
    
            if (this.cfg.getProperty("visible")) {
    
                initResizeFunctionality.call(this);
    
            }
            else {
    
                this.subscribe("beforeShow", onBeforeShow);
            
            }
            
            this.unsubscribe("beforeRender", onBeforeRender);
    
        }
    
    
        this.subscribe("beforeRender", onBeforeRender);
    
    
        if (userConfig) {
    
            this.cfg.applyConfig(userConfig, true);
    
        }
    
        this.initEvent.fire(YAHOO.widget.ResizePanel);
    
    },
    
    toString: function() {
    
        return "ResizePanel " + this.id;
    
    }

});

