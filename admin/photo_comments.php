<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
<?php
    include("includes/top_nav.php"); 
    include("includes/side_nav.php"); 
  
    if(empty($_GET['id']))
    {
        redirect_user("photos.php");
    }
    $all_comments = Comment::find_the_comments($_GET['id']);
   
   
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
                       <div class="col-lg-6">
                       <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    <th>Comments options</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        

                                        foreach($all_comments as $comment){
                                           ?>
                                           <tr>
                        
                                                <td><?php echo $comment->id; ?></td>
                                                <td><?php echo $comment->author; ?></td>
                                                <td><?php echo $comment->body; ?></td>
                                                <td>
                                                    <div class="action_links">
        
                                                        <a class="btn btn-danger" href="delete_comment.php?delete_id=<?php echo $comment->id; ?>">Delete</a>
                                                    </div>
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