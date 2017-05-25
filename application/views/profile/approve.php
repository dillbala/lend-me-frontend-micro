<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 24/05/17
 * Time: 6:52 PM
 */

//echo "<pre>";print_r($userData);
//echo "<pre>";print_r($documentData);

?>

<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<div class="container-fluid">

    <div>Name: <?php echo $userData['firstName']." ".$userData['lastName'];?></div>

    <?php if (!empty($this->session->userdata['profile_pic']))
    {

        $file = $this->service_model->apiServer.'/static/'.$userData['profile_pic'];

    }
    else{
        $file = base_url().'assets/images/user_profile.png';
    }
    ?>
    <img src="<?php echo $file ?>"  alt="" class="img-rounded img-responsive" />
<!--    <div class="img-responsive">--><?php //$this->service_model->getFile($userData['profile_pic']);?><!--</div>-->
    <div>DOB: <?php echo $userData['dob'];?></div>
    <div>Mobile: <?php echo $userData['mobile'];?></div>
    <div>Email: <?php echo $userData['email'];?></div>
</div>



<?php foreach ($documentData as $document)
{

 $documentName =    $document['location'];

    $file = $this->service_model->apiServer.'/static/'.$documentName;


    ?>

    <h2>Document Type-  <?php echo $document['type'];?> </h2>

    <?php
    $exploded = explode('.',$documentName) ;
    if (end($exploded) =='pdf')
    {
        ?>
        <embed src="<?php echo $file;?>" />
<?php
    }
    else{
        ?>
        <img src="<?php echo $file ?>"  alt="" class="img-rounded img-responsive" />
<?php
    }

}?>


<button class="btn btn-default" id="approve"> Approve</button>


<div id="testSuccess" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-6">

            <div class="modal-header">
                <strong>Approved Successfully !</strong>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="testFail" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-6">

            <div class="modal-header">
                <strong> could not be approve !</strong>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>


    $('#approve').click(function (e) {
        e.preventDefault();


        var userId = "<?php echo $userData['userId'];?>";
        $.get("<?php echo base_url().'admin/approveUser/'.$userData['userId'];?>").done(function(resultData) {
            resultData = resultData.trim('\n');
            if (resultData=='200')
            {
                $("#testSuccess").modal();
                window.location = "<?php echo base_url().'admin'?>";




            }
            else{
                alert(resultData);
                $("#testFail").modal();
            }

            return false;
        });

//        alert("clicked");

    })


</script>