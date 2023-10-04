<?php
    include("auth_session.php");
    include("db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Dashboard - Client Area</title>
    </head>
    <body>
        <div class="row">
            <p class="col-sm-4">Dashboard</p>
            <p class="col-sm-4">Hey, <?php echo $_SESSION['username']; ?>!</p>
            <button class="btn btn-danger col-sm-4"><a class="text-dark"href="logout.php">Logout</a></button>
        </div>
        <button class="btn btn-primary"><a class="text-dark" href="insert.php">Create User</a></button>
        <table class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
            <?php 
                $sql = "SELECT id,FirstName,LastName, username, email, password from users";
                $result = $con->query($sql);
                if($result-> num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["id"] . "</td>
                              <td>".$row["FirstName"]."</td>
                              <td>".$row["LastName"]."</td>
                              <td>". $row["username"]."</td>
                              <td>".$row["email"]."</td>
                              <td>".$row["password"]."</td>
                              <td><button class='btn btn-danger'><a class='text-dark' href='delete.php?deleteid=".$row['id']."'>Delete</a></button>
                              </td></tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>