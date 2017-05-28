<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LendPaisa | Instant Personal Loan, EazyEMI, Pay Over Time</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url().'assets/images/favicon.ico';?>' />
<!--    <link href="--><?php //echo base_url().'assets/css/navbar-fixed-side.css';?><!--" rel="stylesheet" />-->
<!--<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">-->


    <style>


        #navlist li a:hover{
            background-color: white;
        }
        #navlist li a{
            background-color: white;
        }
    </style>

<nav class="navbar navbar-default">
    <div class="container">
        <div id="navbar">
            <ul class="nav row " id="navlist">

                <?php
                if (array_key_exists('logged_in',$this->session->userdata))
                {
                    if($this->session->userdata['status']==0)
                    {

                    }
                    else {


                        ?>
                        <li><a class="left" href="<?php echo base_url() . 'profile' ?>">Home</a></li>
                        <li><a class="right" href="<?php echo base_url() . 'welcome/logout' ?>">Logout</a></li>
                        <?php
                    }

                }
                else{
                    ?>
<!--                    <div class="row">-->
                    <li class="col-sm-5"></li>
                    <li class="col-sm-4 " ><a href="<?php echo base_url().'welcome/login';?>"><img height="30px" src="<?php echo base_url().'assets/images/logo.png'?>"></a></li>
<!--                    <li><a class="navbar-right" href="--><?php //echo base_url() . 'home/' ?><!--">Home</a></li>-->
<!--                    </div>-->
                        <?php

                }
                ?>


            </ul>
        </div>


    </div>

</nav>
<div class="container">
