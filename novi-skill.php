<?php

require_once "Skill.class.php";

/*
$novi = new Skill([
    "naziv"=>$_POST['naziv'],
    "opis"=>$_POST['opis']
]);
*/

$novi = new Skill($_POST);

$novi->save();

echo json_encode($novi);