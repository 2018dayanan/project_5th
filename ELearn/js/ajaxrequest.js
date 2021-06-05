function addStu(){
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    
    // calling ajax

    $.ajax({
        url:'Student/addstudent.php',
        method:'POST',
        dataType:"json",
        data:{
            stusignup: "stusignup",
            stuname: stuname,
            stuemail: stuemail,
            stupass: stupass,

        },
        success:function(data){
            console.log(data);
            if(data == "OK"){
                $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
            }else if(data == "Failed"){
                $('#successMsg').html("<span class='alert alert-danger'>Registration Failed !</span>");
            }
        },
    });
}

