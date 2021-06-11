<!-- start header including -->
<?php 
include('./dbConnection.php');
include('./mainInclude/header.php');

?>
<!-- end header including -->

<!-- Start course page  banner -->

    <div class="container-fluid bg-dark">
            <div class="row">
                <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow: 10px;">
            </div>
    </div>
    <!-- End course page  banner -->
    <div class="container jumbotron mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-3">If Already Registered  || Login</h5>
                <form action="" role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
                    <small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" id="stuLogEmail"  placeholder="Email" name="stuLogEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                    <small id="statusLogMsg1"></small>
                    <input type="password" class="form-control" id="stuLogPass"  placeholder="Password" name="stuLogPass">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginbtn" onclick="checkStuLogin()">Login</button>
                </form><br/>
                <small id="statusLogMsg"></small>
            </div>

            <!-- new user  -->
            <div class="col-md-6 offset-md-1">
                <h5 class="mb-3">New User !! Sign Up</h5>
                <form action="" role="form" id="stuRegForm">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="stuname" class="pl-2 font-weight-bold">Name</label>
                        <small id="statusMsg1"></small>
                        <input type="text" placeholder="Name" name="stuname" class="form-control" id="stuname">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                        <small id="statusMsg2"></small>
                        <input type="email" placeholder="Email" name="stuemail" class="form-control" id="stuemail">
                        <small class="form-text">We will never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="stupass" class="pl-2 font-weight-bold"> New Password</label>
                        <small id="statusMsg3"></small>
                        <input type="password" placeholder="Email" name="stupass" class="form-control" id="stupass">
                    </div>
                    <button class="btn btn-primary" id="signup" type="button" onclick="addStu()">Sign Up</button>
                </form><br/>
                <nmall id="successMsg"></nmall>
            </div>
        </div>
    </div>
    <hr/>

    <?php 
    // contact us
    include('./contact.php');
    ?>

    <?php include('./mainInclude/footer.php'); ?>