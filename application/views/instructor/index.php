<h2 class="text-center text-primary">Instructors<a <?php if ($this->session->userdata['role']!=0 && $this->session->userdata['role']!=1)
    {
        echo "class='hidden'";
    }
                                                   ?>href="<?php echo base_url(); ?>instructor/add" class="glyphicon-plus"></li></a> </h2>

<?php

$accepted = $this->service_model->getData('/v1/requests/?status=2&sort=0&size=1&userId='.$this->session->userdata['userId'])['result']['data'];
if (!empty($accepted))
{
    $instructorId = $accepted[0]['instructorId'];
    $instructorData = $this->service_model->getData('/v1/users/'.$instructorId)['result']['data'];
    ?>
    <div class="container">

        <label> Name</label>
        <?php echo $instructorData['firstName'];?>
        <br>
        <label>Email</label>
        <small class="post-date"><?php echo $instructorData['email']?></small>
        <br>
        <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>instructor/view/<?php echo $instructorData['userId']; ?>">View Details</a>
        <a class="btn btn-success btn-small" disabled="">Assigned</a>
    </div>
    <?php
}

else{


foreach ($instructors as $instructor):?>
    <div class="container">
        <label> Name</label>
        <?php echo $instructor['firstName'];?>
        <br>
        <label>Email</label>
        <small class="post-date"><?php echo $instructor['email']?></small>
        <br>
        <a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>instructor/view/<?php echo $instructor['id']; ?>">View Details</a>
        <?php

//        if($this->session->userdata['role']==3&&$this->session->userdata['noc']==1)
        if($this->session->userdata['role']==3)
        {


            $requestData = $this->service_model->getData('/v1/requests/?instructorId='.$instructor["id"].'&sort=0&size=1&userId='.$this->session->userdata['userId'])['result']['data'];
            if (!empty($requestData))
            {
                if ($requestData[0]['status']==1)
                {
                    ?>
                    <button class="btn btn-danger btn-small" disabled > Request Sent</button>
<!--                    <button class="btn btn-block" disabled>Request Sent</button>-->
                    <?php
                }
                else if ($requestData[0]['status']==2)
                {
                    ?>
                    <button class="btn btn-block btn-small" disabled>Request Accepted</button>
                    <?php
                }
                else if ($requestData[0]['status']==3)
                {
                    ?>
                    <button class="btn btn-block btn-small" disabled>Request Accepted</button>
                    <?php
                }
            }
            else{



                if(empty($accepted))
                {


            ?>

            <a class="btn btn-primary btn-small" href="<?php echo base_url().'instructor/request/'.$instructor['id']?>"> Send Request</a>
        <?php
                }
            }
        }






            ?>

    </div>
    <hr>
<?php endforeach;}?>

<div class="container">
    <?php if (!empty($error))
    {
        echo $error;
    }?>
</div>
