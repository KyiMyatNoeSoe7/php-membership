<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
       session_start();
       include ('db.php');
       if(isset($_POST['Login'])) {

            $email= $_POST['email'];
            $password= $_POST['password'];
            $query = "SELECT * FROM `users` WHERE email='$email' OR password='$password' ";
            $result = mysqli_query($connect,$query)or die("Could Not Perform the Query");
 
            if(mysqli_num_rows($result) == 1) { 
              foreach($result as $data) {
                $db_name = $data['name'];
                $db_email = $data['email'];
                $db_password = $data['password'];
              }
              if($password == $db_password) {
                $_SESSION['name'] = $db_name;
                $_SESSION['email'] = $db_email;
                $_SESSION['password'] = $db_password;
                header('location:home.php');
              }
              else {
                echo "Incorrect Password!";
              }
            }
            else {
                echo "Please register";
            }
                  
        }
    ?>
  <div class="container">
    <div class="card mt-4 " style="width: 25rem;">
      <div class="card-header text-center">Login Form</div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="InputPassword">
                </div>
                <button name="Login" type="submit" class="btn btn-primary" style="width: 22.5rem;">Login</button>
            </form>
        </div>
        <div class="card-footer">
          <div class="text-center">
            If you don't have an account ? <a href="register.php">Register here</a>
          </div>
        </div>
    </div>
  </div>
</body>
</html>