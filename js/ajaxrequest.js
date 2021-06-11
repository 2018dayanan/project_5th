
$(document).ready(function(){
    // ajax call for already exists email verification
    $("#stuemail").on("keypress blur", function(){
  // var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var stuemail = $("#stuemail").val();
        $.ajax({
          url:  "Student/addstudent.php",
          method: "POST",
          data:{
            checkemail: "checkmail",
            stuemail: stuemail,
          },
          success: function(data){
            // console.log(data);

            if(data != 0){
              $("#statusMsg2").html(
                '<small style="color:red;">Email ID already Used!</small>'
              );
              $("#signup").attr("disabled", true);
            } else if(data == 0 && reg.test(stuemail)){
              $("#statusMsg2").html(
                '<small style="color:green;">Good to go  </small>'
              );
              $("#signup").attr("disabled", false);
            }  else if(!reg.test(stuemail)){
              $("#statusMsg2").html(
                '<small style="color:red;">Please enter valid email e.g. example@gmail.com !</small>'
              );
              $("#signup").attr("disabled", false);
            }
            if(stuemail == ""){
              $("#statusMsg2").html(
                '<small style="color:red;">Please Enter email</small>'
              );
            }
          },
        });
    });
});

    // ajax call for already exists email verification end



function addStu() {
  // var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var stuname = $("#stuname").val();
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();

  // checking form fields on form submission

  if (stuname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color:red;">Please Enter Name</small>'
    );
    $("#stuname").focus();
    return false;
  } else if (stuemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color:red;">Please Enter Email</small>'
    );
    $("#stuemail").focus();
    return false;
  } else if (stuemail.trim() != " " && !reg.test(stuemail)) {
    $("#statusMsg2").html(
      '<small style="color:red;">Please Enter Valid email e.g. example@gmail.com</small>'
    );
    $("#stuemail").focus();
    return false;
  } else if (stupass.trim() == "") {
    $("#statusMsg3").html(
      '<small style="color:red;">Please Enter Password</small>'
    );
    $("#stupass").focus();
    return false;
  } else {
    // calling ajax

    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass,
      },
      success:function(data) {
        console.log(data);
        if (data == "OK") {
          $("#successMsg").html(
            "<span class='alert alert-success'>Registration Successful !</span>"
          );
        //   for successfull register remove all suggestion start
        clearStuRegField();
        //   for successfull register remove all suggestion end

        } else if (data == "Failed") {
          $("#successMsg").html(
            "<span class='alert alert-danger'>Registration Failed !</span>"
          );
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


// Ajax call for student login verification

  function checkStuLogin(){
// console.log("Login clicked");

// capture data
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogPass").val();

  // send data to server call ajax

  $.ajax({
    url: "Student/addstudent.php",
    method: "POST",
    data:{
      checkLogemail: "checkLogmail",
      stuLogEmail: "stuLogEmail",
      stuLogPass: "stuLogPass",

    },
    success: function(data){
      // console.log(data);
      if(data == 0){
        $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email Id or Password !</small>');
      } else if( data == 1){
        $("#statusLogMsg").html('<div class="spinner-border text-success " role="status"></div>');
        setTimeout(()=>{
          window.location.href = "index.php";
        }, 1000);
      };
    },
  });

}