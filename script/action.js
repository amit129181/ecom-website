$(document).ready(function () {
  $("#loginUser").submit(function (e) {
    e.preventDefault();
    var username = $(".username").val();
    var password = $(".password").val();
    console.log(username);
    console.log(password);
    $.ajax({
      url: "user/cartUserLogin.php",
      method: "POST",
      data: { login: "1", username: username, password: password },
      dataType: "json",
      success: function (response) {
        $(".alert").hide();
        // console.log(response);
        var res = response;
        if (res.hasOwnProperty("success")) {
          $("#userLogin_form .modal-body").append(
            '<div class="alert alert-success">LoggedIn Successfully.</div>'
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else if (res.hasOwnProperty("error")) {
          $("#userLogin_form .modal-body").append(
            '<div class="alert alert-danger">' + res.error + "</div>"
          );
        }
      },
    });
  });

  $("#changePassword2").submit(function (e) {
    e.preventDefault();
    var oldpassword = $(".oldpass").val();
    var newpassword1 = $(".newPass1").val();
    var newpassword2 = $(".newPass2").val();
    $.ajax({
      url: "user/changepass.php",
      method: "POST",
      data: { pass: oldpassword, pass1: newpassword1, pass2: newpassword2 },
      dataType: "json",
      success: function (response) {
        $(".alert").hide();
        // console.log("response");
        var res = response;
        if (res.hasOwnProperty("success")) {
          $(".changePasswordForm").append(
            '<div class="alert alert-success mt-3">Password changed succesfully.</div>'
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else if (res.hasOwnProperty("error")) {
          $(".changePasswordForm").append(
            '<div class="alert alert-danger mt-3">' + res.error + "</div>"
          );
        }
      },
    });
  });

  $("#registrationForm").submit(function (e) {
    e.preventDefault();
    var customername = $(".username").val();
    var customeremail = $(".email").val();
    var address = $(".address").val();
    var mobile = $(".phone").val();
    var newpassword3 = $(".password3").val();
    var newpassword4 = $(".password4").val();
    $.ajax({
      url: "user/userRegister.php",
      method: "POST",
      data: {
        cusname: customername,
        cusmail: customeremail,
        cussaddress: address,
        cussmob: mobile,
        pass3: newpassword3,
        pass4: newpassword4,
      },
      dataType: "json",
      success: function (response) {
        $(".alert").hide();
        // console.log("response");
        var res = response;
        if (res.hasOwnProperty("success")) {
          $(".registrationFormDiv").append(
            '<div class="alert alert-success mt-3">Password changed succesfully.</div>'
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else if (res.hasOwnProperty("error")) {
          $(".registrationFormDiv").append(
            '<div class="alert alert-danger mt-3">' + res.error + "</div>"
          );
        }
      },
    });
  });

  $("#traderLogin").submit(function (e) {
    e.preventDefault();
    var email = $(".email").val();
    var fpassword = $(".password").val();
    console.log(email);
    $.ajax({
      url: "trader/traderLogin.php",
      method: "POST",
      data: { login: 1, username: email, password: fpassword },
      dataType: "json",
      success: function (response) {
        $(".alert").hide();
        // console.log("response");
        var res = response;
        if (res.hasOwnProperty("success")) {
          $(".background-img .form-control").append(
            '<div class="alert alert-success mt-3">Password login succesfully.</div>'
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
          window.location.href = "index.php";
        } else if (res.hasOwnProperty("error")) {
          $(".background-img .form-control").append(
            '<div class="alert alert-danger mt-3">' + res.error + "</div>"
          );
        }
      },
    });
  });
});
