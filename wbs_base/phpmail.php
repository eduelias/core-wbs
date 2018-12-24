<?php
$msgText = "
<div align='center'>
			<br>
			<br>
  <center>
  <table border='0' width='400' cellspacing='0'>
    <tr>
      <td width='100%' bgcolor='$cor'>
  <table border='0' width='100%' cellspacing='1' cellpadding='2' bgcolor='#FFFFFF'>
    <tr>
      <td width='45'>
			  <p align='center'><img border='0' src='images/$imagem'></p></td>
      <td width='355'><b><font face='Verdana' size='1'>MENSAGEM:</font><font face='Verdana' size='3' color='#FF0000'><br>
        </font><font face='Verdana' size='3' color='$cor'>
        $msg</font></b></td>
    </tr>
  </table>
      </td>
    </tr>
  </table>
  </center>
</div>

		
</div>
";


if ($state == "")
{
    $title="PhpMail";
    $header="Send An Email";
    $announce="Type A Message! (HTML Message and Multiple Attachments {with small modifications} Possible)";
}
else
{
    $title="PhpMail";
    $header="Your Message Sent!";
    $announce="Send Another Email...";
    if ($ccText != "") $ccText="cc: $ccText <$ccText>\n";
	if ($bccText != "") $bccText="Bcc: $bccText <$bccText>\n";
    if ($mailformat == "Text") mail($toText, $subjectText, $msgText,     "To: $toText <$toText>\n" .     "From: $fromText <$fromText>\n" .$ccText.$bccText.   "X-Mailer: PHP 4.x");
    if ($mailformat == "Html") mail($toText, $subjectText, $msgText,     "To: $toText <$toText>\n" .     "From: $fromText <$fromText>\n" .$ccText.$bccText.     "MIME-Version: 1.0\n" .     "Content-type: text/html; charset=iso-8859-1");
}

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php echo($title)?></title>
</head>

<body link="#0000ff" alink="#0000ff" vlink="#0000ff" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">

REPLACE THIS LINE WITH YOUR CUSTOMISED HTML CONTENT LIKE NAVIGATION BAR (HEADER PART)

  <b><font face="Arial" size="4" color="#000080"><?php echo($announce)?></font><font face="Arial" size="3"><br>
  </font></b>
  <form method="POST" action="<?php echo($PHP_SELF)?>">
    <p><font face="Arial" size="3"><b>To: <input type="text" name="toText" size="35"></b></font></p>
    <p><font face="Arial" size="3"><b>Cc: <input type="text" name="ccText" size="35"></b></font></p>
    <p><font face="Arial" size="3"><b>Bcc: <input type="text" name="bccText" size="35"></b></font></p>
    <p><font face="Arial" size="3"><b>From: <input type="text" name="fromText" size="35"></b></font></p>
    <p><font face="Arial" size="3"><b>Subject: <input type="text" name="subjectText" size="46"></b></font></p>
    <p><font face="Arial" size="3"><b>Choose Email Format: </b></font>
    <font face="Arial" size="2">Plain Text <input type="radio" name="mailformat" value="Text"> HTML  <input type="radio" name="mailformat" value="Html"></font>
    </p>
    <p><font face="Arial" size="3"><b>Message Text:</b></font></p>
    <p><font face="Arial" size="3"><b><textarea rows="11" name="msgText" cols="60"></textarea></b></font></p>
    <p><font face="Arial" size="3"><b><input type="submit" value="Send" name="send" style="font-family: Arial; font-size: 12pt; font-weight: bold"></b></font></p>
    <p>&nbsp;</p>
    <input type="hidden" name="state" value="1">
  </form>

REPLACE THIS LINE WITH YOUR CUSTOMISED HTML CONTENT LIKE NAVIGATION BAR & COPYRIGHT INFORMATION (FOOTER PART)

</body>

</html>

