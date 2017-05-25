<div class="container"><h2 class="align-left "><?php echo $title;?></h2>

    <br>

<?php
echo validation_errors();
?>
<?php echo form_open('');?>
<div class="form-group">
    <label>mobile</label>
    <input required type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile');?>" placeholder="mobile">
    <label>Password</label>
    <input required type="password" class="form-control" name="password" value="<?php echo set_value('password');?>" placeholder="password">
</div>
<?php if(!empty($error)){?>
<div class="alert-danger"><?php echo $error;?></div>
<?php }?>
<button type="submit" class="btn btn-default">submit</button>  <a type="submit" class="pull-right">Forgot Password</a>

</form>
    <hr>
    <a class="btn btn-primary btn-small pull-left" href="<?php echo base_url().'welcome/signup'?>">Signup </a>
</div>