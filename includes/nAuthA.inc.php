<?php
/**
 * Description of nAuthA
 *
 * @author nml
 */
require_once 'nAuthI.inc.php';

abstract class nAuthA implements nAuthI {
    protected static $sessvar = 'nAuth42'; // if set = logged on
    private static $logInstance = false;
    protected $userId;
    protected $areCookiesAllowed = false;
    
    public function __construct($user) {
        $this->userId = $user;
    }
    
    public function getUserId() {
        return $this->userId;
    }

    private static function setTestCookie() {
        setcookie('foo', 'bar', time() + 3600);
    }

    public static function areCookiesEnabled() {
        try {
            setTestCookie();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function isAuthenticated() {
      return isset($_SESSION[self::$sessvar]) ? true : false;
    }
    
    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);
        unset($_SESSION[self::$sessvar]);
    }

    abstract public static function dbLookUp($user, $passwordattempt);
}
