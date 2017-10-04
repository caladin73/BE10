<?php
/*
 * Login mechanism for educational purposes.
 * Experimental
 * Copyright nml, 2015-17
 */

/**
 * Interface for the login mechanism.
 * @author nml
 */
interface nAuthI {
    public static function areCookiesEnabled();
    public static function authenticate($user, $pwd);
    public static function dbLookUp($user, $passwordattempt);
    public static function isAuthenticated();
    public static function logout();
}