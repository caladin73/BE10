<?php
require_once 'includes/dbparams.inc.php';
require_once 'includes/DbH.inc.php';
require_once 'includes/ModelIf.inc.php';
require_once 'includes/ModelA.inc.php';

class Country extends Model {
    private $code;

    public function __construct($code) {
        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function create() {}
    public function update() {}
    public function delete() {}
}