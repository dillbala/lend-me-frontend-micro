<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="container">

<form onsubmit="postData()" method="post">
<div class="container form-inline">
    <label>Pick Date</label>
    <br>
        <input required type="date" class="form-control col-lg-8" name="date" id="date">
    <button class="btn-primary btn btn-small" value="submit">Submit</button>


            <h1>Pick Available slots(Max 11)</h1>

                <?php
                $slots = $this->service_model->getData('/v1/timeslots/')['result']['data'];
                foreach ($slots as $slot):
                    ?>
                    <input class="pull-left btn btn-small btn-neutral" id="<?php echo $slot['id'];?>" type="button" value="<?php echo $slot['slots'];?>" onclick="changeClass(this.id);"/>

                    <?php
                endforeach;
                ?>

    <div>
    <br>
    <div>

    </div>
</form>






<script>
    function changeClass(id)
    {
        if ($('#' + id).hasClass('btn-neutral'))
        {
            $('#' + id).removeClass('btn-neutral');
            if ($('.btn-default').length < 11)
            {
                $('#' + id).addClass('btn-default');
            }
            else
            {
                alert('Only 11 slots can be selected.');
            }
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
            alert('You need to choose 1 to 11 slots');
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
            var date  =$('#' + 'date').val();

            $.post(" <?php echo base_url().'instructor/addSlots/';?>", { 'ids': ids ,
                'date':date
            } ).done(function(resultData) {
                if (resultData==='200')
                {
                    alert('succefully set calendar for '+date);
                }
                else{
                    alert('Could not set calendar for '+date);
                }

            });

        }



    }

</script>
