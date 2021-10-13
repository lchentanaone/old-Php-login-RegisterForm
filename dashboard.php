


<!DOCTYPE html>
<html>
<head>
    <title>CRUD log in and register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>

        <?php
            session_start();
            ?>
            <html>
            <?Php
            $conn = new mysqli("127.0.0.1", "root", "hyvhr", "crud php") or die("Connection failed: " . mysqli_error($conn));
            
        if (isset($_POST['register'])){
            
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['age'] = $_POST['age'];
                $_SESSION['favoriteColor'] = $_POST['favoriteColor']; 
                $_SESSION['favoriteFood']= $_POST['favoriteFood'];
            
                   

            $conn->query ("INSERT INTO crudprofile (username,age,favoriteColor,favoriteFood)
                VALUES('".$_SESSION['username']."', '".$_SESSION['age']."',  '".$_SESSION['favoriteColor']."', '".$_SESSION['favoriteFood']."')")
                or die  ($conn->error);
                $_SESSION['id'] = $conn->insert_id;
                
        }
            
        elseif (isset($_POST['log_in'])){ 
            
                            
            $sql = "SELECT id, username, age, favoriteColor,favoriteFood FROM crudprofile WHERE username='".$_POST['name']."' and age= '".$_POST['age']."' ";
            $result = $conn->query($sql);
        }
        
            if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                $_SESSION['id']= $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['age'] = $row['age'];
                $_SESSION['favoriteColor'] = $row['favoriteColor']; 
                $_SESSION['favoriteFood']= $row['favoriteFood'];
            
            }
            } else {
            echo "No user";
            }
            
            $conn->close();
            

        ?>
        
        
        
    <div class="row justify-content-center">
      
          
            <h1> Welcome <?php echo $_POST['username']; ?> </h1>  <br>
            <a href="profile.php"><button type= "submit" class="btn btn-warning" name= "view profile"> View profile </button> 
             <a href="changeprofile.php"><button type= "submit" class="btn btn-danger" name= "change profile"> Change Profile </button> </a>
        










    </div>
    </body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>



