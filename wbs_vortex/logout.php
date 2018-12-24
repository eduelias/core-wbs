<?
	//include("include/class.php");
	//include("include/functions.php");

	include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/classes/wbs_session.class.php");
	$sess = new wbs_session('/tmp');
	$sess->kill_session($_COOKIE['PHPSESSID']);
?>
<script>
	window.location = 'index.php';
</script>