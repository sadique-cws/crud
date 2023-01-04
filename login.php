<?php 
$db = mysqli_connect("localhost","root","","crud");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Page for crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

<?php include "header.php";?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2>Login Here</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="enter email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">password</label>
                                <input type="password" name="password" placeholder="enter password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-success btn-lg w-100 mt-4">
                            </div>
                            <div class="mb-3 mt-5">
                                <span>Not have an Account? <a href="register.php">Click here</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($db, "select * from users where email='$email' AND password='$password'");

    $count = mysqli_num_rows($query);

    if($count > 0){
        $_SESSION['admin'] = $email;
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('invalid email and password try again')</script>";

    }

}