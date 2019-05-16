<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          

 <?php 
     
     include("includes/top_nav.php"); 
     include("includes/side_nav.php"); 


    if(empty($_GET['edit_id'])){
        redirect_user("photos.php");
    }else {
        $id = $_GET['edit_id'];
        $photo = Photo::find_by_id($id);

        if (isset($_POST['update'])){
            if($photo){

                $photo->title       = $_POST['title'];
                $photo->alternate_text = $_POST['alternate_text'];
                $photo->caption     = $_POST['caption'];
                $photo->description = $_POST['description'];

                if($photo->save()){
                    redirect_user("photos.php");
                }else{
                    die();
                }
            }
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
                       <div class="col-md-8">
                      
                        <form action="" method="POST">
                        
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo $photo->title; ?>">
                            </div>
                            <div class="form-group">
                                <a href="#" class="thumbnail"><img src="<?php echo $photo->photo_dir() ?>" alt=""></a>
                            </div>
                            <div class="form-group">
                                <label for="alternate_text">Alternate text:</label>
                                <input type="text" name="alternate_text" id="alternate_text" class="form-control" value="<?php echo $photo->alternate_text; ?>">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption:</label>
                                <input type="text" name="caption" id="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                            </div>
                            <div class="description">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                            </div>
                        
                        
                        
                        

                       </div>
                       <?php include("includes/edit_photo_snippet.php");  ?>
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