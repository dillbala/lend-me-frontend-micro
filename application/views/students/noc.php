<h2 class="text-center text-primary">Students</h2>


<?php foreach ($students as $student):?>
    <div class="container">
        <p>Student Id# <?php echo $student['userId']; ?></p>
        <p>Name: <?php echo $student['firstName'].' '.$student['lastName']; ?></p>
        <p>Email : <?php echo $student['email']; ?></p>
        <?php if ($student['noc']==0)
        {
            echo "<p disabled='true' class='btn btn-danger btn-small pull-left'>Noc Pending</p>";
            echo "&nbsp";
            echo "<a class='btn btn-default btn-small ' href='".base_url()."student/view/".$student['userId']."'>View Student Profile</a>";
            echo "&nbsp";
            echo "<a class='btn btn-default btn-small' href='".base_url()."upload/noc/".$student['userId']."/".$student['firstName']."'>Upload Noc</a>";
        }
        ?>
        <br>
    </div>
    <hr>
<?php endforeach;?>

<div class="container">
    <?php if (!empty($error))
    {
        echo $error;
    }?>
</div>
