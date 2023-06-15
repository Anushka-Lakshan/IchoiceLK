<?php


if(!isset($_SESSION['admin_email'])){
    header("Location: ../login.php");
}else{
?>


<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
    <li>
    <i class="fa fa-cube"></i> Dashboard / View categories
    </li>
</ol>
</div>
<!-- col lg 12 end -->
</div>
<!-- row end -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading"><h4>View Categories</h4></div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Category id</th>
            <th>category Title</th>
            <th>category description</th>
            <th>Edit category</th>
            <th>Delete category</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
            $i = 0;

            $get_cats = "select * from product_category";
            $run_cats = mysqli_query($con,$get_cats);

            while($row_cat=mysqli_fetch_array($run_cats)){

                $cat_title = $row_cat['p_cat_title'];
                $cat_id = $row_cat['p_cat_id'];
                $cat_desc = $row_cat['p_cat_desc'];
                $i ++;

                echo"
                    <tr>
                    <td>$i</td>
                    <td>$cat_title</td>
                    <td>$cat_desc</td>
                    <td>
                    <button class='btn btn-danger' onclick='confirm_$cat_id()'><i class='fa fa-trash'></i> Delete</button>
                                <script>
                                    function confirm_$cat_id() {
                                    
                                    if (confirm('Do you want to delete [ $cat_title ] category?')){
                                        window.open('index.php?delete_cat=$cat_id','_self');
                                    } else {
                                        
                                    }
                                    
                                    }
                                    </script>
                    </td>
                    <td><a class='btn btn-warning' href='index.php?edit_cat=$cat_id'><i class='fa fa-pen'></i> Edit</a></td>
                    </tr>
                
                ";


            }

        ?>
    </tbody>
</table>
</div>
<!-- table-responsive end -->
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