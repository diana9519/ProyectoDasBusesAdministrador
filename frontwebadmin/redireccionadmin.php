<?php
session_start();
require_once "controllers/controlleradmin.php";
require_once "servicios/modeladmin.php";

$mvc = new MvcController();

$mvc -> plantillaAdmin(); 

?>