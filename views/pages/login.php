<?php
include("views/layouts/login/login_header_library.php");
?>

<?php
include("views/layouts/common/site_header.php");
?>

<?php

  if(isset($_POST["btnLogin"])){   
   //print_r($_POST);
   $username=$_POST["txtEmail"];
   $password=$_POST["pwdPassword"];
   $customer=Customer::auth($username,$password);

   if(isset($customer->id)){

      $_SESSION["s_id"]= $customer->id;
      $_SESSION["s_name"]= $customer->name;

      $names=explode(' ',$customer->name);
      
      $_SESSION["s_first_name"]= $names[0];

      $second_name=isset($names[1])?$names[1]:'';
      $third_name=isset($names[2])?$names[2]:'';
      $forth_name=isset($names[3])?$names[3]:'';

      $_SESSION["s_last_name"]= $second_name.' '.$third_name.' '.$forth_name;

      $_SESSION["s_mobile"]= $customer->mobile;
      $_SESSION["s_email"]= $customer->email;
      $_SESSION["s_city"]= $customer->city;
      $_SESSION["s_postcode"]= $customer->postcode;
      $_SESSION["s_street_address"]= $customer->street_address;
      $_SESSION["s_apartment"]= $customer->apartment;
      $_SESSION["s_country_id"]= $customer->country_id;
     
      //echo "<script>window.location='$base_url'</script>";

   }else{
      echo "Failed to login";
   }
   


  }

?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>

<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="login" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email/Mobile/ID*</label>
                                <input class="mb-0" name="txtEmail" type="text" placeholder="Email/Mobile/ID">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" name="pwdPassword" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <input class="register-button mt-0" value="Login" type="submit" name="btnLogin">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="login" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <input class="register-button mt-0" value="Register" name="btnRegister" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("views/layouts/common/site_footer.php");
?>
<?php
include("views/layouts/login/login_footer_library.php")
?>