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
                <?php

                if(isset($_SESSION['msg']))
                {
                    echo "<p class='alert alert-success'>Uspesno ste obrisali korisnika!</p>"; 
                    unset($_SESSION['msg']);
                }


                ?>
                    <h1 class="page-header">
                        Users
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
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        
                                        $comments = Comment::find_all();

                                        foreach($comments as $comment){
                                           ?>
                                           <tr>
                                                <td><?php echo $comment->id; ?></td>
                                                <td><p><?php echo $comment->author; ?></p><br>
                                                    <a class="btn btn-danger" href="delete_comment.php?delete_id=<?php echo $comment->id; ?>">Delete</a>
                                                    </td>
                                                <td><?php echo $comment->body; ?></td>
                                           
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