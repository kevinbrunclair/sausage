<?php

require_once 'inc/connect.php';
require_once 'inc/my-functions.php';
require_once 'inc/database.php';
require_once 'class/Client.php';
require_once 'class/ClientsList.php';
require_once 'class/Catalogue.php';
echo "<pre>";

//$catalogue = new Catalogue();
//var_dump($catalogue);

//créer un objet ClientsList
$Clientlist = new ClientsList();
var_dump($Clientlist);

//afficher la liste des clients
displayClientsList($Clientlist);

//afficher la liste du catalogue
//displayCatalogue($catalogue);


echo "</pre>";
