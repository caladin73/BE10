<?php
abstract class DbP {
    const DBHOST = 'localhost';
    const DBUSER = 'nobody';
    const USERPWD = 'test';
    const DB = 'world';
    const DSN = "mysql:host=".DBHOST.";dbname=".DB;
}