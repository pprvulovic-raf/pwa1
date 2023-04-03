<?php

require_once "db.php";

class Skill{
    public $id;
    public $naziv;
    public $opis;

    public function __construct($params){
        global $pdo;

        if(isset($params['id'])){
            //treba da dohvatim iz baze i da napunim podacima
            $upit = $pdo->prepare("select * from skills where id=?");
            $upit->execute([$params['id']]);
            $res = $upit->fetch();
            if($res){
                $this->id = $res['id'];
                $this->naziv = $res['naziv'];
                $this->opis = $res['opis'];
            }
            else{
                $this->id = null;
                $this->naziv = '';
                $this->opis = '';
            }
        } else {
            $this->id = null;
            if(isset($params['naziv'])){
                $this->naziv = $params['naziv'];
            }
            if(isset($params['opis'])){
                $this->opis = $params['opis'];
            }
        }
    }

    public function save(){
        global $pdo;
        if($this->id!=null){
            //update
            $upit = $pdo->prepare("update skills set naziv=?, opis=? where id=?");
            $upit->execute([$this->naziv, $this->opis, $this->id]);
        } 
        else {
            //insert
            $upit = $pdo->prepare("insert into skills (naziv, opis) values (?,?) ");
            $upit->execute([$this->naziv, $this->opis]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public function delete(){
        global $pdo;
        if($this->id!==null){
            $pdo->query("delete from skills where id=" . $this->id);
        }
        $this->id = null;
        $this->naziv = '';
        $this->opis = '';
    }


    public static function getAllIDs(){
        global $pdo;
        $res = $pdo->query("select id from skills")->fetchAll();
        $idevi = [];
        foreach($res as $e){
            $idevi[] = $e['id'];
        }
        return $idevi;
    }
}

?>