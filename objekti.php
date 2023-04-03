<?php

class Student{
    private $ime;
    private $starost;

    public function __construct($params=null){
        if(isset($params['ime'])){
            $this->ime = $params['ime'];
        }
        if(isset($params['starost'])){
            $this->starost = $params['starost'];
        }
    }

    public function getIme(){
        return $this->ime;
    }
    public function pozdrav(){
        return "Zdravo ja sam " . $this->ime . " i imam " . $this->starost . " godina.<br>";
    }
    public function setIme($novo_ime){
        if(strtolower(trim($novo_ime)) == 'radoslav'){
            echo "a necu da se zovem radoslav...<br>";
            return;
        }
        else{
            $this->ime = $novo_ime;
            echo "renameovo sam se<br>";
        }
    }

    public function getStarost(){
        return $this->starost;
    }
    public function rodjendan(){
        $this->starost++;
        echo "uraaa  ~<:)<br>";
    }
}

$pera = new Student([
                        "ime"=>"petar", 
                        "starost"=>25
                    ]);
echo $pera->pozdrav();
$pera->setIme(" radoslav");
$pera->rodjendan();
echo $pera->pozdrav();

$mika = new Student([
                        "ime"=>"milorad" 
                    ]);
echo $mika->pozdrav();

