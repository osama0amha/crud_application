
<?php

class Conect {
   
    public $conn;

    public function __construct(){

        $this->conn = mysqli_connect('localhost','root','',"crud_php");

        // if($this->conn){
        //     echo 'yes';
        // }else{
        //     echo 'error';
        // }

    }

}

// $u = new Conect();

?>