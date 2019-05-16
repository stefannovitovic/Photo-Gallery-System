<?php 
include("includes/header.php"); 

?>

            <?php 
            
                if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
                    $delete_id = $_GET['delete_id'];
                    

                    $photo = Photo::find_by_id($delete_id);
                    if($photo){
                        $photo->delete_photo();
                        redirect_user("photos.php");
                    }
                                        
                }
            
            
            
            ?>
