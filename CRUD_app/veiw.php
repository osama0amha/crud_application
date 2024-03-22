
<?php

require_once('database/user.php');
$user_id = $_GET['id'];
$u = new User();

$user = $u->find($user_id);

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

<a href="index.php" class="btn btn-primary " >Home</a>
   <div class="container ">
    
   
   <div class="radd  d-flex align-items-center ">
     
     <div class="images d-block">
        <img src="<?php echo $user['image'] ?>" alt="log">
     </div>

     <div class="cared ">
        <p class="name"><span >name : </span> &nbsp;  &nbsp;<?php echo $user['name'] ?></p>
        <p class="email"><span >email : </span> &nbsp;  &nbsp;<?php echo $user['email'] ?></p>
     </div>

    </div>

   </div>
    
</body>
</html>