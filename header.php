<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="index.php" class="navbar-brand">CRUD</a>


            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="" class="nav-item nav-link">About</a>
                <?php 
                if(isset($_SESSION['admin'])){ ?>
                    <a href="insert.php"  class="nav-item nav-link">Insert</a>
                    <a href="logout.php"  class="nav-item btn btn-sm btn-danger nav-link">Logout</a>
                <?php }else{ ?>
                    <a href="login.php"  class="nav-item nav-link">Login</a>
                    
                <?php } ?>
            </div>
        </div>
    </nav>