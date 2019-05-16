
<?php include("includes/header.php"); ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
  
<!-- Izvrsiti proveru podudaranosti password-a -->
<?php 

include("includes/top_nav.php"); 
include("includes/side_nav.php");

$result = User::find_by_id($_GET['edit_id']);

if(empty($_GET['edit_id']))
{
    redirect_user("users.php");
}

if(isset($_POST['update_user']))
{
    
    $result->username   = $_POST['username'];
    $result->first_name = $_POST['first_name'];
    $result->last_name  = $_POST['last_name'];
    $file = $_FILES['user_image'];
    if(empty($file))
    {
        $result->save();
        $_SESSION['msg'] = true;
    }else{
        $result->set_file($file);
        $result->save_user_image();
        $result->save();
        $_SESSION['msg'] = true;
        
    }
}
   
    if(isset($_POST['delete_user']) && !empty($_POST['delete_user'])){
        if(!empty($_FILES['user_image']))
        {
            $result->delete_user_photo();
        }else{
            $result->delete();
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
                        echo "<p class='alert alert-success'>Uspesno ste izmenili podatke korisnika</p>"; 
                        unset($_SESSION['msg']);
                    }

                ?>
                <div class="col-md-6">
                <div>
                    <img data-toggle="modal" data-target="#photo-modal" src="<?php echo $result->photo_dir(); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
               <div class="col-md-6">
              
                <form action="" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="Username">Username:</label>
                        <input type="text" name="username" id="title" class="form-control" value="<?php echo $result->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $result->first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $result->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">New password:</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo $result->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-control" for="upload_image">Upload your picture</label>
                        <input type="file" id="upload_image" name="user_image" class="form-control-label">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" name="update_user" class="btn btn-success  pull-right">
                        <input type="submit" value="Delete" name="delete_user" class="btn btn-danger">
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
<?php 
include("includes/footer.php"); 
include("includes/edit_user_modal.php");
?>


