<?php
session_start();
?>
<?php
session_destroy();
header("LOCATION: index.html");
?>