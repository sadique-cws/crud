<?php 
$db = mysqli_connect("localhost","root","","crud");
session_start();

function checkAuth(){
    return isset($_SESSION['admin']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
   <?php include "header.php";?>

    <div class="container mt-5">
         <div class="col-12">
           <div class="row">
            <div class="col-9">
            <h2 class="my-3">All Records (<?php 
                
                if(isset($_GET['find'])){
                    $search = $_GET['search'];
                    $calling  = mysqli_query($db, "select * from records where name LIKE '%$search%'");
                }
                else{
                    $calling  = mysqli_query($db, "select * from records");
                }
                
                

                $count = mysqli_num_rows($calling);
                echo $count;
            ?>)</h2>
            </div>
            <div class="col-3">
                <form action="index.php" method="get" class="d-flex">
                    <input type="text"class="form-control" placeholder="Enter name or id" name="search">
                    <input type="submit" class="btn btn-warning" value="Go" name="find">
                </form>
            </div>
           </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
                <?php 
                
                while($row = mysqli_fetch_array($calling)){
                ?>
                
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?= $row['name'];?></td>
                        <td><?= $row['contact'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['city'];?></td>
                        <td>
                            <a href="" class="btn btn-info">view</a>
                            <?php  if(checkAuth()):?>
                                <a href="#edit<?= $row['id'];?>" data-bs-toggle="modal" class="btn btn-success">edit</a>
                            <div class="modal fade" id="edit<?= $row['id'];?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">Insert Record</div>
                    <div class="modal-body">
                    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?= $row['name'];?>">
                                </div>  
                                <div class="col-6">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact"  class="form-control" value="<?= $row['contact'];?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $row['email'];?>">
                                </div>
                                <div class="col-6">
                                    <label for="">city</label>
                                    <select class="form-select"  name="city">
                                            <option><?= $row['city'];?></option>
                                            <option disabled>-----------------------</option>
                                            <option>Purnea</option>
                                            <option>Patna</option>
                                            <option>Indore</option>
                                            <option>Bhopal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-success float-end mx-4" name="update" value="Update Record">
                                    <input type="hidden" name="id" value="<?= $row['id'];?>">
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
            </div>
        </div>
       
                            
                            <a href="index.php?del=<?= $row['id'];?>" class="btn btn-danger">Delete</a>
                            <?php endif;?>
                        </td>
                    </tr>
                
                <?php } ?>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>

<?php 

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $query = mysqli_query($db, "insert into records (name, email, city, contact) value ('$name', '$email','$city','$contact')");

    if($query){
        // header("location: index.php");
        echo "<script> window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('sorry data is not inserted')</script>";
    }
}

if(isset($_POST['update']) && checkAuth()){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $id = $_POST['id'];
    $query = mysqli_query($db, "update records  set name='$name', email='$email', city='$city', contact='$contact' where id='$id'");
    if($query){
        // header("location: index.php");
        echo "<script> window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('sorry data is not update')</script>";
    }
}



if(isset($_GET['del']) && checkAuth()){
    checkAuth();
    $id = $_GET['del'];
    $query = mysqli_query($db, "delete from records where id='$id'");
    if($query){
        // header("location: index.php");
        echo "<script> window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('sorry data is not deleted')</script>";
    }
}
?>