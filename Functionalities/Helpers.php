<?php
    function logged(){
        if(isset($_SESSION['identity'])){
            return true;
        }else{
            return false;
        }
    }


?>