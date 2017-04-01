<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<div class="container">
    <h1 class="">Instructor Details</h1>
    <p class="text-primary"><?php echo $instructor['firstName'].' '.$instructor['firstName'];?></p>
    <p><?php echo $instructor['email'];?></p>

        <h2>Select classes</h2>
        <?php foreach ($classes as $date=>$class):?>
            <?php echo $date;?>
            <br>
            <?php foreach ($class as $dateClass):?>
                <input readonly class="btn btn-neutral btn-small" id= "<?php echo $dateClass['id']?>" value="<?php echo $dateClass['slot_id']?>" onclick="changeClass(this.id)">
                <?php endforeach;?>
            <hr>
        <?php endforeach;?>
    <button class="btn btn-primary btn-small" onclick="return postData()" value="Submit">Submit</button>
    </div>


<script>
    function changeClass(id)
    {
        if ($('#' + id).hasClass('btn-neutral'))
        {
            $('#' + id).removeClass('btn-neutral');
            $('#' + id).addClass('btn-default');
//            if ($('.btn-default').length < 11)
//            {
//                $('#' + id).addClass('btn-default');
//            }
//            else
//            {
//                alert('Only 4 slots can be selected.');
//            }
        }

        else
        {
            $('#' + id).removeClass('btn-default');
            $('#' + id).addClass('btn-neutral');

        }
    }

    function postData() {
        if ($('.btn-default').length ==0 )
        {
            alert('You need to choose atleast 1 slots');
        }
        else{
            var ids = [];
            console.log("Here I am");
            $('.btn-default').each(function(index) {
                ids.push($( this ).attr('id'));
            });
            console.log(ids);
            console.log();
            ids = ids.join();

            $.post(" <?php echo base_url().'student/addClass/';?>", { 'ids': ids
            } ).done(function(resultData) {

                alert('succefully added classes ');
                window.location.href = '<?php echo base_url()."student/classes/"?>';
                return false;
            });

        }



    }

</script>
