<?php
/**
 * view/ViewUser.inc.php
 * @package MVCnA
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'view/View.inc.php';

class UserView extends View {
    
    public function __construct($model) {
        parent::__construct($model);
    }

    private function displayul() {
        $users = User::retrievem();
        $s = "<div class='haves'>";
        foreach ($users as $user) {
            $s .=  sprintf("%s<br/>\n"
                , $user);
        }
        $s .= "</div>";
        return $s;
    }
    
    private function userForm() {
        $s = sprintf("
            <form action='%s?f=U' method='post'>\n
            <div class='gets'>\n
                <h3>Create User</h3>\n
                <p>\n
                    Userid:<br/>
                    <input type='text' name='uid'/>\n
                </p>\n
                <p>\n
                    Pwd:<br/>
                    <input type='password' name='pwd1'/>\n
                </p>\n
                 <p>\n
                    Pwd repeat:<br/>
                    <input type='password' name='pwd2'/>\n
                </p>\n
                <p>\n
                    <input type='submit' value='Go'/>
                </p>
            </div>", $_SERVER['PHP_SELF']);
                
        if (!Model::areCookiesEnabled()) {
            $s .= "<tr><td colspan='2' class='err'>Cookies 
            from this domain must be 
                      enabled before attempting login.</td></tr>";
        }
        $s .= "          </div>\n";
        $s .= "          </form>\n";
        return $s;
    }
    
    private function userActivateForm() {
        $s = sprintf("
            <form action='%s?f=Y' method='post'>\n
            <div class='gets'>\n
                <h3>Activate User</h3>\n
                <p>\n
                    Userid:<br/>
                    <input type='text' name='uid'/>\n
                </p>\n
                <input type='radio' name='activated' value='1' checked> Activate<br>
                <input type='radio' name='activated' value='0'> Deactivate<br>
                <p>\n
                    <input type='submit' value='Go'/>
                </p>
            </div>", $_SERVER['PHP_SELF']);
                
        if (!Model::areCookiesEnabled()) {
            $s .= "<tr><td colspan='2' class='err'>Cookies 
            from this domain must be 
                      enabled before attempting login.</td></tr>";
        }
        $s .= "          </div>\n";
        $s .= "          </form>\n";
        return $s;
    }

    private function userUpdateForm() {
        $s = sprintf("
            <form action='%s?f=V' method='post'>\n
            <div class='gets'>\n
                <h3>Update User</h3>\n
                <p>\n
                    Userid:<br/>
                    <input type='text' name='uid'/>\n
                </p>\n
                <p>\n
                    Password:<br/>
                    <input type='password' name='pwd'/>\n
                </p>\n
                <p>\n
                    <input type='submit' value='Go'/>
                </p>
            </div>", $_SERVER['PHP_SELF']);
                
        if (!Model::areCookiesEnabled()) {
            $s .= "<tr><td colspan='2' class='err'>Cookies 
            from this domain must be 
                      enabled before attempting login.</td></tr>";
        }
        $s .= "          </div>\n";
        $s .= "          </form>\n";
        return $s;
    }

    
    private function displayUser() {
        $s = sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displayul()
                    , $this->userForm());
        return $s;
    }
    
     private function displayUpdateUser() {
        $s = sprintf("<main class='main'>\n%s\n%s\n%s</main>\n"
                    , $this->displayul()
                    , $this->userActivateForm()
                    , $this->userUpdateForm());
        return $s;
    }
    
    public function display(){
       $this->output($this->displayUser());
    }
    
     public function displayUpdate(){
       $this->output($this->displayUpdateUser());
    }
    
}
