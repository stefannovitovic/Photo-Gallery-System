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
                        <a href="add_user.php" class="btn btn-primary">Add user</a>
                        <small>Subheading</small>
                    </h1>
                       <div class="col-lg-12">
                       <div class="col-lg-6">
                       <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        
                                        $users = User::find_all();

                                        foreach($users as $user){
                                           ?>
                                           <tr>
                                                <td><?php echo $user->id; ?></td>
                                                <td>
                                                    <img style='width:150px; height:150px;'src="<?php echo $user->image_path_and_placeholder(); ?>">
                                                </td>
                                                <td><p><?php echo $user->username; ?></p><br>
                                                    <a class="btn btn-warning" href="edit_user.php?edit_id=<?php echo $user->id; ?>">Edit</a>
                                                    <a class="btn btn-danger" href="delete_user.php?delete_id=<?php echo $user->id; ?>">Delete</a>
                                                    </td>
                                                <td><?php echo $user->first_name; ?></td>
                                                <td><?php echo $user->last_name; ?></td>
                                           
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