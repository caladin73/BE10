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

class Country extends Model implements ModelIf {
    private $code;

    public function __construct($code) {
        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function create() {
        // your code goes here
    }
    public function update() {}
    public function delete() {}
}