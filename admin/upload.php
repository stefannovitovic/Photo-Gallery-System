<?php 

    include("includes/header.php"); 

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
<?php 

    include("includes/top_nav.php"); 
    include("includes/side_nav.php");


    if(isset($_POST['upload_files'])){
        
        
        
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->time  = date("Y.m.d h:i:s");
        $photo->set_file( $_FILES['file_upload']);
        $photo->save_image();

        
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
                Upload 
                <small>Subheading</small>
            </h1>
            <div class="col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                    <input type="file" name="file_upload">
            </div>
            <input type="submit" value="Upload" name="upload_files" class="btn btn-warning">
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