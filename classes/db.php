<?php

/**
 * DB Class
 * 
 * [DB class wraps medoo object (http://medoo.in/)]
 * 
 */
class DB {

    // *
    //  * __construct
    //  * [setup properties]
    //  * @param string $hostname [description]
    //  * @param string $username [description]
    //  * @param string $password [description]
    //  * @param string $database [description]
     
    // function __construct() {

    // }

    static public function forge() {
        $dbConfig = Config::get('db');
        $activeDB = $dbConfig[$dbConfig['active']];

        return new \medoo(array(
            'database_type' => 'mysql',
            'database_name' => $activeDB['database'],
            'server' => $activeDB['hostname'],
            'username' => $activeDB['username'],
            'password' => $activeDB['password'],
            'charset' => 'utf8'
        ));
    }
}
