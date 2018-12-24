<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_orc_page_mail2.php
|  template:    orc_page_mail.htm
+--------------------------------------------------------------
*/


/*
+--------------------------------------------------------------
|  Variaveis
+--------------------------------------------------------------
*/

$to = $mailcli;
$from = $mailvendedor;
$subject = $mail_assunto;

/*
+--------------------------------------------------------------
|  Orçameto
+--------------------------------------------------------------
*/

$nomeanexo = "orc_$codbarra.htm";
$anexo = "/home/ipasoft.com.br/wbs/sif/orcmail/$nomeanexo";

// Crio um arquivo RTF
$orcamento = fopen($anexo, "w");
$wc = fwrite ($orcamento, $orc_html);
fclose ($orcamento);

/*
+--------------------------------------------------------------
|  E-mail
+--------------------------------------------------------------
*/

$mime_list = array("html"=>"text/html","htm"=>"text/html", "txt"=>"text/plain", "rtf"=>"text/enriched","csv"=>"text/tab-separated-values","css"=>"text/css","gif"=>"image/gif");

$ABORT = FALSE;

// Boundary
$boundary = "XYZ-" . date(dmyhms) . "-ZYX";

$message = "--$boundary\n";
$message .= "Content-Transfer-Encoding: 8bits\n";
$message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n\n";
$message .= $body;
$message .= "\n";

// Anexos
$attachments[1] = $anexo;

foreach ($attachments as $key => $full_path)
{
    if ($full_path !='')
    {
        if (file_exists($full_path))
        {
            //try to open
            if ($fp = fopen($full_path,"rb"))
            {
                //get the file name from the path
                $filename = array_pop(explode(chr(92), $full_path));
                $contents = fread($fp, filesize($full_path));
                //encode data
                $encoded = base64_encode($contents);
                //*****SPLIT THE ENCODED DATA*****
                $encoded_split = chunk_split($encoded);
                fclose($fp);
                $message .= "--$boundary\n";
                $message .= "Content-Type: $anexo_type\n";
                $message .= "Content-Disposition: attachment; filename=\"$nomeanexo\" \n";
                $message .= "Content-Transfer-Encoding: base64\n\n";
                $message .= "$encoded_split\n";
            }
            else
            {
                echo "Cannot open file$key: $filename";
                $ABORT = TRUE;
            }
        }
        else
        {
            echo "File$key does not exist: $filename";
            $ABORT = TRUE;
        }
    }
}

$message .= "--$boundary--\r\n";

// Headers
$headers = "MIME-Version: 1.0\n";
$headers .= "From: <$from>\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
$message .= "Segue em anexo o orçamento.";

// Envia e-mail
$mensagem = mail($to, $subject, $message, $headers);
if ($mensagem)
{
    //print "Mensagem enviada!";
    $mail_enviado = 1;
    $prod->clear();
    $prod->upProdU("orc", "emailenv = 'OK'", "codped=$codorcselect");
}
else
{
    //print "O envio da mensagem falhou!";
    $mail_enviado = 0;
}

?>
