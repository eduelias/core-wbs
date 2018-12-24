<? 	
	ini_set('display_errors',0);
	//include('../../wbs_base/config.inc.php');
	header("Content-Enconding: x-gzip");
	header("Content-Type:text/html; charset=ISO-8859-1");
	header("Vary: Accept-Encoding");
	header("Expires: 10/10/2200");

	include('functions.php');
	
	define('Y5','yui/2.5.2/');
	define('Y6','yui/2.6.0/');
	define('S0','SpryAssets/');
	define('CSS','css/');
	define('TEMPLATES','css/templates/css/');
	define('WJS','js/');
	define('MIN','-min');
	
	include(Y6."yahoo/yahoo".MIN.".js");
	include(Y6."dom/dom".MIN.".js");
	include(Y6."yahoo-dom-event/yahoo-dom-event.js");
	include(Y6."event/event".MIN.".js");
	include(Y6."element/element-beta".MIN.".js");
	include(Y6."json/json".MIN.".js");
	include(Y6."connection/connection".MIN.".js");
	include(Y6."dragdrop/dragdrop".MIN.".js");
	include(Y6."datasource/datasource".MIN.".js");
	include(Y6."datatable/datatable".MIN.".js");
	include(Y6."calendar/calendar".MIN.".js");
	//include(Y5."autocomplete/autocomplete".MIN.".js");
	//include(Y6."treeview/treeview".MIN.".js");
	include(Y5."tabview/tabview.js");
	include(Y6."container/container".MIN.".js");
	include(Y6."menu/menu".MIN.".js"); 
	include(Y6."yuiloader/yuiloader".MIN.".js");
	include(Y6."paginator/paginator".MIN.".js");
	include(Y6."get/get".MIN.".js");
	include(Y6.'editor/simpleeditor'.MIN.'.js');
	
	include(S0."textfieldvalidation/SpryValidationTextField.js");
	include(S0."radiovalidation/SpryValidationRadio.js");
	include(S0."selectvalidation/SpryValidationSelect.js");
	//include(S0."passwordvalidation/SpryValidationPassword.js");
	//include(S0."collapsiblepanel/SpryCollapsiblePanel.js");
	
	#include(WJS.'pagina.js');
	include(WJS.'javascript.js');
	include(WJS.'onscreen.js');
	include(WJS.'json.js');

?>