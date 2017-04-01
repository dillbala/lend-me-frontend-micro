<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<div class="container">
    <h1 class="">Instructor Details</h1>
    <p class="text-primary"><?php echo $instructor['firstName'].' '.$instructor['firstName'];?></p>
    <p><?php echo $instructor['email'];?></p>

    <h2>Classes</h2>
    <?php foreach ($classes as $date=>$class):?>
        <?php echo $date;?>
        <br>
        <?php foreach ($class as $dateClass):?>
            <div>
            <input readonly class="btn btn-neutral btn-small" id= "<?php echo $dateClass['id']?>" value="<?php echo $dateClass['slot_id']?>">
            <?php if ($dateClass['cancel']==1)
            {
                ?>
                <button value="cancel" class="btn btn-primary">Cancel</button>
                <?php
            }?>
            </div>
            <br>

        <?php endforeach;?>
        <hr>
    <?php endforeach;?>
    <button class="btn btn-primary btn-small" onclick="" value="Submit">Submit</button>
</div>

