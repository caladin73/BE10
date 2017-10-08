<?php
/**
 * model/AuthA.inc.php
 * @package MVCnA
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
abstract class DbP {
    const DBHOST = 'localhost';
    const DBUSER = 'nobody';
    const USERPWD = 'test';
    const DB = 'worldsample';
    const DSN = "mysql:host=".self::DBHOST.";dbname=".self::DB;
}