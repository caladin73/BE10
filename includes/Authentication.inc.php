<?php
   require_once './includes/nAuthI.inc.php'; // include the login interface
/*
 * Login mechanism for educational purposes.
 * Experimental
 * Copyright nml, 2015
 */

/**
 * Description of Authentication
 * Authentication is a Singleton, hence the private constructor.
 * It is instantiated by Authentication::authenticate()
 * @author nml
 */
class Authentication implements nAuthI {
    private static $sessvar = 'nAuth42'; // if set = logged on
    public static $logInstance = FALSE;
    private $userId;


    private function __construct($user, $pwd) {
      try {
        self::dbLookUp($user, $pwd);         // invoke auth
        $this->userId = $user;
        $_SESSION[self::$sessvar] = $this->getUserId();   // set auth succesfull
      }
      catch (Exception $e) {
          self::$logInstance = FALSE;
      }      
    }


    public static function authenticate($user, $pwd) {
      if (! self::$logInstance) {
        self::$logInstance = new Authentication($user, $pwd);
        self::$objvar = self::$logInstance;
      }
      return self::$logInstance;
    }

    public static function isAuthenticated() {
      return isset($_SESSION[self::$sessvar]) ? true : false;
    }

    private static function setTestCookie() {
      setcookie('foo', 'bar', time() + 3600);
    }

    public static function areCookiesEnabled() {
      self::setTestCookie();
      return (isset($_COOKIE['foo']) && $_COOKIE['foo'] == 'bar') ? true : false;
    }

    public static function dbLookUp($user, $pwdtry) {
      // Using prepared statements to prevent SQL injection
        $sql = "select uid, password, salt 
                from user
                where uid = :uid";
        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':uid', $user);
            $q->execute();
            $row = $q->fetch();

            $pwd = hash('sha512', $pwdtry . $row['salt']); // hash entered pwd
            if ($row['uid'] != $user 
                    || $row['password'] != $pwd) { // with salt, match
                throw new Exception("Not authenticated", 42);            
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public static function logout() {
        $_SESSION = array(); // unset all session vars
        if (isset($_COOKIE[session_name()])) {
          setcookie(session_name(), '', time() - 86400, '/');
                // get name dynamically
                // cookie text blanked
                // expired 24 hours ago
                // for the whole domain
        }
        session_destroy(); // destroy session
        self::$objvar = null; // destroy objvar
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function getUserIdFromMail() {
        $a = explode('@', $this->getUserId());
        return $a[0];
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
}