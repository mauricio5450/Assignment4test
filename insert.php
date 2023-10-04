<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php
            require('db.php');
            if(isset($_REQUEST['username'])){
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con,$username);
                
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con,$email);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con,$password);

                $create_datetime = date("Y-m-d H:i:s");
                $query = "INSERT into `users` (username,password,email,create_datetime) VALUES('$username','" . md5($password)."','$email', '$create_datetime')"; 
                
                $result = mysqli_query($con,$query);
                if($result){
                    echo "<div class='form'>
                        <h3>You created a new user.</h3><br/>
                        <p class='link'>Clicke here to return to <a href='dashboard.php'>Dashboard</a></p>
                        </div>";
                    
                }else{
                    echo "<div class='form'>
                        <h3>Required fields are missing.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a>again.</p>
                        </div>";
                }
            }else{
        ?>
        <form class = "form" action="" method="">
            <h1>New User</h1>
            <div class="mb-3 mt-3">
                <input type="text" class="login-input" name="username" placeholder="Username" required/>
            </div>
            <input type="text" class="login-input" name="email" placeholder="Email Address">
            <input type="password" class="login-input" name = "password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
        </form>
        <?php
            }
        ?>
    </body>
</html>