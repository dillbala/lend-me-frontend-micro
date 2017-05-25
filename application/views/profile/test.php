

<?php


?>
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
                <li><a href="#" class="icon-bar" id="menu-toggle"><img src="<?php echo base_url().'assets/images/menu.png';?>"></a></li>


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
                       <p>Jack Sparrow</p>
<!--                       <img class="image"><div class="container">-->
<!--                   -->
<!--                           -->
<!--                       </div>-->
                   </li>

               </ul>
               <hr>
           <li><a href="#"> Apply For Loan</a></li>
           <li><a href="#"> History </a></li>
               <li><a href="#"> Profile</a></li>
               <li><a href="#"> Repayment </a></li>
               <li><a href="#"> Settings</a></li>

               <hr>
               <li><a href="#"> Logout</a></li>
           </div>
       </ul>
    </div>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="col-lg-12"></div>
            <a href="#" class="btn btn-success" id="menu-toggle">Toggle menu</a>
            <p>Lorel ipsum s;ip skbd . kadshl .jack sparrow
                i s great ith could jabe been eter bit you nver clleds m e.
                i s great ith could jabe been eter bit you nver clleds m e.
                i s great ith could jabe been eter bit you nver clleds m e.
                i s great ith could jabe been eter bit you nver clleds m e.
                i s great ith could jabe been eter bit you nver clleds m e.
            </p>
        </div>
    </div>
</div>


<script>

//    alert($('#menu-toggle').val());
    $("#menu-toggle").click(function (e) {
       e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
    });
</script>
<div class="container-fluid"></div>
