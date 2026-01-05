<?php 
 if(!isset($_SESSION['userAdmin'])) {
     header("LOCATION: http://localhost/eshopper/admin/");
 }
?>