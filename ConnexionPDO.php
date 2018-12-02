<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/11/2018
 * Time: 17:37
 */

class ConnexionPDO
{
    private static $connexionPDO=null;
    private const HOST='localhost';
    private const DBName = 'events_db';
    private const USER= 'root';
    private const PASSWORD='';
    private function __construct()
    {

        try {
            self::$connexionPDO=new PDO ( 'mysql: host='.self::HOST.'; dbname='.self::DBName,self::USER,self::PASSWORD);
        }
        catch (PDOException $e) {
            die ($e->getMessage());
        }
    }
    public static function  getInstance(){
        if (!self::$connexionPDO){
            new ConnexionPDO();
        }
        return self::$connexionPDO;
    }


}