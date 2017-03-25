<h2>Add Instructor</h2>
<?php
echo validation_errors();
?>
<?php echo form_open('instructor/add');?>
<div class="form-inline">
    <input required type="text" class="form-control" name="firstName" value="<?php echo set_value('firstName');?>" placeholder="First name">
    <input  type="text" class="form-control" name="middleName" value="<?php echo set_value('middleName');?>" placeholder="Middle name">
    <input required type="text" class="form-control" name="lastName" value="<?php echo set_value('lastName');?>" placeholder="Last name">
    <input required type="text" class="form-control" name="email" placeholder="add email" value="<?php echo set_value('email');?>">
    <input required type="text" class="form-control" name="password" placeholder="add password" value="<?php echo set_value('password');?>">

</div>

<br>
<div class="container alert-danger">
    <?php if (!empty($error))
    {
        echo $error;
    }
    ?>
</div>
<button type="submit" class="btn btn-default">submit</button>
</form>