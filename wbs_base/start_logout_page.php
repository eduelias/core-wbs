<?

session_start();
session_unset ();
session_destroy ();

 if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
 header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar ."start_login_page.php?erro=1");
exit;

?>
