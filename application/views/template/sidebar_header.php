

<?php


?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url().'assets/css/navbar-fixed-side.css';?>" rel="stylesheet" />
<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url().'assets/images/favicon.ico';?>' />
<title>LendPaisa | Instant Personal Loan, EazyEMI, Pay Over Time</title>

<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>

<style>
    .sidebar-nav li {
        margin-left: -23px;
    }
#wrapper.menuDisplayed #sidebar-wrapper {
    width: 195px;
}
   #navlist li a:hover{
        background-color: white;
    }
    #navlist li a{
        background-color: white;
    }
</style>

<div id="wrapper">


    <div>
        <nav class="navbar-default">


            <div class="container-fluid">
                <ul class="nav row " id="navlist">
                    <li class="col-sm-4"><a href="" class="icon-bar" id="menu-toggle"><img src="<?php echo base_url().'assets/images/menu.png';?>"></a></li>
                    <li class="col-sm-1"></li>
                    <li class="col-sm-4 " ><a href="<?php echo base_url().'welcome/login';?>"><img height="30px" src="<?php echo base_url().'assets/images/logo.png'?>"></a></li>

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
                <li><a href="<?php echo base_url().'apply';?>"><i class="fa fa-university" aria-hidden="true"></i> Apply For Loan</a></li>
                <li><a href="<?php echo base_url().'profile/history';?>"><i class="fa fa-history" aria-hidden="true"></i> History </a></li>
                <li><a href="<?php echo base_url().'profile';?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i> Repayment </a></li>
<!--                <li><a href="--><?php //echo base_url().'apply';?><!--"> Settings</a></li>-->
                <li><a  href="<?php echo base_url() . 'welcome/logout' ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </div>
        </ul>
    </div>
    <div id="page-content-wrapper">

