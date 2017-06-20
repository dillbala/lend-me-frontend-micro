
<?php
echo validation_errors();
?>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>


    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
    .model-body{
        margin-top: 50px;
    }
    .modal-header{
        position: absolute;
        background-color: #F9A746;
        top: -22px;
        left: 50%;
        margin-left: -50px;
        border: 15px solid #fff;
        border-radius: 100%;
        color: #fff;
        font: normal normal normal 32px/70px FontAwesome;
        width: 100px;
        height: 100px;
        transition: all 0.5s;
    }

    /*.common-container{
    height: 200px;
    background-color: #138808;
    transition: all 0.5s;
    }*/
    .btn-default, .btn-default:hover, .btn-default:focus{
        background:#F9A746;
    }
    .modal-title{
        margin: 5px 0px 0px 10px; 
    }
    .form-control{
        height:50px;
    }
    .modal-body{
        margin-top: 60px;
    }
    .text-center{
        margin-top: 20px;
    }
</style>
    <div id="login-overlay" class="modal-dialog center-block">
        <div class="modal-content">
            <div class="modal-header">
               <!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <div class="modal-title" id="myModalLabel"><i class="fa fa-lock headerLockIcon"></i></div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <?php echo form_open('welcome/login');?>
                            <?php if(!empty($error)){?>
                                <div class="alert-danger"><?php echo $error;?></div>
                            <?php }?>
                                <div class="form-group">
                                    <!-- <label for="mobile" class="control-label">Mobile</label> -->
                                    <label class="sr-only" for="password">Mobile</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="" required="" title="Please enter you mobile" placeholder="Mobile">
                                    <div class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true" style="font-size:30px"></i></div>
                                </div>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="password" class="control-label">Password</label> -->
                                    <label class="sr-only" for="password">Password</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="password">
                                    <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true" ></i></div>
                                </div>
                                    <span class="help-block"></span>
                                </div>
                                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
<!--                                <div class="checkbox">-->
<!--                                    <label>-->
<!--                                        <input type="checkbox" name="remember" id="remember"> Remember login-->
<!--                                    </label>-->
<!--                                    <p class="help-block">(if this is a private computer)</p>-->
<!--                                </div>-->
                                <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                                <a href="<?php echo base_url().'welcome/signup';?>" class="btn btn-default btn-block btn-lg">Sign Up. it's free and always will be</a>
                               
                                <div class="text-center">
                                <a href="/forgot/">Did you forget your password?</a></div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-6">
                        <p class="lead">Register now for <span class="text-success">FREE</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> Instant money</li>
                            <li><span class="fa fa-check text-success"></span> Repay over time</li>
                            <li><span class="fa fa-check text-success"></span> Two minute checkout</li>
                            <li><span class="fa fa-check text-success"></span> College students</li>
                            <li><span class="fa fa-check text-success"></span> Salaried employees </li>
                            <li><a href="/home/"><u>Read more</u></a></li>
                        </ul>
                        <p><a href="<?php echo base_url().'welcome/signup';?>" class="btn btn-info btn-block">Yes please, Signup now!</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
