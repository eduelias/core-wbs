<script>
deleta = function(o){

			_hand = {
			success:function(o){ },
			failure:function(o){ },
			timeout:1000
		}
		
		var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('modulos/adm_session/ajax_delsess.php?id='+o.value), _hand);

}
</script>

<? 
include('grid_usuarios.php');
?>