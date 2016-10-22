<?php

class DbFactory
{
    private static $db;
    
    public static function criar()
    {
        if(! self::$db){
            $db = new Db();
            self::$db = $db->conectar();
        }
        
        return self::$db;
    }
}