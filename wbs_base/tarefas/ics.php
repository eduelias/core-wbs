<?php

error_reporting(0);

require('create_ics.php');

header("Content-type: text/calendar");
header("Content-Disposition: attachment; filename=tasks_jr.ics");
print($output);

?>