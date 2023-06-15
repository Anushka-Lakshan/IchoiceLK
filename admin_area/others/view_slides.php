<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-cube"></i> Dashboard / View Slides
            </li>
        </ol>
    </div>
    <!-- col lg 12 end -->
</div>
<!-- row end -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>View Slides</h4>
            </div>
            <div class="panel-body">

                <?php

$get_slides = "select * from slider";

$run_slide = mysqli_query($con,$get_slides);

while($row_slide=mysqli_fetch_array($run_slide)){

$slide_id = $row_slide['slide_id'];
$slide_title = $row_slide['slide_name'];
$slide_image = $row_slide['slide_image'];



?>

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 align="center" class="panel-title">
                                <?php echo $slide_title;  ?>
                            </h4>
                        </div>
                        <!-- panel-heading -->
                        <div class="panel-body">
                        <img src="slide_images/<?php echo $slide_image;  ?>" class="img-responsive" alt="">
                        </div>
                        <!-- panel-body end -->
                        <div class="panel-footer">
                        <center><a href="#" onclick="confirm_<?php echo $slide_id; ?>()"><i class="fa fa-trash" style="margin-right:5px;"></i>Delete</a></center>
                        </div>
                        <!-- panel-footer end -->
                        <?php

                        echo"
                            <script>
                            function confirm_$slide_id() {
                            
                            if (confirm('Do you want to delete [ $slide_title ] Slide?')){
                                window.open('index.php?delete_slide=$slide_id','_self');
                            } else {
                                
                            }
                            
                            }
                            </script>";

                        ?>
                    </div>
                    <!-- panel end -->
                </div>
                <!-- end-col-md-4 -->

                <?php
}
?>
            </div>
            <!-- panel-body end -->
        </div>
        <!-- panel end -->
    </div>
    <!-- col lg 12 end -->
</div>
<!-- row end -->













<?php

}

?>