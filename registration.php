<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php
            require('db.php');
            if(isset($_REQUEST['username'])){
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con,$username);

                $firstname = stripslashes($_REQUEST['firstname']);
                $firstname = mysqli_real_escape_string($con,$firstname);
                
                $lastname = stripslashes($_REQUEST['lastname']);
                $lastname = mysqli_real_escape_string($con,$lastname);

                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con,$email);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con,$password);

                $create_datetime = date("Y-m-d H:i:s");
                $query = "INSERT into `users` (username,password,email,create_datetime, FirstName,LastName) VALUES('$username','" . md5($password)."','$email', '$create_datetime','$firstname','$lastname')"; 
                
                $result = mysqli_query($con,$query);
                if($result){
                    echo "<div class='form'>
                        <h3>Your are registered successfully.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                        </div>";
                    
                }else{
                    echo "<div class='form'>
                        <h3>Required fields are missing.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a>again.</p>
                        </div>";
                }
            }else{
        ?>
        <form class = "form" action="" method="post">
            <h1>Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required/>
            <input type="text" class="login-input" name="firstname" placeholder="First Name" required/>
            <input type="text" class="login-input" name="lastname" placeholder="Last Name" required/>
            <input type="text" class="login-input" name="email" placeholder="Email Address">
            <input type="password" class="login-input" name = "password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
        <?php
            }
        ?>
    </body>
</html>