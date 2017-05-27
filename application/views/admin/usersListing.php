<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 23/05/17
 * Time: 6:09 PM
 */




?>
<div class="container-fluid">
    <div class="container-fluid">

    <?php

    if (!empty($users)) {


        foreach ($users as $user) ;
        echo "name => " . $user['firstName'] . " " . $user['lastName'] . "<br>";
        echo "mobile => " . $user['mobile'] . "<br>";
        echo "email => " . $user['email'] . "<br>";
        if ($user['role'] == 3) {
            echo "Type => Professional" . "<br>";
            ?>
            <a href="<?php echo base_url() . 'professional/view/' . $user['userId']; ?>">View</a>
            <?php
        } elseif ($user['role'] == 4) {
            echo "Type => Student" . "<br>";
            ?>
            <a href="<?php echo base_url() . 'student/view/' . $user['userId']; ?>">View</a>
            <?php
        }
    }
    else{
        ?>

        <div>There are no pending requests.</div>
        <?php

    }

    ?>

    </div>


    </div>
</div>

