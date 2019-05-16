<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          

 <?php 
     
     include("includes/top_nav.php"); 
     include("includes/side_nav.php"); 

    if(isset($_POST['add_user']))
    {
        $user = new User;
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->first_name = $_POST['first_name'];
        $user->last_name  = $_POST['last_name'];
        $user->set_file($_FILES['user_image']);
        $user->save_user_image();
        if($user->save())
        {
            $_SESSION['msg'] = true;

        }


    }

    
    



?>





           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
                        <small>Subheading</small>
                    </h1>
                       <div class="col-lg-12">
                       <?php
                            
                            if(isset($_SESSION['msg']))
                            {
                                echo "<p class='alert alert-success'>Uspesno ste kreirali korisnika</p>"; 
                                unset($_SESSION['msg']);
                            }

                        ?>
                       <div class="col-md-6">
                      
                        <form action="" method="POST" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <label for="Username">Username:</label>
                                <input type="text" name="username" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="upload_image">Upload your picture</label>
                                <input type="file" id="upload_image" name="user_image" class="form-control-label">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Create" name="add_user" class="btn btn-success">
                            </div>
                            
                        
                        
                        
                        

                       </div>
                       </form>
                       </div>
                </div>
            </div>
            <!-- /.row -->

            </div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>