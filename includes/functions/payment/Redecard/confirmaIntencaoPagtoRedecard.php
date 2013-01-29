<?php 
session_start();
$parc = $_REQUEST['parc'];
$_SESSION['parc'] = $parc;
?>