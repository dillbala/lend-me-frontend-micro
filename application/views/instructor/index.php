<h2 class="text-center text-primary">Instructors<a <?php if ($this->session->userdata['role']!=0 && $this->session->userdata['role']!=1)
    {
        echo "class='hidden'";
    }
                                                   ?>href="<?php echo base_url(); ?>instructor/add" class="glyphicon-plus"></li></a> </h2>

<?php foreach ($instructors as $instructor):?>
    <div class="container">
        <label> Name</label>
        <?php echo $instructor['firstName'];?>
        <br>
        <label>Email</label>
        <small class="post-date"><?php echo $instructor['email']?></small>
        <br>
    <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>instructor/view/<?php echo $instructor['id']; ?>">View Details</a>
    </div>
    <hr>
<?php endforeach;?>

<div class="container">
    <?php if (!empty($error))
    {
        echo $error;
    }?>
</div>
