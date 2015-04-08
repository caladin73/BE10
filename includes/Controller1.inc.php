<?php
/*
 * This is a CONTROLLER
 */
require_once 'includes/ModelA.inc.php';

class Controller {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function auth($p) {
        if (isset($p) && count($p) > 0) {
            if (!Authentication::isAuthenticated() 
                    && Authentication::areCookiesEnabled()
                    && isset($p['user'])
                    && isset($p['pwd'])) {
                        Authentication::$objvar = Authentication::authenticate($p['user']
                                , $p['pwd']);
            }
            $p = array();
        }
        return;
    }

    public function actionCity($p) {
        if (isset($p) && count($p) > 0) {
            $p['id'] = null; // augment array with dummy
            $city = City::createObject($p);  // object from array
            $city->create();         // model method to insert into db
            $p = array();
        }
        return;
    }

    public function actionLanguage($p) {
        if (isset($p) && count($p) > 0) {
            $p['id'] = null; // augment array with dummy
            $language = CountryLanguage::createObject($p);  // object from array
            $language->create();         // model method to insert into db
            $p = array();
        }
        return;
    }
}