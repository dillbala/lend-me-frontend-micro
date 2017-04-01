<div class="container">
<h2 class="text-center"> Student Requests </h2>

<?php $counter = 1;?>
<?php foreach ($requests as $request):?>
    <div class="container">

        <!--        <br>-->
        <!--        <label>type</label>-->
        <!--        <small class="post-date">--><?php //echo $document['type']?><!--</small>-->
        <?php if ($request['type']==1){
            echo "<p>Request #".$counter++."</p>";
                    $student_data = $this->service_model->getData('/v1/users/'.$request['userId'])['result']['data'];
            echo "Student Name: ".$student_data['firstName']." ".$student_data['lastName'];
            ?>
            <br>
            <a href="<?php echo base_url().'request/accept/'.$request['id']?>" class="btn btn-small btn-primary"> Accept </a>
            <a href="<?php echo base_url().'request/decline/'.$request['id']?>" class="btn btn-small btn-primary"> Decline </a>

            <?php
        }
        else{
            ?>

            <?php
        }?>
        <br>
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