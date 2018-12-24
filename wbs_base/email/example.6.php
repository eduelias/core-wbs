<?php
/**
* Filename.......: example.4.php
* Project........: HTML Mime Mail class
* Last Modified..: 15 July 2002
*/

        error_reporting(E_ALL);
        include('htmlMimeMail.php');

/**
* Example of usage. This example shows
* how to use the class to send Bcc: 
* and/or Cc: recipients.
*
* Create the mail object.
*/
	$mail = new htmlMimeMail();

/**
* If sending an html email, then these
* two variables specify the text and
* html versions of the mail. Don't
* have to be named as these are. Just
* make sure the names tie in to the
* $mail->setHtml() call further down.
*/
	$html =  include("../inicioorcadmuser.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1");
	
/**
* Add the text, html and embedded images.
* Here we're using the third argument of
* setHtml(), which is the path to the
* directory that holds the images. By
* adding this third argument, the class
* will try to find all the images in the
* html, and auto load them in. Not 100%
* accurate, and you MUST enclose your
* image references in quotes, so src="img.jpg"
* and NOT src=img.jpg. Also, where possible,
* duplicates will be avoided.
*/
	$mail->setHtml($html, $text, './');
	
/**
* Send the email using smtp method. The setSMTPParams()
* method simply changes the HELO string to example.com
* as localhost and port 25 are the defaults.
*/
	$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
	$mail->setReturnPath('felipe@jfnet.com.br');
	#$mail->setBcc('bcc@example.com');
	#$mail->setCc('Carbon Copy <cc@example.com>');

	$result = $mail->send(array('felipe@jfnet.com.br'), 'smtp');

	// These errors are only set if you're using SMTP to send the message
	if (!$result) {
		print_r($mail->errors);
	} else {
		echo 'Mail sent!';
	}
?>