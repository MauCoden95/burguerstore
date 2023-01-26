<?php
    class Database{
        public static function connect(){
            $db = new mysqli("localhost","root","","burguer_store");
            $db->query("SET NAMES UTF8");

            return $db;
        }
    }


?>