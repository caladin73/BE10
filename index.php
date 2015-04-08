<?php
    /*
     * This is the application
     */
    session_start();
    require_once './includes/City.inc.php'; // a model
    require_once './includes/CountryLanguage.inc.php'; // a model
    require_once './includes/User.inc.php'; // a model
    require_once './includes/View1.inc.php';
    require_once './includes/Controller1.inc.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'/>
    <title>MVCn</title>
    <link rel="stylesheet" href="./css/styles.css"/>
  </head>
  <body>
<?php
    if (!isset($_GET['f']) || $_GET['f'] === 'A') {
        $model = new User();
        $con = new Controller($model);
        $view1 = new View($model);
        $con->auth($_POST);
        print($view1->login());
        
    } elseif (isset($_GET['f']) && $_GET['f'] === 'C') {
        $model = new City('DNK', null, null, null, null);   // init a model
        $con = new Controller($model);                 // init controller
        $view1 = new View($model);                     // init view
        $con->actionCity($_POST);                  // activate controller
        print($view1->displayCity());                  // display

    } elseif (isset($_GET['f']) && $_GET['f'] === 'L') {
        $model = new CountryLanguage('DNK', null, null, null); // init a model
        $con = new Controller($model);                 // init controller
        $view1 = new View($model);                     // init a view
        $con->actionLanguage($_POST);                  // activate controller
        print($view1->displayLanguage());              // display
    }

?>
  </body>
</html>