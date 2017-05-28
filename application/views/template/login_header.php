<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LendPaisa | Instant Personal Loan, EazyEMI, Pay Over Time</title>
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url().'assets/images/favicon.ico';?>' />
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <nav class="navbar navbar-default navbar-fixed-side">
                    <!-- normal collapsible navbar markup -->
                </nav>
            </div>
            <div class="col-sm-9 col-lg-10">
                <!-- your page content -->
            </div>
        </div>
    </div>
    <nav class="navbar navbar navbar-fixed-left">
        <div class="container">
            <div id="navbar">
                <ul class="nav navbar-nav" id="navlist">

                    <?php
                    if (array_key_exists('logged_in',$this->session->userdata))
                    {
                        ?>
                        <li><a class="navbar-right" href="<?php echo base_url() . 'profile' ?>">Home</a></li>
                        <li><a class="navbar-right" href="<?php echo base_url() . 'welcome/logout' ?>">Logout</a></li>
                        <?php

                    }
                    else{
                        ?>
                        <h2>Welcome to lend paisa</h2>
                        <?php

                    }
                    ?>


                </ul>
            </div>


        </div>

    </nav>
    <div class="container">
