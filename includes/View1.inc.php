<?php
require_once 'includes/ModelA.inc.php';

class View {
    /*
     *
     */
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    private function topmenu() {
        $s = sprintf("          <h1>World Affairs</h1>\n
            <ul id='menu'>\n
                <li><a href='%s'>Home</a></li>\n
                <li><a href='%s?f=C'>Cities</a></li>\n
                <li><a href='%s?f=L'>Languages</a></li>\n",
                $_SERVER['PHP_SELF'],$_SERVER['PHP_SELF']
                ,$_SERVER['PHP_SELF']);
        if (!Authentication::isAuthenticated()) {
            $s .= sprintf("                 <li><a href='%s?f=A'>Login</a></li>\n"
                    , $_SERVER['PHP_SELF']);
        } else { 
            $s .= sprintf("                 <li><a href='testLogout.php'>Logout</a></li>\n");
        }
        $s .= sprintf("             </ul>");
        
        if (Authentication::isAuthenticated()) {
            $s .= sprintf("<div>Welcome %s</div>", Authentication::$logInstance->getUserId());
        }
        return $s;
    }
    
    private function displaymc() {
        $cities = City::retrievec($this->model->getCountry()->getCode());
        $s = "<div class='haves'>";
        foreach ($cities as $city) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $city->getId(), $city->getName());
        }
        $s .= "</div>";
        return $s;
    }

    private function display1c() {
        return sprintf("%s: %s<br/>\n"
            , $this->model->getId(), $this->model->getName());
    }

    private function cityForm() {
        $s = sprintf("<form action='%s?f=C' method='post'>\n
                      <div class='gets'>\n
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        District<br/>
                        <input type='text' name='district' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Country<br/>
                        <input type='text' name='countrycode'
                        value='%s'
                        required readonly/>
                      </p>\n
                      <p><input type='submit' value='Go!'/></p>
                      </div>\n"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCountry()->getCode()
                      );
        return $s;
    }

    public function displayCity() {
        $s = sprintf("<header>%s</header>\n", $this->topmenu());
        $s .= sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displaymc()
                    , $this->cityForm());
        return $s;
    }

    private function displayml() {
        $languages = CountryLanguage::retrievel($this->model->getCountry()->getCode());
        $s = "<div class='haves'>";
        foreach ($languages as $language) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $language->getLanguage(), $language->getCountry()->getCode());
        }
        $s .= "</div>";
        return $s;
    }

    private function languageForm() {
        $s = sprintf("<form action='%s?f=L' method='post'>\n
                      <div class='gets'>\n
                      <p>
                        Language<br/>
                        <input type='text' name='language' required/>
                      </p>\n
                      <p>
                        IsOfficial<br/>
                        <select name='isofficial' required>
                            <option value='F' selected>No</option>
                            <option value='T'>Yes</option>
                        </select>
                      </p>\n
                      <p>
                        Percentage<br/>
                        <input type='text' name='percentage' required/>
                      </p>\n
                      <p>
                        Country<br/>
                        <input type='text' name='countrycode'
                        value='%s'
                        required readonly/>
                      </p>\n
                      <p><input type='submit' value='Go!'/></p>
                      </div>\n"
                      , $_SERVER['PHP_SELF']
                      , $this->model->getCountry()->getCode()
                      );
        return $s;

    }

    public function displayLanguage() {
        $s = sprintf("<header>%s</header>\n", $this->topmenu());
        $s .= sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displayml()
                    , $this->languageForm());
        return $s;
    }
    
    private function loginForm() {
        $s = sprintf("
            <form action='%s' method='post'>\n
            <table id='login'>\n
                <caption>Login</caption>\n
                <tr>\n
                    <td>Userid:</td><td><input type='text' name='user'/></td>\n
                </tr>\n
                <tr>\n
                    <td>Pwd: </td><td><input type='password' name='pwd'/></td>\n
                </tr>\n
                <tr>\n
                    <td></td>\n
                    <td>
                        <p>
                        <input type='submit' value='OK'/>&nbsp;&nbsp;&nbsp;
                        <input type='button' value='I Surrender'
                          onclick='window.location=./index.php?f=A'/>
                        </p>
                    </td>\n
                </tr>\n", $_SERVER['PHP_SELF']);
                
        if (!Authentication::areCookiesEnabled()) {
            $s .= "<tr><td colspan='2' class='err'>Cookies 
            from this domain must be 
                      enabled before attempting login.</td></tr>";
        }
        $s .= "          </table>\n";
        $s .= "          </form>\n";
        return $s;
    }
    
    public function login() {
        $s = sprintf("          <header>%s</header>\n", $this->topmenu());
        $s .= sprintf("         <main class='main'>\n%s\n</main>\n"
                    , $this->loginForm());
        return $s;        
    }
}