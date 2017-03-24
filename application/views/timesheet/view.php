<h2>
Timesheet# : <?php echo $timesheet['id']; ?></h2><br>
<div >
    Name: <?php echo $timesheet['asana_link']; ?><br>
    Start Time: <?php echo date('d-m-Y H:i:s', $timesheet['start_time']); ?><br>
    End Time: <?php echo date('d-m-Y H:i:s', $timesheet['end_time']); ?><br>
    Client Id: <?php echo $timesheet['client_id']; ?><br>

</div>

<hr>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>timesheet/edit/<?php echo $timesheet['id']; ?>">Edit</a>

<?php echo form_open('/timesheet/delete/'.$timesheet['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>