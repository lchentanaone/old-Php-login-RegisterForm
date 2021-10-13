<?php

session_start();

// UPDATE tblname SET fieldname='NEW VALUE' WHERE id=''

if (isset($_POST['update'])){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['favoriteColor'] = $_POST['favoriteColor']; 
    $_SESSION['favoriteFood']= $_POST['favoriteFood'];

    
    $conn = new mysqli("127.0.0.1", "root", "hyvhr", "crud php") or die("Connection failed: " . mysqli_error($conn));
    $conn->query ("UPDATE crudprofile 
    SET username='". $_SESSION['username']."', 
    age='". $_SESSION['age']."', 
    favoriteColor='". $_SESSION['favoriteColor']."',
    favoriteFood='". $_SESSION['favoriteFood']."' 
    WHERE id='".$_SESSION['id']."'") or die ($conn->error);

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg?_type'] = "warning!";

    header("location: profile.php");


}




?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD log in and register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>






    <div class= "container">
   

    <div class="form-group">
    <form action="changeprofile.php" method="POST">

    
        <h1>Change profile</h1>
            <label>id</label>
            <input type="text" name = "id"  class="form-control" value="<?php echo $_SESSION['id']; ?>">   
            </div>
            <label>Username</label>
            <input type="text" name = "username"  class="form-control" value="<?php echo $_SESSION['username']; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
            <label>Age</label>
            <input type="text" name = "age" class="form-control" value= "<?php echo $_SESSION['age']; ?>" placeholder="Enter your age">
            </div>
            <div class="form-group">
            <label>Favorite color</label>
            <input type="text" name="favoriteColor" class="form-control" value= "<?php echo $_SESSION['favoriteColor']; ?>" placeholder="Enter your favorite color">
            </div>
            <div class="form-group">
            <label>Favorite food</label>
            <input type="text" name = "favoriteFood"class="form-control"  value= "<?php echo $_SESSION['favoriteFood']; ?>" placeholder="Enter your favotite food">
            </div>

            
            <input type= "hidden" name="update">
              <button type= "submit" class="btn btn-info"  name= "update">update </button>
            
            
    </div>
 








</body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>