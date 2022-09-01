<?php
function databaseConnect(){
return new PDO(
'mysql:host=localhost;dbname=sausage_party;charset=utf8',
'kevin',
'8kt[DB6TorcXF49L'

);
}