<?php
/**
 * model/ModelCountry.inc.php
 * @package MVCnA
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'model/DbP.inc.php';
require_once 'model/DbH.inc.php';
require_once 'model/ModelIf.inc.php';
require_once 'model/ModelA.inc.php';

class Country extends Model {
    private $gnp;
    private $region;
    private $continent;
    private $gnpold;
    private $surfacearea;
    private $name;
    private $localname;
    private $population;
    private $indepyear;
    private $lifeexpectancy;
    private $governmentform;
    private $headofstate;
    private $capital;
    private $code;
    private $code2;

    public function __construct($code) {
        $this->code = $code;
    }
    public function setGnp($gnp) {
        $this->gnp = $gnp;
    }
    public function getGnp() {
        return $this->gnp;
    }
    public function setRegion($region) {
        $this->region = $region;
    }
    public function getRegion() {
        return $this->region;
    }
    public function setContinent($continent) {
        $this->continent = $continent;
    }
    public function getContinent() {
        return $this->continent;
    }
    public function setGnpold($gnpold) {
        $this->gnpold = $gnpold;
    }
    public function getGnpold() {
        return $this->gnpold;
    }
    public function setSurfacearea($surfacearea) {
        $this->surfacearea = $surfacearea;
    }
    public function getSurfacearea() {
        return $this->surfacearea;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setLocalname($localname) {
        $this->localname = $localname;
    }
    public function getLocalname() {
        return $this->localname;
    }
    public function setPopulation($population) {
        $this->population = $population;
    }
    public function getPopulation() {
        return $this->population;
    }
    public function setIndepyear($indepyear) {
        $this->indepyear = $indepyear;
    }
    public function getIndepyear() {
        return $this->indepyear;
    }
    public function setLifeexpectancy($lifeexpectancy) {
        $this->lifeexpectancy = $lifeexpectancy;
    }
    public function getLifeexpectancy() {
        return $this->lifeexpectancy;
    }
    public function setGovernmentform($governmentform) {
        $this->governmentform = $governmentform;
    }
    public function getGovernmentform() {
        return $this->governmentform;
    }
    public function setHeadofstate($headofstate) {
        $this->headofstate = $headofstate;
    }
    public function getHeadofstate() {
        return $this->headofstate;
    }
    public function setCapital($capital) {
        $this->capital = $capital;
    }
    public function getCapital() {
        return $this->capital;
    }
    
    public function getCode() {
        return $this->code;
    }
    public function setCode2($code2) {
        $this->code2 = $code2;
    }
    public function getCode2() {
        return $this->code2;
    }

    public function create() {
        $sql = sprintf("insert into country (code, name, continent, region, surfacearea, indepyear, population, lifeexpectancy, gnp, gnpold, localname, governmentform, headofstate, capital, code2) 
                        values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
                              , $this->getCode()
                              , $this->getName()
                              , $this->getContinent()
                              , $this->getRegion()
                              , $this->getSurfacearea()
                              , $this->getIndepyear()
                              , $this->getPopulation()
                              , $this->getLifeexpectancy()
                              , $this->getGnp()
                              , $this->getGnpold()
                              , $this->getLocalname()
                              , $this->getGovernmentform()
                              , $this->getHeadofstate()
                              , $this->getCapital()
                              , $this->getCode2());

        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
        } catch(PDOException $e) {
            printf("<p>Insert failed: <br/>%s</p>\n",
                $e->getMessage());
        }
        $dbh->query('commit');
    }
    public function update() {}
    public function delete() {}
    
    public static function createObject() {}
}