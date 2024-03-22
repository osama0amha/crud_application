
<?php

require_once('conect.php');

class User {

    public function all(){

        $conn = new Conect();

        $sql = 'SELECT * FROM `users`';

        $result = mysqli_query($conn->conn,$sql);
      
        $data = array();

        while($row = mysqli_fetch_assoc($result)){

            $data[] = $row;
        }
        mysqli_close($conn->conn);

        return $data;
    }


    public function find($user_id){

        $conn = new Conect();

        $sql = "SELECT * FROM `users` WHERE id = $user_id";

        $result = mysqli_query($conn->conn,$sql);
      

        while($row = mysqli_fetch_assoc($result)){

            $data = $row;
        }

        mysqli_close($conn->conn);

        return $data;
    }

    public function create($arr){
       
        $conn = new Conect();

        $sql = "INSERT INTO users (name,email,image) VALUE ( '$arr[name]','$arr[email]' ,'$arr[image]')";

        $conn->conn->query($sql);

        // if ($conn->conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
        // } else {
        //   echo "Error updating record: " . $conn->conn->error;
        // }

         $conn->conn->close();
    }


    public function update($user_id,$arr){
       
        $conn = new Conect();

        $sql = "UPDATE users SET name = '$arr[name]', email= '$arr[email]' , image = '$arr[image]' WHERE id = $user_id";

        $conn->conn->query($sql) ;

        // if ($conn->conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
        // } else {
        //   echo "Error updating record: " . $conn->conn->error;
        // }

         $conn->conn->close();
    }

    public function delete($user_id){

        $conn = new Conect();

        $sql = "DELETE FROM `users` WHERE id = $user_id";
        
        $conn->conn->query($sql);
        // if ($conn->conn->query($sql) === TRUE) {
        //     echo "Record updated successfully";
        //   } else {
        //     echo "Error updating record: " . $conn->conn->error;
        //   }

          $conn->conn->close();

    }


}

?>