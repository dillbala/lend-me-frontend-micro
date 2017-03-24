

    <?php

    if ($this->session->userdata['status']==0)
    {
        ?>
        <h1> Hi <?php echo $this->session->userdata['firstName'];?></h1>
        <p>You have not verified your email yet. Please check your email and paste the code below.</p>
        <?php
        ?>


    <form method="post" action="<?php echo base_url().'welcome/verify'?>">
        <?php
//        echo "<pre>"; print_r($this->session->userData);

        ?>
        <input type="hidden" value="<?php echo $this->session->userdata['userId']; ?>">
        <div class="form-inline">
<!--            <label>Code</label>-->
<!--            <br>-->
        <input type="text" name="code" class="form-control" placeholder="CODE">
        </div>
        <br>
        <button class="btn btn-primary btn-small">Submit</button>
    </form>
        <p><a href="<?php echo base_url().'welcome/resend/'.$this->session->userdata['userId']?>">Resend Code</a></p>

        <?php
        if (!empty($message))
        {
            echo $message;
        }

    }
    else
    {



        ?>

        <div class="container pull-right">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="<?php echo base_url().'assets/images/user_profile.png'?>" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                <?php echo $this->session->userdata['firstName']?></h4>
                            <?php echo $this->session->userdata['lastName'];?>
                            <br>
                            <small><cite ><?php echo $this->session->userdata['address'];?>,&nbsp<?php echo $this->session->userdata['nationality'];?>
                                    </i></cite></small>
                            <p>
                                <?php echo $this->session->userdata['email']?>
                                <br />
                                <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <?php
    } ?>