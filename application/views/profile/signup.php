
<?php
echo validation_errors();
?>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div id="login-overlay" class="modal-dialog center-block">
    <div class="modal-content">
        <div class="modal-header">
<!--            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
            <div class=" modal-title row">
                <div class="col-xs-4"><h4>Signup</h4> </div>
                <div class="col-xs-6"><h4></h4></div>
                <a href="<?php echo base_url().'welcome/login';?>"> <div class="col-xs-2 btn btn-primary">Login</div></a>
            </div>
<!--            <h4 class="modal-title" id="myModalLabel">Signup </h4>-->
<!--            <h4 class="modal-title " >Login </h4>-->
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8">
                    <div class="well">
                        <?php echo form_open('welcome/signup');?>
                        <?php if(!empty($error)){?>
                            <div class="alert-danger"><?php echo $error;?></div>
                        <?php }?>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="firstName" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" maxlength="30" name="firstName" value="<?php echo set_value('firstName');?>" required="" title="Please enter you first name" placeholder="First Name">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="lastName" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" maxlength="30" value="<?php echo set_value('lastName');?>" required="" title="Please enter you last name" placeholder="Last Name">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="control-label">Mobile</label>
                            <input type="text" pattern="[56789][0-9]{9}" class="form-control" id="mobile" name="mobile"  value="<?php echo set_value('mobile');?>" required="" title="Please enter you mobile" placeholder="">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" required="" title="Please enter you email" placeholder="Email address">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value=" " required="" title="Please enter your password" placeholder="Password">
                            <span class="help-block"></span>
                        </div>

                        <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="dob" class="control-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob');?>" required="" title="Please enter you date of birth" placeholder="Date of Birth">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="role" class="control-label">Profession</label>
                            <select class="form-control" id ="role" name="role" value="" title="Please choose your profession">
                                <option value="3">Salaried Employee</option>
                                <option value="4">Student</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                        <a href="/forgot/" class="btn btn-default btn-block">Forgot Password</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>








<!---->
<!--<h2>--><?php //echo $title;?><!--<a class="pull-right" href="--><?php //echo base_url().''?><!--">Login </a></h2>-->
<?php
//echo validation_errors();
//?>
<!--<script  type="text/javascript">-->
<!--    function confirmPassword() {-->
<!---->
<!--        console.log("I am called");-->
<!--        var pass1 = document.getElementById("password").value;-->
<!--        var pass2 = document.getElementById("confirmPassword").value;-->
<!--        console.log(pass1);-->
<!--        console.log(pass2);-->
<!--        var ok = true;-->
<!--        if (pass1 != pass2) {-->
<!--            alert("Passwords Do not match");-->
<!--            document.getElementById("password").style.borderColor = "#E34234";-->
<!--            document.getElementById("confirmPassword").style.borderColor = "#E34234";-->
<!--            ok = false;-->
<!--        }-->
<!--        else {-->
<!--            alert("Passwords Match!!!");-->
<!--            document.getElementById("regForm").submit();-->
<!--        }-->
<!--        return ok;-->
<!--    }-->
<!--</script>-->
<!--<form id = "regForm" action="signup" method="post">-->
<!--<div class="form-group">-->
<!--    <label>First name</label>-->
<!--    <input required type="text" class="form-control" name="firstName" value="--><?php //echo set_value('firstName');?><!--" placeholder="first name">-->
<!--    <label>Last Name</label>-->
<!--    <input required type="text" class="form-control" name="lastName" value="--><?php //echo set_value('lastName');?><!--" placeholder="last name">-->
<!--    <label>Dob</label>-->
<!--    <input required type="date" class="form-control" name="dob" value="--><?php //echo set_value('dob');?><!--" placeholder="dob">-->
<!--    <label>Mobile</label>-->
<!--    <input required type="text" class="form-control" name="mobile" value="--><?php //echo set_value('mobile');?><!--" placeholder="Mobile">-->
<!--    <label>email</label>-->
<!--    <input required type="text" class="form-control" name="email" value="--><?php //echo set_value('email');?><!--" placeholder="email">-->
<!--    <label>Password</label>-->
<!--    <input required type="password" class="form-control" id = "password" name="password" value="--><?php //echo set_value('password');?><!--" placeholder="password">-->
<!--<!--    <label>Confirm password</label>-->-->
<!--<!--    <input required type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="-->--><?php ////echo set_value('confirmPassword');?><!--<!--" placeholder="Confirm Password">-->-->
<!--</div>-->
<?php //if(!empty($error)){?>
<!--    <br>-->
<!--    <div class="alert-danger">--><?php //echo $error;?><!--</div>-->
<!--    <br>-->
<?php //}?>
<!---->
<!--    <button type="submit" class="btn btn-default" onclick="confirmPassword()">submit</button>-->
<!--<!--    <input type="submit" value="Submit" onsubmit="confirmPassword()">-->-->
<!---->
<!---->
<!--    <!--<button type="submit" class="btn btn-default">submit</button>-->-->
<!--</form>-->
