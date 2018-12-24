<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.




#echo("<img src=\"" . GenImgName()."?" . microtime() . "\" border=0>");
$values .= "mes=$mes&ano=$ano&ef=$ef&c=$c&q=$q&w=$w";

echo("
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title>Untitled Document</title>
</head>

<body>
<table width='100%'  border='0' cellspacing='1' cellpadding='1'>
  <tr align='center'>
    <td width='50%'><img src='gestao_telemig_graph_pc.php?$values'></td>
    <td><img src='gestao_telemig_graph_pi.php?$values'></td>
  </tr>
  <tr align='center'>
    <td><img src='gestao_telemig_graph_pcar.php?$values'></td>
    <td><img src='gestao_telemig_graph_pic.php?$values'></td>
  </tr>
</table>
</body>
</html>


");


?>
