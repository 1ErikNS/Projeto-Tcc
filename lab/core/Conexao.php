<?php
 
class Conexao {
 
    public static $instance;
    
    public static function getInstance() {
        global $dados_db;
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=".$dados_db['dbhost'].";dbname=".$dados_db['dbnome']."", $dados_db['dbuser'], $dados_db['dbsenha'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
}
 
?>