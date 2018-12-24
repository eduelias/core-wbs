<script>
	WBS.tooltips = new Array();
	WBS.rendered = function(ev) {
		ttr = document.getElementById('ttr');

		if (ttr != null) { 

			document.body.removeChild(ttr);

			//ttr = document.createElement('div');

			//ttr.id = 'ttr';

			//document.body.appendChild(ttr);

		}
			WBS.tooltip = new YAHOO.widget.Tooltip('ttr', { context: WBS.tooltips });
			WBS.tooltips = new Array();
			
		//WBS.toolrender = false;
	};
</script>

<?

	$_SESSION['MOD'] = 'SEP';
	
	include('modulos/mod_rma/sub_separacao/tab_rma_separacao.php');

?>