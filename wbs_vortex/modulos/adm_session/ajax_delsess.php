<?

	include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/classes/wbs_session.class.php");
	$sess = new wbs_session('/tmp');
	$sess->kill_session($_GET['id']);

?>