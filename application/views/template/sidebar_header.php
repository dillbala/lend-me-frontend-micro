

<?php


?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">

<link href="<?php echo base_url().'assets/css/navbar-fixed-side.css';?>" rel="stylesheet" />


<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>



<div id="wrapper">


    <div>
        <nav class="navbar-default">


            <div class="container-fluid">
                <ul class="nav navbar-left ">
                    <li><a href="" class="icon-bar" id="menu-toggle"><img src="<?php echo base_url().'assets/images/menu.png';?>"></a></li>


                </ul>
                <!---->
                <!--                    <ul class="nav navbar-right ">-->
                <!--                        <li><a href="#" class="text-right">Logout</a></li>-->
                <!---->
                <!--                    </ul>-->

            </div>



        </nav>
    </div>
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <div class="container">
                <ul class="sidebar-nav">

                    <li>
                        <!--                       <img class="image"><div class="container">-->
                        <!--                   -->
                        <!--                           -->
                        <!--                       </div>-->
                    </li>

                </ul>
                <hr>
                <li><a href="<?php echo base_url().'apply';?>"> Apply For Loan</a></li>
                <li><a href="<?php echo base_url().'profile/history';?>"> History </a></li>
                <li><a href="<?php echo base_url().'profile';?>"> Profile</a></li>
                <li><a href="#"> Repayment </a></li>
<!--                <li><a href="--><?php //echo base_url().'apply';?><!--"> Settings</a></li>-->

                <hr>
                <li><a  href="<?php echo base_url() . 'welcome/logout' ?>">Logout</a></li>
            </div>
        </ul>
    </div>
    <div id="page-content-wrapper">

