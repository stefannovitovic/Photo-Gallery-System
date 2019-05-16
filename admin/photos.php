<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          



            <?php include("includes/top_nav.php");     ?>

                
            <?php include("includes/side_nav.php"); ?>




           
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
                       <div class="col-lg-6">
                       <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Photo</th>
                                    <th>ID</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        
                                        $results = Photo::find_all();

                                        foreach($results as $result){
                                           ?>
                                           <tr>
                                                <td><img class="admin-thumbnail" src="images/<?php echo $result->filename ?>">
                                                    </br>
                                                    <div class="action_links">
                                                        <a class="btn btn-danger" href="delete_photo.php?delete_id=<?php echo $result->id; ?>">Delete</a>
                                                        <a class="btn btn-primary" href="edit_photo.php?edit_id=<?php echo $result->id; ?>">Edit</a>
                                                        <a class="btn btn-success" href="../photos.php?id=<?php echo $result->id; ?>">View</a>
                                                    </div>
                                                
                                                </td>
                                                <td><?php echo $result->id; ?></td>
                                                <td><?php echo $result->filename; ?></td>
                                                <td><?php echo $result->type; ?></td>
                                                <td><?php echo $result->size; ?></td>
                                                <td>
                                                <?php 
                                                    $all_comments = Comment::find_the_comments($result->id);
                                                ?>
                                                <a href="photo_comments.php?id=<?php echo $result->id;?>" class="btn btn-info"><?php echo count($all_comments); ?></a>
                                                
                                                
                                                </td>
                                           
                                           </tr>




                                           <?php
                                        }






                                    ?>
                            </tbody>
                       </table>
                       </div>
                       </div>
                </div>
            </div>
            <!-- /.row -->

            </div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>