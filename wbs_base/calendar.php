<html>
<head>
<title><?php echo $strCalendar;?></title>
<style>
/* Calendar */
table.calendar {
	width: 100%;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	text-transform: none;
	color: #000000;
	background-color: #FFFFFF;
}

table.calendar td {
	text-align: center;
	background-color: #FFFFCC;
}

table.calendar td a {
    display: block;
}

table.calendar td a:hover {
    background-color: gray ;
}

table.calendar th {
    background-color: #FFCC00;
}

table.calendar td.selected {
	background-color: #FF3300;
	color: #000000;
}

img.calendar {
    border: none;
}

form.clock {
	text-align: center;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}

.clock2 {
	text-align: center;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}


.nowrap {
    white-space: nowrap;
}

div.nowrap {
    margin: 0px;
    padding: 0px;
}

li {
    padding-bottom: 1em;
}

li form {
    display: inline;
}

ul.main {
    margin: 0px;
    padding-left:2em;
    padding-right:2em;
}

/* no longer needed
ul.main li {
    list-style-image: url(../images/dot_violet.png);
    padding-bottom: 0.1em;
}
*/

button {
    /* buttons in some browsers (eg. Konqueror) are block elements, this breaks design */
    display: inline;
}

/* Tabs */

/* For both light and non light */
.tab {
    white-space: nowrap;
    font-weight: bolder;
}

/* For non light */
td.tab {
    width: 64px;
    text-align: center;
    background-color: #dfdfdf;
}

td.tab a {
    display: block;
}

/* For light */
div.tab { }

/* Highlight active tab */
td.activetab {
    background-color: silver;
}

/* Textarea */

textarea {
    overflow: auto;
}

.nospace {
    margin: 0px;
    padding: 0px;
}


</style>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript">
<!--
var month_names = new Array("JAN","FEV","MAR","ABR","MAI","JUN","JUL","AGO","SET","OUT","NOV","DEZ");
var day_names = new Array("DOM","SEG","TER","QUA","QUI","SEX","SAB");
//-->
</script>
</head>
<body onload="initCalendar();">
<div id="calendar_data"></div>
<div id="clock_data"></div>
</body>
</html>
