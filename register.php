
<?php 
$db = mysqli_connect("localhost","root","","crud");
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
                        <h2>Register Here</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">name</label>
                                <input type="text" name="name" placeholder="enter name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">contact</label>
                                <input type="text" name="contact" placeholder="enter contact" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="enter email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">password</label>
                                <input type="password" name="password" placeholder="enter password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signup" class="btn btn-success btn-lg w-100 mt-4">
                            </div>
                            <div class="mb-3 mt-5">
                                <span>already have an account ? <a href="login.php">Click here</a></span>
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

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($db, "insert into users (name,email,contact, password) value('$name','$email','$contact','$password')");

    if($query){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed')</script>";
    }
}
?>