<?php
	//include('../../wbs_base/config.inc.php');
	//header('content-type:text/css');
	header("Content-Enconding: x-gzip");
	header("Content-Type:text/html; charset=ISO-8859-1");
	header("Vary: Accept-Encoding");
	#header("Vary:=iso-8859-1");
	header("Expires: 10/10/2200");
	define('Y5','yui/2.5.2/');
	define('Y6','yui/2.6.0/');
	define('S0','SpryAssets/');
	define('CSS','css/');
	define('TEMPLATES','css/templates/css/');
	define('WJS','js/');
	define('MIN','-min');
	$IP_S =  $_SERVER['SERVER_ADDR'];
	if ($IP_S == '200.251.60.105') { 
		define('C_WBS','wbs-teste');
	} else {
		define('C_WBS','wbs');
	}
	define('IMAGES','http://img2.'.C_WBS.'.maxxmicro.com.br/');
	define('VIMAGES','http://img1.'.C_WBS.'.maxxmicro.com.br/');
	
	include(CSS."estilo.css");
	include(TEMPLATES."Spry_custom.css");    
	include(TEMPLATES."forms.css");    	
	
	include(S0."collapsiblepanel/SpryCollapsiblePanel.css");
	include(S0."passwordvalidation/SpryValidationPassword.css");
	include(S0."selectvalidation/SpryValidationSelect.css");
	include(S0."radiovalidation/SpryValidationRadio.css");
	include(S0."textfieldvalidation/SpryValidationTextField.css");
	include(Y6.'build/assets/skins/sam/skin.css');
	include(Y6."menu/assets/skins/sam/menu.css");
	include(Y6."datatable/assets/skins/sam/datatable.css"); 
	include(Y6."calendar/assets/skins/sam/calendar.css"); 
	include(Y6."container/assets/skins/sam/container.css"); 
	include(Y6."treeview/assets/skins/sam/treeview.css"); 
	include(Y5."tabview/assets/skins/sam/tabview.css"); 
	include(Y6."datatable/assets/skins/sam/datatable.css"); 
	include(Y6."paginator/assets/skins/sam/paginator.css");    	
	include(Y6."resize/assets/skins/sam/resize.css");   
	include(Y6."layout/assets/skins/sam/layout.css");
	include(Y6."resize/assets/skins/sam/resize.css");
	
	
	include(CSS.$_GET['cor'].'.css');
?>

    <style type="text/css">
.load{

}

.yui-skin-sam .yuimenubar {
	background:none;
	line-height:0;
	color:#FFFFFF;
	border:none;
	_width:580px;
}

.yuimenubaritem{
border:thin outset;
}

.yui-skin-sam .yuimenubaritem-selected{
cursor:pointer;
border:thin inset;
}

.yuimenubar li, .yuimenu li, .yuimenu h6, .yuimenubar h6 {
	background: none;
	line-height:1;
	padding:4.5px;
	margin:0 3px;
	_width:75px;
}

.yui-skin-sam .yuimenubaritemlabel {
text-align:center;
border:none;
width:33px;
margin:1px;
display:block;
}

.yui-skin-sam .yuimenubaritemlabel-selected {
text-align:center;
border:none;
width:33px;
margin:1px;
display:block;
}


#panel1 .bd {

    height: 300px;

}
li {
	list-style:none;
	list-style-image:none;
}
/* Resize Panel CSS */

.yui-panel-container .yui-resizepanel .bd {

    overflow: auto;
    background-color: #fff;
}


/*
    PLEASE NOTE: It is necessary to toggle the "overflow" property 
    of the body element between "hidden" and "auto" in order to 
    prevent the scrollbars from remaining visible after the the 
    ResizePanel is hidden.  For more information on this issue, 
    read the comments in the "container-core.css" file.
*/

.yui-panel-container.hide-scrollbars .yui-resizepanel .bd {

    overflow: hidden;

}

.yui-panel-container.show-scrollbars .yui-resizepanel .bd {

    overflow: auto;

}		


/*
    PLEASE NOTE: It is necessary to set the "overflow" property of
    the underlay element to "visible" in order for the 
    scrollbars on the body of a ResizePanel instance to be 
    visible.  By default the "overflow" property of the underlay 
    element is set to "auto" when a Panel is made visible on
    Gecko for Mac OS X to prevent scrollbars from poking through
    it on that browser + platform combintation.  For more 
    information on this issue, read the comments in the 
    "container-core.css" file.
*/

.yui-panel-container.show-scrollbars .underlay {

    overflow: visible;

}

.yui-resizepanel .resizehandle { 

     position: absolute; 
     width: 10px; 
     height: 10px; 
     right: 0;
     bottom: 0; 
     margin: 0; 
     padding: 0; 
     z-index: 1; 
     background: url(assets/img/corner_resize.gif) left bottom no-repeat;
     cursor: se-resize;

 }
 
 .yui-skin-sam .yui-navset .yui-nav a, .yui-skin-sam .yui-navset .yui-navset-top .yui-nav a {
 	background: #D8D8D8 url('include/yui/2.6.0/assets/skins/sam/sprite.png') repeat-x scroll 0 0 ;
}

.td_center {
	text-align:center !important;	
}

.td_bold {
	font-weight:bold !important;
}

.td_italic{
	font-style:italic !important;
}
.td_right{
	text-align:right !important;
}
.yui-skin-sam .mask {
    background-color: #000;
    opacity: .25;
    filter: alpha(opacity=25);  /* Set opacity in IE */
}

</style>
