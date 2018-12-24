<?php
$filename = 'nf.txt';
$somecontent = "Acrescentando isto no arquivo\n";

// Tendo certeza que o arquivo existe e que h� permiss�o de escrita primeiro.
if (is_writable($filename)) {

   // Em nosso exemplo, n�s estamos abrindo $filename em modo de append (acr�scimo).
   // O ponteiro do arquivo estar� no final dele desde
   // que ser� aqui que $somecontent ser� escrito com fwrite().
   if (!$handle = fopen($filename, 'a')) {
         print "Erro abrindo arquivo ($filename)";
         exit;
   }

   // Escrevendo $somecontent para o arquivo aberto.
   if (!fwrite($handle, $somecontent)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito ($somecontent) no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}
?> 