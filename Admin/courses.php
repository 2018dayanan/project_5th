
<?php
    if(!isset($_SESSION)){
        session_start();
    // }else{
    //     session_destroy();
    }

include("./admininclude/header.php");
include('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}

?>


<div class="col-sm-9 mt-5">
    <!-- table -->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
       <?php while($row= $result->fetch_assoc()){ 
           echo '<tr>';
               echo '<th scope="row">'.$row['course_id'].'</th>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td> '.$row['course_author'].'</td>';
                echo '<td>';
                   echo '
                   <form action="editcourse.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["course_id"].' >
                   <button type="submit" value="View" name="view" class="btn btn-info mr-3"><i class="fas fa-pen"></i></button>
                   </form>
                   <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["course_id"].' >
                    <button type="submit" value="Delete" name="delete" class="btn btn-secondary "><i class="far fa-trash-alt"></i></button>
                   </form>
                </td>
            </tr>';
         } ?>
        </tbody>
    </table>
   <?php }else{
        echo "0 Results";
   }
   
//   for delete
if(isset($_REQUEST['delete'])){
    $sql   = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
    // executing query
    if($conn-> query($sql) == TRUE){
        echo '<meta http-equiv = "refresh" content="0;URL=?deleted" />';
    } else{
        echo "Unable to Delete Data";
    }
} 
   
   
   ?>
</div>
</div>
<!-- div row close from header -->

<div>
    <a href="./addCourse.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>
<!-- div container fluid close from header -->



<?php include('./admininclude/footer.php') ?>

