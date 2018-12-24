<?php
	$labelroot = "ROOT_WWW";
	$campos = 'frm_formulario.idformulario as ID,frm_formulario.*, frm_formulario.nome as label';
	$tab = 'frm_formulario';
	$idgeral = 'SVN';
	$cond = 'true';
	

	$funcao_clique = "
		eval('var oTable = '+onscreen.dt[0]);
		callback = {
			success: oTable.onDataReturnReplaceRows,
			scope: oTable,
			argument: oTable.getState()
		}			
		if (node.data.path != '".DIR_PATH."'){
			var url = '&path='+node.data.path;
			oTable.path = url;
			oTable.getDataSource().sendRequest(url,callback);
		}
		caminho(node.data.path);
	";	
	
			$data .= "<div id='tree_div$idgeral'></div>";
			$data .= "<script>";
			$data .="function loadNodeData(node, fnLoadComplete)  {
    WBS.node = node;

    var nodeLabel = encodeURI(node.label);
    var sUrl = \"ajax_html.php?file=".encode('modulos/svn_adm/ajax_diretorios.php')."&path=\"+node.data.path;
    var callback = {
       success: function(oResponse) {
            var oResults = eval(\"(\" + oResponse.responseText + \")\");
			WBS.result = oResults;
            if((oResults) && (oResults.length)) {

                if(YAHOO.lang.isArray(oResults)) {
                    for (var i=0, j=oResults.length; i<j; i++) {
                        tempNode = new YAHOO.widget.MenuNode({label:oResults[i]['label'], path:oResults[i]['path']}, node, false);
					
					tempNode.labelStyle = oResults[i]['estilo'];
                    }
				}
            }
            oResponse.argument.fnLoadComplete();
        },
        
        failure: function(oResponse) {
            YAHOO.log(\"Failed to process XHR transaction.\", \"info\", \"example\");
            oResponse.argument.fnLoadComplete();
        },
        
        argument: {
            \"node\": node,
            \"fnLoadComplete\": fnLoadComplete
        },

        timeout: 7000
    };
    
    YAHOO.util.Connect.asyncRequest('GET', sUrl, callback);
}";


			$data .= "loader = new YAHOO.util.YUILoader({require:['treeview'],loadOptional:true, onSuccess:function(){
			var tree".$idgeral." = new YAHOO.widget.TreeView('tree_div".$idgeral."');\r\n";
			$data .= "tree".$idgeral.".setDynamicLoad(loadNodeData);\r\n";
			$data .= "var root".$idgeral." = tree".$idgeral.".getRoot();\r\n";
			
			$data .= "var var".$idgeral." = new YAHOO.widget.MenuNode({ID:0, label:'".$labelroot."', path:'".DIR_PATH."'}, root".$idgeral.", true );\r\n";

			$data .= "tree".$idgeral.".subscribe('labelClick',function(node){ ".$funcao_clique."; });\r\n";
			$data .= "tree".$idgeral.".subscribe('expand',function(node){ ".$funcao_expande."; });\r\n";
			$data .= "tree".$idgeral.".subscribe('collapse',function(node){ ".$funcao_collapse."; });\r\n";
			
			$data .= "tree".$idgeral.".draw(); }});\r\n";
			$data .= "loader.insert();";
			$data .= "</script>";
			


echo $data;
?>