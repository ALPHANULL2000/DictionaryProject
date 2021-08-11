<?php

class model {

    private $eng , $per , $typ;

    public function __construct($eng, $per, $typ) {
        $this->eng = $eng;
        $this->per = $per;
        $this->typ = $typ;
    }

    public function getEng(){return $this->eng;}
    public function getPer(){return $this->per;}
    public function getTyp(){return $this->typ;}

    public function setEng($eng){$this->eng = $eng;}
    public function setPer($per){$this->per = $per;}
    public function setTyp($typ){$this->typ = $typ;}

    public function ToString() {
        return "[ ".$this->getEng()." - "."[".$this->getPer()." - "."[".$this->getTyp()." ]";
    }
}


