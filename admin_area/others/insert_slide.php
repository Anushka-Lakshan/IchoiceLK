<?php

if(!isset($_SESSION['admin_email'])){
    header("Location: login.php");
}else{

?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-sitemap"></i> Dashboard / Insert Slide
            </li>
        </ol>
    </div>
    <!-- col-lg 12 end -->
</div>
<!-- row end -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Insert Slide</h3>
            </div>
            <!-- panel head end -->
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slide title</label>
                        <div class="col-md-6">
                            <input type="text" name="slide_title" id="" class="form-control" required>
                        </div>
                    </div>
                    <!-- form group end -->
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slide image</label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" accept=".png, .jpeg, .jpg" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Slide" id="" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <!-- panel body end -->
        </div>
        <!-- panel end -->
    </div>
    <!-- col lg 12 end -->

</div>
<!-- row end -->

<?php
function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

?>



<?php

 if(isset($_POST['submit'])){

    $slide_title = $_POST['slide_title'];
    

    $slide_image = $_FILES['slide_image']['name'];
    $temp_name = $_FILES['slide_image']['tmp_name'];

   $view_sides = "select * from slider";

   $run_slide = mysqli_query($con,$view_sides);
   $count = mysqli_num_rows($run_slide);

   if($count>=3){

   echo " <script> alert('You have already 3 slides please delete one before insert new slide') </script>";

       
   }else{

    $insert_slide = "insert into slider (slide_name,slide_image) values ('$slide_title','$slide_image')";

    $run_slide = mysqli_query($con,$insert_slide);

    if(is_array($_FILES)) {
        $new_width = 800;
        $new_height = 550;
        $fileName = $_FILES['slide_image']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES['slide_image']['name'];
        $uploadPath = "slide_images/";
        $fileExt = pathinfo($_FILES['slide_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];

        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagejpeg($imageLayer,$uploadPath. $slide_image);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagegif($imageLayer,$uploadPath. $slide_image);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagepng($imageLayer,$uploadPath. $slide_image);
                break;

            default:
                
                break;
        }
    }else{
        echo " <script> alert('FILE error please contact developer') </script>";
    }





        echo " <script> alert('Your slide has inserted') </script>";
        echo " <script> window.open('index.php?view_slide','_self') </script>";
 }
 }





?>

















<?php
}

?>