<?php 
include("includes/header.php");

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1; 

$items_per_page = !empty($_GET['items']) ? (int)$_GET['items'] : 3;
$total_count = Photo::count_data();

$paginate = new Paginate($page, $items_per_page, $total_count);
$sql = "SELECT * FROM photos ";
$sql.= " LIMIT {$items_per_page} ";
$sql.= " OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);

// $photos = Photo::find_all(); 
?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
            
            <div class="row">
            <?php
                
                foreach($photos as $photo)
                {
                    ?>
                        <div class="col-xs-6 col-md-3">
                            <a href="photos.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                                <img class="home_page_photo img-thumbnail" src="admin/<?php echo $photo->photo_dir(); ?>" alt="">
                            </a>
                        </div>

                    <?php
                }

            ?>
    
            </div>
            
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->
            <?php //include("includes/sidebar.php"); ?>
            <div class="row justify-content-end">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="index.php?page=<?php echo $paginate->current_page; ?>&items=10" class="page-link">10</a>
                    </li>
                    <li class="page-item">
                        <a href="index.php?page=<?php echo $paginate->current_page; ?>&items=25" class="page-link">25</a>
                    </li>
                    <li class="page-item">
                        <a href="index.php?page=<?php echo $paginate->current_page; ?>&items=50" class="page-link">50</a>
                    </li>
                </ul>
            </div>
            <div class="row">
            <ul class="pager">
          <?php
            if($paginate->page_total() > 1){
                if($paginate->has_previous()){
                    echo "<li class='previous'><a href='index.php?page= " . $paginate->previous() . " class='page-link'>Previous</a></li>";
                }
                for ($i=1; $i<=$paginate->page_total() ; $i++) { 
                    if ($paginate->current_page == $i){
                        echo "<li  class='active'><a href=index.php?page=" . $i . ">" . $i . "</a></li>";
                    }else{
                        echo "<li><a href=index.php?page=" . $i . ">" . $i . "</a></li>";
                    }
                    
                }
                if($paginate->has_next()){
                    echo "<li class='next' justify-content-end'><a href='index.php?page= " . $paginate->next() . " class='page-link pull-right'>Next</a></li>";
                }
                
            }

        ?>
         </div>
         </div>
                 

       
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
