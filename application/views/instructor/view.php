
<div >
    Name: <?php echo $instructor['firstName'].' '.$instructor['lastName']; ?><br>
    Email: <?php echo $instructor['email']; ?><br>
</div>

<hr>
<a class="btn btn-default pull-left hidden" href="<?php echo base_url(); ?>instructor/edit/<?php echo $instructor['userId']; ?>">Edit</a>



<?php if ($this->session->userdata['role']==0 || $this->session->userdata['role']==1)
{
echo form_open('/instructor/delete/'.$instructor['userId']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php }?>

