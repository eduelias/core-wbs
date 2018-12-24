<script type="text/javascript">
<!--
	WBS.modulo.passo = function(){

		var passos = 5;

		var sdiv = document.getElementsByClassName('show')[0];
		
		if ((sdiv.id)==passos) {
			var pdiv_id = 1;
		} else {
			var pdiv_id = 1+parseInt(sdiv.id);
		}

		sdiv.className = 'hidden';
		
		var pdiv = document.getElementById(pdiv_id);
		
		pdiv.className = 'show';
	}
//-->
</script>
<style>
<!--
.show{
	display:block;
}
.hidden{
	display:none;
}
-->
</style>
<div id='passos'>
	<div id='1' class='show'>
		
	</div>
	<div id='2' class='hidden'>BB</div>
	<div id='3' class='hidden'>CC</div>
	<div id='4' class='hidden'>DD</div>
	<div id='5' class='hidden'>EE</div>
</div>
<?php

?>