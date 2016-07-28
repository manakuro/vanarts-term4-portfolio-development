<?php

class Config {

    public static function get($props = 'config') {
        $base = dirname(__FILE__).'/../config/';
        $splited = explode('.', $props);

        if (!empty($splited)) {
            $path = '';
            foreach( $splited as $index => $_path ) {
                $delimitor = '/';
                if ( $index === count($splited) - 1 ) {
                    $delimitor = '';
                    $prop = $_path;
                }

                $path .= $_path.$delimitor;
            }

            $path = $base.$path.'.php';
            if ( file_exists($path) ) {
                return require $path;
            }
        }
    }
}

