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

    public function __construct($gnp, 
                                $region, 
                                $continent, 
                                $gnpold, 
                                $surfacearea, 
                                $name, 
                                $localname, 
                                $population, 
                                $indepyear, 
                                $lifeexpectancy,
                                $governmentform,
                                $headofstate,
                                $capital,
                                $code,
                                $code2) {
        $this->gnp = $gnp;
        $this->region = $region;
        $this->continent = $continent;
        $this->gnpold = $gnpold;
        $this->surfacearea = $surfacearea;
        $this->name = $name;
        $this->localname = $localname;
        $this->population = $population;
        $this->indepyear = $indepyear;
        $this->lifeexpectancy = $lifeexpectancy;
        $this->governmentform = $governmentform;
        $this->headofstate = $headofstate;
        $this->capital = $capital;
        $this->code = $code;
        $this->code2 = $code2;
    }

    public function getGnp() {
        return $this->gnp;
    }
    
    public function getRegion() {
        return $this->region;
    }

    public function getContinent() {
        return $this->continent;
    }
    
    public function getGnpold() {
        return $this->gnpold;
    }
    
    public function getSurfacearea() {
        return $this->surfacearea;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getLocalname() {
        return $this->localname;
    }
    
    public function getPopulation() {
        return $this->population;
    }
    
    public function getIndepyear() {
        return $this->indepyear;
    }
    
    public function getLifeexpectancy() {
        return $this->lifeexpectancy;
    }
    
    public function getGovernmentform() {
        return $this->governmentform;
    }
    
    public function getHeadofstate() {
        return $this->headofstate;
    }
    
    public function getCapital() {
        return $this->capital;
    }
    
    public function getCode() {
        return $this->code;
    }
    
    public function getCode2() {
        return $this->code2;
    }

    public function create() {
        // your code goes here
    }
    public function update() {}
    public function delete() {}
}