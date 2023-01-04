<?php 
$db = mysqli_connect("localhost","root","","crud");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page for crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

<?php include "header.php";?>


<div class="container mt-5">
    <div class="col-6 mx-auto">
    <div class="card">
        <div class="card-header">
            <h1>Insert Record Here</h1>
        </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="">city</label>
                                    <select class="form-select"  name="city" >
                                            <option>Purnea</option>
                                            <option>Patna</option>
                                            <option>Indore</option>
                                            <option>Bhopal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-success float-end mx-4" name="send" value="Create">
                                    <input type="reset" class="btn btn-danger float-end" value="Clear Form">
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
                   
    </div>
</div>
    
</body>
</html>