
<style type="text/css">
    .model-body p{
        font-size: 12px;
    }
    .content-footer{
        border-top: 1px solid #ccc;
        margin-top: 10px;
        text-align: right;
    }
    .model-body {
    padding: 30px;
}
.btn{
    border-radius: 0px;
    margin-left: 5px;
    margin-top: 15px;
}
.page-content{
    position: relative;
    background: #fff;
    border-radius: 4px;
    padding: 0px 20px 90px 20px;
    border: 1px solid #ccc;
}
.modal-header{
    padding: 0px;
}
.full-width{
    padding: 20px;
}
#page-content-wrapper{
    padding: 0px;
  -webkit-box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
-moz-box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
background: #fff;
height: 210px;
}
.profile-content img{
    height:180px;
    width: 180px;
}
.profile-campus{
    background: rgb(155,155,155);
    padding: 25px 20px 10px 20px;
    margin-top: 30px;
    color:#fff;
    text-align: center;
}
.profile-campus h3{
    padding: 0px;
    margin: 0px;
}
.profile-detail{
    margin-top: 30px;
}
.profile-image{
    margin-left: 40px;
}
.lower-profile-content {
    padding: 10px 150px 10px 175px;
}
.list-grid{
    background: #fff;
    border-radius: 5px;
    -webkit-box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
    -moz-box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
    box-shadow: 0px 0px 3px 1px rgba(218,219,215,1);
    padding: 20px;
}
        @media screen and (max-width: 768px) and (min-width: 320px){
           .profile-detail {
             padding-left: 0px;
            }
            .profile-campus{
                margin-top: 5px;
            }
        }
</style>
    <?php

    if ($this->session->userdata['status']==0)
    {
        ?>
        <div class="modal-dialog center-block">
        <div class="page-content">
            <div class="modal-header">
                <div class="modal-title">
        <h3> Hi <?php echo $this->session->userdata['firstName'];?></h3>
        </div>
        </div>
        <div class="model-body">
        <div class="col-md-12">
        <p>You have not verified your account yet. Please check your messages and paste the code below.</p>
        </div>
        <?php

        ?>


    <form method="post" action="<?php echo base_url().'welcome/verify'?>">
        <?php
//        echo "<pre>"; print_r($this->session->userData);

        ?>
        <input type="hidden" value="<?php echo $this->session->userdata['userId']; ?>">
        <div class="col-md-12">
        <div class="form-inline">
<!--            <label>Code</label>-->
<!--            <br>-->
        <input type="text" name="code" class="col-md-9" placeholder="Enter your code here...">
        </div></div></div>
        
        <div class="content-footer col-md-12">
        <button class="btn btn-success btn-xs">Submit</button><a href="<?php echo base_url().'welcome/resend/'.$this->session->userdata['userId']?>" class="btn btn-warning btn-xs">Resend Code</a>
        </div>
    </form>
       </div></div></div>

        <?php
        if (!empty($message))
        {
            echo $message;
        }

    }
    elseif ($this->session->userdata['status']==3)
    {
        ?>
        <h1> Hi <?php echo $this->session->userdata['firstName'];?></h1>
        <p>Your account has been disabled by supervisor. Please contact him for further actions.</p>
        <?php

    }
    else
    {



        ?>

<!--    <div class="container-fluid pull-right">-->
        <div class="full-width">
        <div class="row">
              <div class="profile-content">
                        <div class="profile-image col-xs-5 col-sm-5 col-md-2">

                            <?php if (!empty($this->session->userdata['profile_pic']))
                                {

                                    $file = $this->service_model->apiServer.'/static/'.$this->session->userdata['profile_pic'];

                                }
                                else{
                                    $file = base_url().'assets/images/user_profile.png';
                                }
                                ?>
                           <img src="<?php echo $file ?>"  alt="" class="img-circle img-responsive">
                        </div>

                        <div class="col-xs-7 col-sm-7 col-md-3 profile-detail">
                            <h4>
                                <?php echo $this->session->userdata['firstName']?></h4>
                            <?php echo $this->session->userdata['lastName'];?>
                            <br>
                            <small><cite ><?php echo $this->session->userdata['mobile'];?>
                                    </cite></small>
                            <p>
                                <?php echo $this->session->userdata['email']?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 profile-campus">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3><span>&#8377</span>0</h3>
                                    <p>Available balance</p>
                                </div>
                                <div class="col-md-4">
                                    <h3><span>&#8377</span>0</h3>
                                    <p>Credit Limit</p>
                                </div>
                                <div class="col-md-4">
                                    <h3><span>&#8377</span>0</h3>
                                    <p>Cashback</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="container">
            <div class="lower-profile-content">
                <p>Hi <?php echo $this->session->userdata['firstName']?> <?php echo $this->session->userdata['lastName'];?>,</p>
                <p>We are a very young company and we are still calibrating our analysis models, testing behaviors of use and payments of customers with different profiles. We regret the inconvenience caused!</p>
                <div class="list-grid col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://placehold.it/200X100/#ccc">
                        </div>
                        <div class="col-md-5">
                            <h3>WAITLISTED!</h3>
                            <p><a href="#">More Help</a></p>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="btn btn-success btn-md">Apply</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>




        <?php
    } ?>