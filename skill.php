<?php

if(!isset($_GET['id'])){
    http_response_code(400);
    echo "Bad request";
    die();
}

//require_once "db.php";
require_once "Skill.class.php";

$skill = new Skill([
                        'id'=>$_GET['id']
                    ]);

echo json_encode($skill);

?>