<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    
        $sql="Select * from register where name='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num= mysqli_num_rows($result);
        if($num == 1){
            $login = true;
            session_start();
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            // header("location: ./dashboard/index.php");    
            if ($user['role'] == 'admin') {
                header("Location: ./dashboard/admin/index_page2.php");
            } else {
                header("Location: page.html");
            }
            exit();     
        }
    else{
        $showError = "username or password incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
    if($login){
    echo' 
    <div class="alert alert-success alert-dismissible fade show msg" role="alert">
        <strong>success!</strong> You are loged in...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>';
    }
    if($showError){
        echo' 
        <div class="alert alert-danger alert-dismissible fade show msg" role="alert">
            <strong>Error...!</strong>'.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>';
        }
?>
    <div class="form-container">
        <h1>Sign In</h1>
        <form action="/PrimeVideo/login.php" method="post">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-button">
                <button type="submit">Sign In</button>
            </div>
        </form>
        <div class="form-footer">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>