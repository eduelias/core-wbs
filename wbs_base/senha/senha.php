

<?php


$senha = substr(ereg_replace("[^A-Z0-9]", "", crypt(time())) .
                        ereg_replace("[^A-Z0-9]", "", crypt(time())) .
                        ereg_replace("[^A-Z0-9]", "", crypt(time())),0, 7);


echo("senha = $senha");

?>
       
