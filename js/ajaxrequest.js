function addStu(){
    var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // var reg = /^[a-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    
    console.log(stuname);
    console.log(stuemail);
    console.log(stupass);

    if(stuname.trim() == ""){
        $("#statusMsg1").html('<small style="color:red;">Please enter Name !</small>');
        $("#statusMsg3").html('<small style="color:red;">Please enter Password !</small>');

        $("#stuname").focus();
        return false;
    }else if(stuemail.trim() == ""){
        $("#statusMsg2").html('<small style="color:red;">Please enter Email !</small>');
        $("#stuemail").focus();
        return false;
    }else if(stuemail.trim() !== "" && !reg.test(stuemail)){
        $("#statusMsg2").html('<small style="color:red;">Please Enter Valid Email !</small>e.g. example@gmail.com');
        $("#stuemail").focus();
        return false;
    }else if(stupass.trim() == ""){
        $("#statusMsg3").html('<small style="color:red;">Please enter Password !</small>');
        $("#stupass").focus();
        return false;
    }else { 
        // calling ajax
    
        $.ajax({
            url:'Student/addstudent.php',
            method:'POST',
            dataType: "json",
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
                    clearStuRegField();
                }else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-danger'>Registration Failed !</span>");
                }
            },
        });

    }

}

// empty all fields

function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#successMsg1").html(" ");
    $("#successMsg2").html(" ");
    $("#successMsg3").html(" ");

}

