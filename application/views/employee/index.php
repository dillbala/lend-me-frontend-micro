<h2 class="text-center text-primary"><?= $title?> <a href="<?php echo base_url(); ?>employee/add" class="glyphicon-plus"></li></a> </h2>

<?php foreach ($employees as $employee):?>
    <div class="container">
        <label> Name</label>
        <?php echo $employee['name'];?>
        <br>
        <label>Email</label>
        <small class="post-date"><?php echo $employee['email']?></small>
        <br>
    <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>employee/view/<?php echo $employee['id']; ?>">View Details</a>
    </div>
    <hr>
<?php endforeach;?>
