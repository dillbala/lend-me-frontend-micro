<h2 class="text-center text-primary"><?= $title?> <a href="<?php echo base_url(); ?>project/add" class="glyphicon-plus"></li></a> </h2>



<div class="container">
<?php foreach ($projects as $project):?>
    <div class="container">
        <label>Project #</label>
        <?php echo $project['id'];?>
        <br>
        <label>Name</label>
    <?php echo $project['name'];?>
        <br>
        <label>Link</label>

    <small ><?php echo $project['asana_link']?></small>
        <br>
    <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>project/view/<?php echo $project['id']; ?>">View Details</a>
    </div>
        <hr>
<?php endforeach;?>
</div>
