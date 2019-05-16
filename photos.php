<?php

require_once("admin/includes/init.php");


if(empty($_GET['id']))
{
    redirect_user("index.php");
}
$photo = Photo::find_by_id($_GET['id']);
$comments = Comment::find_the_comments($_GET['id']);

if(isset($_POST['send_comment'])){
    $photo_id = $photo->id;
    $author = trim($_POST['author']);
    $body   = trim($_POST['body']);

    $result = Comment::create_comment($photo_id, $author,  $body);
    if($result)
    {
        $result->save();
        redirect_user("photos.php?id={$photo->id}");
    }else{
        $message = "There was some problems!";
    }
}


require_once("includes/header.php");
?>

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
              
                <p class="lead">
                    by <a href="#"><?php echo $photo->caption; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Created: <span class="glyphicon glyphicon-time"></span> <?php echo $photo->time; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="thumbnail" src="admin/<?php echo $photo->photo_dir(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->description; ?></p>
               

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->



                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" role="form" method="POST">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control">
                    </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" name="send_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                foreach ($comments as $comment){
                
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>
                                time: 19-06-1995
                            </small>
                        </h4>
                        <?php echo $comment->body; ?>
                        <div class="divider"></div> 
                    </div>
                </div>
                
                <?php } ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
              <?php 
                
                require_once("includes/sidebar.php");

              ?>

        </div>
        <!-- /.row -->

        <?php
            
            require_once("includes/footer.php");

        ?>

