<?php
session_start();

// détruit toutes les variables sessions
$_SESSION = array();

header("Location: login.php");
exit();