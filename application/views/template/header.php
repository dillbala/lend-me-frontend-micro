<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mentor</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<!--<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">-->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div id="navbar">
            <ul class="nav navbar-nav">

                <?php
                if (array_key_exists('logged_in',$this->session->userdata))
                {
                    if($this->session->userdata['status']==1) {
                        ?>
                        <li><a class="" href="<?php echo base_url() . '' ?>">Profile</a></li>
                        <?php
                        if ($this->session->userdata['role'] == 3) {

                            ?>

                            <li><a class="" href="<?php echo base_url() . 'instructor/' ?>">Instructors</a></li>
                            <li><a class="" href="#">Classes</a></li>
                            <!--                        <li><a class="" href="--><?php //echo base_url().'Classes/'
                            ?><!--">Classes</a></li>-->
                            <?php
                        } else if ($this->session->userdata['role'] == 2) {
                            ?>
                            <li><a class="" href="#">Class requests</a></li>
                            <li><a class="" href="#">My Calendar</a></li>

                            <?php
                        } else if ($this->session->userdata['role'] == 0 || $this->session->userdata['role'] == 1) {
                            ?>
                            <li><a class="" href="<?php echo base_url() . 'instructor/' ?>">Instructors</a></li>
                            <?php
                        }
                        ?>

                        <li><a class="navbar-right" href="<?php echo base_url() . 'welcome/logout' ?>">Logout</a></li>
                        <?php

                    }
                    else{
                        ?>
                        <li><a class="navbar-right" href="<?php echo base_url() . 'welcome/logout' ?>">Logout</a></li>
                        <?php
                    }
                }
                else{
                    ?>
                        <h2>Welcome to Mentor</h2>
                    <?php

                }
                ?>


            </ul>
        </div>


    </div>

</nav>
<div class="container">
