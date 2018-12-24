<?

	include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/classes/wbs_session.class.php");
	include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/class.php");
	include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/functions.php");
	$sess = new wbs_session();
	$a['records'] = $sess->load_files();
	$data = json($a);
	echo $data;
	
?>