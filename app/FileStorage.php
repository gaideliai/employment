<?php

declare(strict_types=1);

namespace App;

class FileStorage    
{
    const PATH = './../db/candidates.txt';

    public function __construct()
    {
        if ( ! file_exists( self::PATH ) ) {
            file_put_contents( self::PATH, '' );
        }
    }

    public function insert( string $name ) : void
    {
        if( strpos( file_get_contents( self::PATH ), $name ) === false ) {
            file_put_contents( self::PATH, $name . "\n", FILE_APPEND | LOCK_EX );
        }
    }
}
