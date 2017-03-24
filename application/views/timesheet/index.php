<h2 class="text-center text-primary"><?= $title?> <a href="<?php echo base_url(); ?>timesheet/add" class="glyphicon-plus"></li></a> </h2>

<?php foreach ($timesheets as $timesheet):?>
    <div class="container">
        <label>Project Name</label>
        <?php echo $timesheet['asana_link'];?>
        <br>
        <label>Start time</label>
        <small class="post-date"><?php echo date('d-m-Y H:i:s', $timesheet['start_time']);?></small>
        <br>
        <label>End time</label>
        <small class="post-date"><?php echo date('d-m-Y H:i:s', $timesheet['end_time']);?></small>
        <br>
    <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>timesheet/view/<?php echo $timesheet['id']; ?>">View Details</a>
    </div>
    <hr>

<?php endforeach;?>
