
<!-- start header including -->
<?php 
include('./mainInclude/header.php')
?>
<!-- end header including -->

<!-- Start course page  banner -->

<div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow: 10px;">
        </div>
    </div>
    <!-- End course page  banner -->



<!-- start course detail  -->
<!-- coursedetail.php -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="./image/courseimg/guitar.jpg" class="card-img-top" alt="Guitar" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: Learn Guitar</h5>
                <p class="card-text">Description: Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <p class="card-text">Duration: 10 Days</p>
                <form action="" method="post">
                <p class="card-text d-inline">Price: <small><del>&#8377 2000</del></small><span class="font-weight-bolder">&#8377 200 </span></p>
                <button type="submit" name="buy" class="btn btn-primary text-white font-weight-bolder float-right " >Buy Now</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Indroduction</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end course detail -->

<!-- start footer including -->
<?php 
include('./mainInclude/footer.php')
?>
<!-- end footer including -->