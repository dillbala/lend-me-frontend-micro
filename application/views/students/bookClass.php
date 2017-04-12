<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<div class="container">
    <h1 class="">Instructor Details</h1>
    <p class="text-primary"><?php echo $instructor['firstName'].' '.$instructor['firstName'];?></p>
    <p><?php echo $instructor['email'];?></p>

    <hr>
        <h2>Select classes</h2>
        <?php foreach ($classes as $date=>$class):?>
            <?php echo $date;?>

            <br>

            <?php
            $dateData = $this->service_model->getData('/v1/timeslots/?student_id='.$this->session->userdata['userId'].'&status_instructor=2&date='.$date)['result']['data'];
            $count = 4 - sizeof($dateData);
            echo "<p>Maximum Available Slots <b>".$count."</b></p>";
            foreach ($class as $dateClass):?>

                <input readonly class="btn btn-neutral btn-small" id= "<?php echo $dateClass['id']?>" value="<?php echo $dateClass['slot_id']?>" onclick="changeClass(this.id,'<?php echo $date;?>',<?php echo $count;?>)">
                <?php endforeach;?>
            <hr>
        <?php endforeach;?>
    <button class="btn btn-primary btn-small" onclick="return postData()" value="Submit">Submit</button>
    </div>


<script>
    var dailyData = {}
    function changeClass(id,date,count)
    {
        console.log(date);
        console.log(count);

        if ($('#' + id).hasClass('btn-neutral'))
        {
            if (count===0)
            {
                alert('You can not choose from this date');
            }
            else {


                if (!(date in dailyData))
                {
                    dailyData[date] = 0;
                }
                dailyData[date] +=1;
                if (dailyData[date]>count)
                {
                    dailyData[date] -=1;
                    alert('You can not choose more than '+ count +' slots from this date');
                }
                else {


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
            }
        }

        else
        {
            dailyData[date] -=1;
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
