<?php
include 'databaseConnect/init.php';

if(logged_in()){
    header('Location: index.php');
    exit();
}

include 'login-model.php';


if(!empty($_POST['register-submit']) && empty($errors) && empty($errorsAll) && empty($errorsName) && empty($errorsName2) && empty($errorsMail) && empty($errorsPass1) && empty($errorsPass2) ){
    $register_data = array(
        'name' => $_POST['username'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
        );
    register_user($register_data);



    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    $login = login($username, $password);

    setcookie('user_id',$login);
    header('Location: profile.php');
    exit();


}elseif(   !empty($errorsAll) || !empty($errorsName) || !empty($errorsName2) || !empty($errorsMail) || !empty($errorsPass1) || !empty($errorsPass2)  ){
    $regError = 'Register unsuccessful, Please verify your informations.';
}

if(!empty($_POST['recovery-submit']) && !empty($_POST['email']) ){
    if(email_exists($_POST['email'])){
        recover($_POST['email']);
        $recoSuccess = 'Username/Password recovery successful. Please check your email box and log in.';

    }else{
        $errorsMail2 = 'The Email address does not exist in our database';
    }
}
if (!empty($errorsMail2)) {
    $errorRec = 'An error has occured while trying to recover your Username/Password';
}


?>

<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title>Login&Register | MeiyiWuhan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="ico/favicon.png">

	<!-- Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Style Library -->
	<link href="css/mylogin.css" rel="stylesheet">
</head>

<body cz-shortcut-listen="true">
    <div class="container">

        <div class="row">
            <div class="col-md-offset-4 col-md-5">
                 <a class="logo" href="index.php"> <img id="logo" src="./images/logo.png" alt="logo" class="img-responsive"> </a>
            </div>

            <?php if ($regError){?>
                <div class="col-md-offset-3 col-md-6">
                    <p class="error"><?php echo $regError; ?></p>
                </div>
            <?php } ?>


        </div>


        <div class="row">

            <div class="col-md-6 col-md-offset-3">

            <br>
                <div class="panel panel-login">

                    <div class="panel-heading">

                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <?php if ($errors){?>
                                        <div class="form-group">
                                            <p class="error"><?php echo $errors[0]; ?></p>
                                        </div>
                                    <?php } elseif ($errorRec){?>
                                        <div class="form-group">
                                            <p class="error"><?php echo $errorRec;  ?></p>
                                        </div>
                                    <?php } elseif ($recoSuccess){?>
                                        <div class="form-group">
                                            <p class="success"><?php echo $recoSuccess;  ?></p>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href=""  class="forgot-password" data-toggle="modal" data-target="#myModal3" >Forgot Username/Password?</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Recover Username/Password</h4>
                                      </div>
                                      <div class="modal-body">

                                      <form class="form-horizontal" id="change-form" action="login.php" method="post" role="form">

                                          <div class="form-group">
                                            <label for="old_pass" class="col-sm-2 control-label">Email: </label>
                                            <div class="col-sm-10">
                                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
                                              <?php if($errorsMail2) echo "<p style='color: red;'>",$errorsMail2; ?>

                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               <button type="submit" name="recovery-submit" id="recovery-submit"  class="btn btn-success" value="recovery">Recover</button>
                                            </div>
                                          </div>
                                </form>
                                      </div>

                                    </div>
                                  </div>
                                </div>







                                <form id="register-form" action="login.php" method="post" role="form" style="display: none;">
                                    <div class="form-group ">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control " placeholder="User name " value="<?php if($_POST['username']) echo strip_tags($_POST['username']); ?>">
                                        <?php if($errorsName) echo "<p style='color: red;'>",$errorsName; ?>
                                        <?php if($errorsName2) echo "<p style='color: red;'>",$errorsName2; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Address " value="<?php if($_POST['address']) echo strip_tags($_POST['address']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" tabindex="1" class="form-control" placeholder="City" value="<?php if($_POST['city']) echo strip_tags($_POST['city']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Telephone number " value="<?php if($_POST['phone']) echo strip_tags($_POST['phone']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address " value="<?php if($_POST['email']) echo strip_tags($_POST['email']); ?>">
                                        <?php if($errorsMail) echo "<p style='color: red;'>",$errorsMail; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
                                        <?php if($errorsPass1) echo "<p style='color: red;'>",$errorsPass1; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password " >
                                        <?php if($errorsPass2) echo "<p style='color: red;'>",$errorsPass2; ?>
                                    </div>
                                    <?php if ($errorsAll){?>
                                        <div class="form-group">
                                            <p class="error"><?php echo $errorsAll; ?></p>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->






    <!-- Scripts at the end... you know the score! -->
    <!-- Core Scripts (Do not remove) -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="./js/mylogin.js"></script>


</body>

</html>
