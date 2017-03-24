<h2>
Employee# : <?php echo $employee['employee_id']; ?></h2><br>
<div >
    Name: <?php echo $employee['name']; ?><br>
    Email: <?php echo $employee['email']; ?><br>
    Position: <?php echo $employee['position']; ?><br>
    Team: <?php echo $employee['team']; ?><br>
    Function: <?php echo $employee['team_function']; ?><br>
</div>

<hr>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>employee/edit/<?php echo $employee['id']; ?>">Edit</a>

<?php echo form_open('/employee/delete/'.$employee['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>