<?php
    session_start();
    require_once './includes/ModelCity.inc.php'; // domainmodel
    require_once './includes/ModelCountryLanguage.inc.php'; // domainmodel
    require_once './includes/ModelUser.inc.php'; // domainmodel
    require_once './includes/ViewCity.inc.php';
    require_once './includes/ViewLanguage.inc.php';
    require_once './includes/ViewUser.inc.php';
    require_once './includes/ViewLogin.inc.php';
    require_once './includes/Controller1.inc.php';

    if (!isset($_GET['f']) || $_GET['f'] === 'A') {
        $model = new User(null);
        $con = new Controller($model);
        $view1 = new LoginView($model);
        if (isset($_POST)) {
            $con->auth($_POST);
        }
        print($view1->display());
         
    } elseif (isset($_GET['f']) && $_GET['f'] === 'Z') {   // logout
        $model = new User(null);
        $con = new Controller($model);
        $view1 = new LoginView($model);
        $con->logout();
        print($view1->display());
        
    } elseif (isset($_GET['f']) && $_GET['f'] === 'C') {
        $model = new City('DNK', null, null, null, null);   // init a model
        $con = new Controller($model);                 // init controller
        $view1 = new CityView($model);                 // init view
        if (isset($_POST)) {
            $con->createCity($_POST);                  // activate controller
        }
        print($view1->display());
        
    } elseif (isset($_GET['f']) && $_GET['f'] === 'L') {
        $model = new CountryLanguage('DNK', null, null, null); // init a model
        $con = new Controller($model);                 // init controller
        $view1 = new LanguageView($model);                     // init a view
        if (isset($_POST)) {
            $con->createLanguage($_POST);                  // activate controller
        }
        print($view1->display());
        
    } elseif (isset($_GET['f']) && $_GET['f'] === 'U') {
        $model = new User(null); // init a model
        $con = new Controller($model);              // init controller
        $view1 = new UserView($model);                  // init a view
        if (isset($_POST)) {
            $con->createUser($_POST);               // activate controller
        }
        print($view1->display());
    } 
?>