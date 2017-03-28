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
                            <?php echo $firstName?></h4>
                        <?php echo $lastName;?>
                        <br>
                        <p>
                            <?php echo $email?>
                            <br />
                            <br />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<h2 class="align-center">Documents</h2>
<div class="container">
    <?php $counter = 1;?>
    <?php foreach ($documents as $document):?>
        <div class="container">
            <p>Document # <?php echo $counter++; ?></p>
            <?php if ($document['type']==2){
                ?>
                <label>Type of Document: </label>
                <strong class="">NOC</strong>
            <?php
            }
            else{
                ?>
                <label>Type of Document: </label>
                <strong class="">User Uploaded</strong>
            <?php
            }?>

            <br>
            <a target="_blank" class="btn btn-primary btn-small" href="<?php echo $this->service_model->apiServer.'/v1/static/'.$document['location']; ?>">Download </a>
        </div>
        <hr>
    <?php endforeach;?>

    <div class="container">
        <?php if (!empty($error))
        {
            echo $error;
        }?>
    </div>

</div>