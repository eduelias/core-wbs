<?php
$filename = 'nf.txt';
$somecontent = "Acrescentando isto no arquivo\n";

// Tendo certeza que o arquivo existe e que há permissão de escrita primeiro.
if (is_writable($filename)) {

   // Em nosso exemplo, nós estamos abrindo $filename em modo de append (acréscimo).
   // O ponteiro do arquivo estará no final dele desde
   // que será aqui que $somecontent será escrito com fwrite().
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