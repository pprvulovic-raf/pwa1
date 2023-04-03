<?php

require_once "Skill.class.php";

$idevi = Skill::getAllIDs();


echo json_encode($idevi);