<? 
	include('css_grid.php'); 
	$IP_S =  $_SERVER['SERVER_ADDR'];
	$DNS = $_SERVER['HTTP_HOST'];
	$teste = explode('.',$DNS);
	if ($teste[0] == 'wbs-teste') { 
		define('DIR_PATH','/var/www/wbs');
	} else {
		define('DIR_PATH','/home/wbs/public_html/maxxmicro');
	}
	#echo shell_exec('ls -l');
?>
<script>
setTimeout('WBS.wait.hide()',4000);
caminho = function(path){
	eval('var oTable = '+onscreen.dt[0]);
	//oTable.configs.caption = path;
	//oTable.refresh;
	var elShow = document.getElementById('caminho');
	elShow.innerHTML = path;
}
svn_commit = function (){
	eval('var oTable = '+onscreen.dt[0]);
	falha = function() {
		WBS.wait.hide();
	}
	callback = {
		success: oTable.onDataReturnInitializeTable,
		failure:falha,
		scope: oTable
	}
	var path = oTable.path || '&path=<?=DIR_PATH?>/wbs_base';
	var url = '&atualiza=true'+path;
	oTable.getDataSource().sendRequest(url,callback);
}

dtrecall = function(){
	eval('var oTable = '+onscreen.dt[0]);
	
	falha = function() {
		WBS.wait.hide();
	}
	
	callback = {
		success: oTable.onDataReturnInitializeTable,
		failure:falha,
		scope: oTable
	}			
	var url = oTable.path || '&path=<?=DIR_PATH?>';
	oTable.getDataSource().sendRequest(url,callback);
}

svn_check_atualiza = function (){	
	WBS.wait.show();
	
	_hande = {	
		success: dtrecall,
		failure: dtrecall,
		timeout:1000
	}
	checks = document.getElementsByTagName('input');
	
	url = "ajax_html.php?file=<?=encode('modulos/svn_adm/ajax_atualiza.php')?>";
	for (i=0;i<checks.length;i++){
		if((checks[i].type == 'checkbox')&&(checks[i].checked)){
			url+= "&"+i+"="+checks[i].name;
		}															
	};
	WBS.conn.asyncRequest('GET',url, _hande);	
}
</script>
<table width="100%" style="font-size:10px; margin:0px;" cellpadding="10px;" class="yui-navset">
	<tr class="yui-content">
		<td width="20%" align="left" valign="top" style="border:thin solid #666666;"><? include('tree_diretorios.php');?></td>
    	<td width="80%" valign="top" align="center" style="border:thin solid #666666;">
        	<div id="salvar" onclick="javascript:svn_check_atualiza();" style="float:right; cursor:pointer;">
        		<img src="<?=VIMAGES?>edit_add.gif" /> SALVAR
            </div>
            <div id="commit" onclick="javascript:svn_commit();" style="float:left; cursor:pointer;">
            	<img src="<?=VIMAGES?>edit_add.gif" /> COMMIT
            <br /><div id="caminho"><?=DIR_PATH?>/wbs_base</div></div>
        	
            
			<? include('grid_atualizacoes.php');?>
        </td>
    </tr>
</table>
<script>
	WBS.wait.hide();
</script>
