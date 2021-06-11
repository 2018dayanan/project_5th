
<!-- start footer -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2021 || Designed by E-Learn|| <a href="#login"  class="admin-link" data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a> </small>
</footer>
<!-- end footer -->

<!-- start student  registration form model -->
<!-- Button trigger modal -->


<!-- Modal -->
        <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php include('studentRegistration.php'); ?>

            </div>
            <div class="modal-footer">
            <span id="successMsg">
            
            </span>
                <!-- <input type="submit" class="btn btn-primary btnRegister" onclick="addStu()" id="stuRegbtn" value="submit"> -->
                <button  class="btn btn-primary" onclick="addStu()" id="stuRegbtn" value="submit">Sign Up</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
            </div>
            </div>
        </div>
        </div>

<!-- end student registration form model -->

<!-- start student  login form model -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuLoginModalCenterLabel">User Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- student login form -->
            <form id="stuLoginForm">
                
                <div class="form-group">
                <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                    <input type="text" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="Email">
                    
                </div>
                <div class="form-group">
                <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold"> Password</label>
                    <input type="password" class="form-control" id="stuLogpass" name="stupass" placeholder="Password">
                </div>
                
                
                </form>
                <!-- end student login form -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  id="stuLoginbtn">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>

<!-- end student login form model -->

<!-- start Admin  login form model -->

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="stuAdminModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- student login form -->
            <form id="adminLoginForm">
                
                <div class="form-group">
                <i class="fas fa-envelope"></i><label for="adminLoginmail" class="pl-2 font-weight-bold">Email</label>
                    <input type="text" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="Email">
                    
                </div>
                <div class="form-group">
                <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold"> Password</label>
                    <input type="password" class="form-control" id="adminLogpass" name="adminLogpass" placeholder="Password">
                </div>
                
                
                </form>
                <!-- end student login form -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  id="stuLoginbtn">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
         </div>
        </div>

<!-- end student login form model -->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!-- fontawesome start -->
    <script src="js/all.min.js"></script>
    <!-- student testimonial start -->
    <!-- <script type="text/javascript" src="js/owl.carousel.min.js"></script> -->
  
    <!-- student testimonial end -->

    <!-- student ajax call javaScript  start -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
    <!-- end ajax -->

</body>
</html>