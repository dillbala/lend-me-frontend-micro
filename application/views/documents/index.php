<h2 class="text-center text-primary">Documents<a <?php if ($this->session->userdata['role']!=0 && $this->session->userdata['role']!=1)
    {
//        echo "class='hidden'";
    }
                                                   ?>href="<?php echo base_url(); ?>upload/index/<?php echo $this->session->userdata['userId'];?>" class="glyphicon-plus"></li></a> </h2>

<?php $counter = 1;?>
<?php foreach ($documents as $document):?>
    <div class="container">
        <p>Document # <?php echo $counter++; ?></p>
<!--        <br>-->
<!--        <label>type</label>-->
<!--        <small class="post-date">--><?php //echo $document['type']?><!--</small>-->
        <br>
        <a class="btn btn-primary btn-small" href="<?php echo $this->service_model->apiServer.'/v1/static/'.$document['location']; ?>">Download </a>
    </div>
    <hr>
<?php endforeach;?>

<div class="container">
    <?php if (!empty($error))
    {
        echo $error;
    }?>
</div>
