<?php
require_once 'includes/dbparams.inc.php';
require_once 'includes/DbH.inc.php';
require_once 'includes/Authentication.inc.php';
require_once 'includes/ModelIf.inc.php';

abstract class Model implements ModelIf {
    /*
     *
     */
    private static $dbh;

    public static function connect() {
        if (! self::$dbh) {
            self::$dbh = DbH::getDbH();
        }
        return self::$dbh;
    }

    abstract public function create();
    abstract public function update();
    abstract public function delete();
}