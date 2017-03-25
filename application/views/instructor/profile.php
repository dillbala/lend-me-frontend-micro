<?php
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets/js/scripts.js';?>"></script>

<?php
if(!empty($authUrl)) {

    ?>
    <head>
    <body background="<?php echo base_url().'assets/images/main.jpg';?>"></body>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css';?>"
    </head>


    <?php
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/gsign.png" height="50" alt="" /></a>';
}
else{
    if ($userData['status']==0)
    {
        ?> <p>You are not registered with the database please contact admin</p><?php
        echo '<p><b><a href="'.base_url().'dashboard/logout">Logout</a></b></p>';

    }
    else
    {



        ?>

            <?php $this->load->view('template/header');?>
            <div class="container pull-right">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <img src="<?php echo $this->session->userData['picture_url'];?>" alt="" class="img-rounded img-responsive" />
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h4>
                                        <?php echo $this->session->userData['name']?></h4>
                                    <i class="glyphicon glyphicon-gift"></i><?php echo $this->session->userData['employee_id'];?>
                                    <br>
                                    <small><cite ><?php echo $this->session->userData['position'];?>,&nbsp<?php echo $this->session->userData['team'];?>
                                            </i></cite></small>
                                    <p>
                                        <?php echo $this->session->userData['email']?>
                                        <br />
                                        <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





    <?php
    }
} ?>