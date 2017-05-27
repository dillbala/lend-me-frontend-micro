
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
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h4 class="modal-title" id="myModalLabel">Login to Lendpaisa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <?php echo form_open('');?>
                            <?php if(!empty($error)){?>
                                <div class="alert-danger"><?php echo $error;?></div>
                            <?php }?>
                                <div class="form-group">
                                    <label for="mobile" class="control-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="" required="" title="Please enter you mobile" placeholder="<?php echo set_value('mobile');?>">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> Remember login
                                    </label>
                                    <p class="help-block">(if this is a private computer)</p>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="/forgot/" class="btn btn-default btn-block">Forgot Password</a>

                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Register now for <span class="text-success">FREE</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> Instant money</li>
                            <li><span class="fa fa-check text-success"></span> Repay over time</li>
                            <li><span class="fa fa-check text-success"></span> Two minute checkout</li>
                            <li><span class="fa fa-check text-success"></span> College students</li>
                            <li><span class="fa fa-check text-success"></span> Salaried employees </li>
                            <li><a href="/home/"><u>Read more</u></a></li>
                        </ul>
                        <p><a href="welcome/signup/" class="btn btn-info btn-block">Yes please, Signup now!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--<script>-->
<!--    $( document ).ready(function() {-->
<!--        $('#login').click();-->
<!--    });-->
<!---->
<!--</script>-->

<!---->
<?php //echo form_open('');?>
<!---->
<!---->
<!---->
<!--    <div id="loginModal" class="modal fade" role="dialog">-->
<!--        <div class="modal-dialog">-->
<!--                <div class="form-group">-->
<!--                            <div class="row">-->
<!---->
<!--                                        <div class="col-sm-4">-->
<!--                                                <label>mobile</label>-->
<!--                                                <input required type="text" class="form-control" name="mobile" value="--><?php //echo set_value('mobile');?><!--" placeholder="mobile">-->
<!--                                                <label>Password</label>-->
<!--                                                <input required type="password" class="form-control" name="password" value="--><?php //echo set_value('password');?><!--" placeholder="password">-->
<!---->
<!--                                        </div>-->
<!--                            </div>-->
<!--                </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //if(!empty($error)){?>
<!--<div class="alert-danger">--><?php //echo $error;?><!--</div>-->
<?php //}?>
<!--<button type="submit" class="btn btn-default">submit</button>  <a type="submit" class="pull-right">Forgot Password</a>-->
<!---->
<!--</form>-->
<!--    <hr>-->
<!--    <a class="btn btn-primary btn-small pull-left" href="--><?php //echo base_url().'welcome/signup'?><!--">Signup </a>-->
<!--</div>-->
<!---->
<!---->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal" >open modal</button>-->
<!---->
