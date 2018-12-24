<script src="editor.js" type="text/javascript"></script>
<div id="ed_toggle" onclick="toggleDiv('format_toolbar'); toggleFormattingToolbar(); position_corner();"><img src="images/html_formatting.gif"></div>
<div id="format_toolbar" <? 
if (!isset($_REQUEST["formatting_toolbar"]) || $_REQUEST["formatting_toolbar"] != 1) {
	print('style="display: none;"');
}
?>>
<script language="JavaScript">edToolbar();</script>
</div>