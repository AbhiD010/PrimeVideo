<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnect.php';
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : "";
    // $username = $_POST["username"];
    // $email = $_POST["email"];
    // $mobile = $_POST["mobile"];
    // $password = $_POST["password"];
    // $confirmPassword = $_POST["confirmPassword"];
    $exists=false;
    if(($password == $confirmPassword) && $exists==false){
        $sql="INSERT INTO `register` ( `name`,`email`,`mobile`,`password`,`dt`) VALUES ('$username','$email','$mobile','$password',current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
    if($showAlert){
    echo' 
    <div class="alert alert-success alert-dismissible msg" role="alert">
        <strong>success!</strong> Your account has now created...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>';
    }
    if($showError){
        echo' 
        <div class="alert alert-danger alert-dismissible show msg" role="alert">
            <strong>Error...!</strong>'.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>';
        }
?>
    <!-- <div class="container"> -->
        
        
    <div class="form-container">
        <h1>Sign up</h1>
        <form action="/PrimeVideo/signup.php" method="post">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="number" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Conform your password" required>
            </div>
            <div class="form-button">
                <button type="submit">Sign up</button>
            </div>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Sign in</a></p>
        </div>
    </div>
        
    <!-- </div> -->
</body>
</html>