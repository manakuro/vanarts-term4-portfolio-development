<?php

class Autoloader {

    private static $dirs = array();

    /**
     *  call classes
     *
     *  @method load
     *  @param
     *  @return
     */
    public static function load($class) {
        $class = ltrim($class, '\\');
        $class = strtolower($class);

        $file_name = '';
        $namespace = '';
        if ($lastnspos = strripos($class, '\\')) {
            $namespace = substr($class, 0, $lastnspos);
            $class = substr($class, $lastnspos + 1);
            $file_name  = str_replace('\\', '/', $namespace) . '/';
        }
        //$file_name .= str_replace('_', '/', $class);
        $file_name .= $class;
        $file_name = str_replace('/classes', '', $file_name);

        foreach(static::dirs() as $dir) {
            $path = $dir.'/'.$file_name.'.php';

            if ( file_exists($path) ) {
                // var_dump('class is included: '.$file_name);
                include $path;
                return true;
            }
        }
    }

    /**
     *  class directories
     *
     *  @method dirs 
     *  @param  
     *  @return  
     */
    public static function dirs() {
        if ( empty(self::$dirs) ) {
            $base = dirname(__FILE__).'/classes';
            self::$dirs = array(
                $base
            );
        }
        return self::$dirs;
    }

    /**
     *  register spl_autoload function
     *
     *  @method register
     *  @param
     *  @return
     */
    public static function register() {
        spl_autoload_register('Autoloader::load');
    }
}