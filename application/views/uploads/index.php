<div class="container">
    <h2>Upload File</h2>
    <?php
    echo validation_errors();

    ?>
    <?php echo $error;?>
    <?php echo $user_id;?>

    <?php echo form_open_multipart('upload/do_upload')?>
<!--    <form method="post" enctype="multipart/form-data" action="upload/do_upload">-->
        <div class="form-inline">
            <input required type="file" class="form-control" name="userfile" value="" >
            <input type="hidden" value="<?php echo $user_id;?>" name="user_id">
        </div>
        <br>


        <button type="submit" value="upload" class="btn btn-default">submit</button>
    </form>
</div>
