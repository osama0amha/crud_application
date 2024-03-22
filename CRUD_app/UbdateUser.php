
<?php

require_once('database/user.php');
$user = new User();
$user_id = $_GET['id'];

$u = $user->find($user_id);

$error = null;
$name = $u['name'];
$email =$u['email'];

 

if(isset($_POST['update'])){

    
    $name = $_POST['name'];
    $email = $_POST['email'];

    $fnm=$_FILES["image"]["name"];
    $dst="./images/".$fnm;
    $dst1="images/".$fnm;

    if(strlen($name) == 0){
        $error = 'name require';
    }
    elseif(strlen($email) == 0){
        $error = 'email require';
    }elseif(strlen($fnm) == 0){
        $error = 'image require';
    }
    else{

   

    // print_r($_FILES['image']);
  
      move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

      $user->update($user_id ,[
          'name' => $name,
          'email'=> $email,
          'image'=> $dst1,
      ]);

      header('location: http://localhost/CRUD/');

   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body >
<a href="index.php" class="btn btn-primary " >Home</a>

    <div class="container mt-5">

    <?php 
    if($error)

    echo "<div class='alert alert-danger text-center' role='alert'>
         $error!
       </div>";


   ?>

    <h2 class ='mb-4 text-primary'>Update User</h2>

        <form method="post" enctype="multipart/form-data">
         
        <div class="mb-3">
           <label for="name" class="form-label">Name</label>
           <input type="text" name = 'name' value = "<?php echo $name ?>" class="form-control" require id="name" aria-describedby="enameHelp">
         </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name = 'email' value = "<?php echo $email ?>" class="form-control" require id="exampleInputEmail1" aria-describedby="emailHelp">
       </div>

       <div class="mb-3">
           <label for="img" class="form-label">Add image</label>
           <input type="file" name = 'image'  require class="form-control" id="img" require  >
        </div>

        <div class="mb-3">
           <input type="submit" name='update'value="Update" class="form-control btn btn-primary">
        </div>

        </form>
    </div>
    
</body>
</html>