<?
	//header('Content-Type: text/html; charset=UTF-8');
?>
<style>
#demo {
}

#demo .yui-content {
    padding:1em;
}

#demo .loading {
    background-image:url(img/loading.gif);
    background-position:center center;
    background-repeat:no-repeat;
}

#demo .loading * {
    display:none;
}
</style>

<script>
YAHOO.util.Event.onContentReady('doc', function() { 
tabView.appendTo('doc'); 
});
</script>
    <div><h1><?=$pgo[0]['nomem']?></h1></div>
    <div id="loadmsg"></div>
<?
	showabas($pgo[0]['codpg'],'adm_producao');
?>
<center><div id="msg" style="display:none" class="alerta"></div></center>
<div id="doc" class="doc" class="yui-skin-sam"></div>