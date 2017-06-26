
<?php
echo validation_errors();
?>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
    .modal-dialog{
        width: 100%;
    }
    .modal-content{
        border:none;
        box-shadow:none;
    }
    .signup-info{
        padding: 40px 50px;
    }
    .lead{
        font-size: 35px;
    }
    .signup-info ul li{
        font-size: 20px;
     }
    .text-success{
        font-size: 20px;
    }
    .btn-success{
        background: #138808;
    }
    .lendwell{
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }
     .lastname{
        visibility: hidden;
     }
     .field-firstname-2{
        display: none;
     }
    @media screen and (max-width: 768px) and (min-width: 320px){
     .signup-info{
        display: none;
     }
     .lendwell{
        min-height: 20px;
        padding: 0px;
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid #fff;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
     }
     .lastname{
        visibility: visible;
     }
     .container{
        padding-left: 0px;
        padding-right: 0px;
     }
     .col-sm-6, .col-sm-12{
        padding-left: 2px;
        padding-right: 2px;
     }
     .field-firstname,.field-lastname{
        padding-left: 15px;
        padding-right: 15px;
     }
    .navbar{
        margin-bottom: 0px;
    }
    .field-firstname-2{
        display: block;
    }
    .field-firstname-1{
        display: none;
    }
    }
</style>
<div id="login-overlay" class="signup-page">
<div class="col-md-6 col-sm-12 signup-info">
    <p class="lead">Register now for <span class="text-success"> FREE</span></p>
    <ul class="list-unstyled" style="line-height: 2">
    <li><span class="fa fa-check text-success"></span> Instant money</li>
    <li><span class="fa fa-check text-success"></span> Repay over time</li>
    <li><span class="fa fa-check text-success"></span> Two minute checkout</li>
    <li><span class="fa fa-check text-success"></span> College students</li>
    <li><span class="fa fa-check text-success"></span> Salaried employees </li>
    <!-- <li><a href="/home/"><u>Read more</u></a></li> -->
    </ul>
    <!-- <p><a href="<?php echo base_url().'welcome/signup';?>" class="btn btn-info btn-block">Yes please, Signup now!</a></p> -->
</div>
<div class="col-md-6 col-sm-12">
<div class="modal-dialog center-block">
    <div class="modal-content">
        <div class="modal-header">
<!--            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
            <div class="row modal-title ">
                <div class="col-xs-9">
                    <h4 style="color:#138808">Signup</h4>
                </div>
                <div class="col-xs-3">
                    <a href="<?php echo base_url().'welcome/login';?>"> <div class="btn btn-primary">Login</div></a>
                </div>
            </div>
<!--            <h4 class="modal-title" id="myModalLabel">Signup </h4>-->
<!--            <h4 class="modal-title " >Login </h4>-->
        </div>
        <div class="modal-body">
            <div class="row">
                <!-- <div class="col-xs-2"></div> -->
                <div class="col-xs-12">
                    <div>
                        <?php echo form_open('welcome/signup');?>
                        <?php if(!empty($error)){?>
                            <div class="alert-danger"><?php echo $error;?></div>
                        <?php }?>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12 field-firstname">
                                <label for="firstName" class="control-label field-firstname-1">Name</label>
                                <label for="firstName" class="control-label field-firstname-2">First Name</label>
                                <input type="text" class="form-control" id="firstName" maxlength="30" name="firstName" value="<?php echo set_value('firstName');?>" required="" title="Please enter you first name" placeholder="First Name">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12 field-lastname">
                                <label class="lastname" for="lastName" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" maxlength="30" value="<?php echo set_value('lastName');?>" required="" title="Please enter you last name" placeholder="Last Name">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="control-label">Gender</label>
                            <select class="form-control" id ="gender" name="gender" value="" title="Please choose your gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="help-block"></span>
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
                            <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password">
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

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

