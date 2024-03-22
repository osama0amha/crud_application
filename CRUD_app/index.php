
<?php

require_once('database/user.php');

$u = new User();

$users = $u->all();

if(isset($_POST['delete'])){

    $u->delete( $_POST['id']);
    header('location:http://localhost/CRUD/');
}

if(isset($_POST['update'])){

    $id = $_POST['id'];  
    header('location:http://localhost/CRUD/UbdateUser.php?id='.$id);
}

if(isset($_POST['veiw'])){

  $id = $_POST['id'];  
  header('location:http://localhost/CRUD/veiw.php?id='.$id);
}
// print_r($users);


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
<body>

<div class="container mt-5 ">

<a href="AddUser.php"  class="btn btn-success mb-4">+ add user</a>

<table class="table table-bordered">
  <thead>
    <tr>
    
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">button</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user){ ?>
    <tr>
      <td>
        <span class="image d-block">
             <img src="<?php echo $user['image']?>" alt="logo">
        </span>
      </td>

      <td class = 'd-flax'><p><?php echo $user['name']?></p></td>

      <td><p><?php echo $user['email']?></p></td>

      <td class = 'd-flex  justify-content-around'>

        <form  method="post">
        <input name = 'id' class = 'd-none' value="<?php echo $user['id']?>" type="text">
        <input type="submit" class="btn btn-success" name='veiw' value="veiw">
        </form>

        <form  method="post">
        <input name = 'id' class = 'd-none' value="<?php echo $user['id']?>" type="text">
        <input type="submit"  class="btn btn-primary " name='update' value="update">
        </form>

        <form  method="post">
          <input name = 'id' class = 'd-none' value="<?php echo $user['id']?>" type="text">
        <input type="submit"  class="btn btn-danger " name='delete' value="delete">
        </form>
        
      </td>
    </tr>
    <?php };?>
  </tbody>

  <!--  -->
 
  <!--  -->
</table>





</div>


    
</body>
</html>