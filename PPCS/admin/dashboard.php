<?php
    session_start();
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["role"] != 'admin'){
        header("location: ../auth/login.php");
        exit;
    }

    require_once '../assets/connection.php';
?>

    <!DOCTYPE html>
    <Html lang="en">
        <head>
            <title>Admin Dashboard</title>
        </head>
        <body>
            <section>
                <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
                <h3>Parque Cafe Website User List:</h3>

                <br>

                <?php
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                ?>

                <br><br>

                <table>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM users" ;
                    $result = mysqli_query($conn,$sql);

                    if($result !== false){
                        $rows = mysqli_num_rows($result);
                        $sn = 1;
                        if($rows > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row["user_id"];
                                $username = $row["username"];
                                $email = $row["email"];
                                $role = $row["role"];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $row["user_id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["role"]; ?></td>
                                    <td><a href="delete_user.php?id=<?php echo $id; ?>">Delete</a></td>
                                </tr>

                                <?php
                            }
                        }
                    }
                    ?>
                </table>
                <br>
                <a href="../auth/logout.php">Logout</a>
            </section>
            <section>

            </section>
        </body>
    </Html>
