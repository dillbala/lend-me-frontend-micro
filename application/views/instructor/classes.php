<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<div class="container">

    <h2>Classes</h2>
    <?php foreach ($classes as $date=>$class):?>
        <?php echo $date;?>
        <br>
        <?php foreach ($class as $dateClass):?>
            <div>

                <?php if ($dateClass['status_instructor']==1){?>
                    <input readonly class="btn btn-neutral btn-small" id= "<?php echo $dateClass['id']?>" value="<?php echo $dateClass['slot_id']?>">
                    <input readonly value="Available">

                <?php }else if ($dateClass['status_instructor']==2){?>
                    <input readonly class="btn btn-neutral btn-small" id= "<?php echo $dateClass['id']?>" value="<?php echo $dateClass['slot_id']?>">
                                    <?php if ($dateClass['cancel']==1)
                                    {
                                        ?>
                                        <button value="cancel" class="btn btn-primary">Cancel</button>
                                        <?php
                                    }?>
                <?php }?>
            </div>
            <br>

        <?php endforeach;?>
        <hr>
    <?php endforeach;?>
</div>

