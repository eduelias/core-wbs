<?
//BLOCO DE INCLUDES,DEFINES E HEADERS
$_SESSION['MODIR'] = 'modulos/mod_rma/';
$_SESSION['SUBMODIR'] = 'modulos/mod_rma/sub_revenda/';
?>
<link rel="stylesheet" type="text/css" href="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_css.css">
<script type="text/javascript" src="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_js.js"></script>
<?
//BLOCO DE CONTROLES PHP DA PÁGINA

?>
<?
	include($_SESSION['SUBMODIR'].'tab_revenda.php');
	#include($_SESSION['SUBMODIR'].'grid_rma_aberto.php');
?>