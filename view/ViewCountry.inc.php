<?php
/**
 * view/ViewCountry.inc.php
 * @package MVCnA
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */

require_once 'view/View.inc.php';

class CountryView extends View {
    
    public function __construct($model) {
        parent::__construct($model);
    }
    
    private function displayManyCountries() {
        $countries = Country::retrievem($this->model->getName()->getCode());
        $s = "<div class='haves'>";
        foreach ($countries as $country) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $country->getCode(), $country->getName());
        }
        $s .= "</div>";
        return $s;
    }

    private function display1c() {
        return sprintf("%s<br/>\n"
            , $this->model->getCode());
    }

    private function countryForm() {
        $s = sprintf("<form action='%s?f=O' method='post'>\n
                      <div class='gets'>\n
                      <p>
                        Code<br/>
                        <input type='text' name='code' required/>
                      </p>\n<p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        Continent<br/>
                        <input type='text' name='continent' required/>
                      </p>\n
                      <p>
                        Region<br/>
                        <input type='text' name='region' required/>
                      </p>\n
                      <p>
                        Surface Area<br/>
                        <input type='text' name='surfacearea' required/>
                      </p>\n
                      <p>
                        Year of indenpendency<br/>
                        <input type='text' name='indepyear' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Life expectancy<br/>
                        <input type='text' name='lifeexpectancy' required/>
                      </p>\n
                      <p>
                        Gnp<br/>
                        <input type='text' name='gnp' required/>
                      </p>\n
                      <p>
                        Old Gnp<br/>
                        <input type='text' name='gnpold' required/>
                      </p>\n
                      <p>
                        Local Name<br/>
                        <input type='text' name='localname' required/>
                      </p>\n
                      <p>
                        Government Form<br/>
                        <input type='text' name='governmentform' required/>
                      </p>\n
                      <p>
                        Head of State<br/>
                        <input type='text' name='headofstate' required/>
                      </p>\n
                      <p>
                        Capital<br/>
                        <input type='text' name='capital' required/>
                      </p>\n
                      <p>
                        Code2<br/>
                        <input type='text' name='code2' required/>
                      </p>\n
                      <p><input type='submit' value='Go!'/></p>
                      </div>\n"
                      , $_SERVER['PHP_SELF']
                      );
        return $s;
    }

    private function displayCountry() {
        $s = sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displayManyCountries()
                    , $this->countryForm());
        return $s;
    }
    
    public function display(){
       $this->output($this->displayCountry());
    }
}
