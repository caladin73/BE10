<?php
/*
 * Login mechanism for educational purposes.
 * Experimental
 * Copyright nml, 2015-17
 */

/**
 * Description of Authentication
 * Authentication is a Singleton, hence the private constructor.
 * It is instantiated by Authentication::authenticate()
 * @author nml
 */
require_once './includes/AuthA.inc.php';


class Authentication extends AuthA {

    protected function __construct($user, $pwd) {
        parent::__construct($user);
        try {
            self::dbLookUp($user, $pwd);                        // invoke auth
            $_SESSION[self::$sessvar] = $this->getUserId();     // succes
        }
        catch (Exception $e) {
            self::$logInstance = FALSE;
            unset($_SESSION[self::$sessvar]);                   //miserys
        }      
    }

    public static function authenticate($user, $pwd) {
        if (! self::$logInstance) {
            self::$logInstance = new Authentication($user, $pwd);
        }
        return self::$logInstance;
    }

    protected static function dbLookUp($user, $pwdtry) {
        // Using prepared statement to prevent SQL injection
        $sql = "select uid, password 
                from user
                where uid = :uid";
        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':uid', $user);
            $q->execute();
            $row = $q->fetch();
            if (!($row['uid'] === $user
                    && password_verify($pwdtry, $row['password']))) { 
                 throw new Exception("Not authenticated", 42);   //misery
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}