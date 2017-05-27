
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">



<?php if (!$is_eligible_for_loan)
{

    ?>

    <div class="col-sm-4 col-sm-offset-4" style="padding-top: 10%">
        <div class="well text-center">
            <?php echo $loan_message;?>
            <p>Click <a href="<?php echo base_url().'profile/history'?>">here</a> to see your loan requests</p>
        </div>
    </div>

    <?php

}
else{


    ?>
<div class="container-fluid">


<form>
            <label> Select Amount of Loan</label>
    <br>
    <input id="ex1" name = "ex1" data-slider-id='ex1Slider' type="text" data-slider-min="100" data-slider-max="1000" data-slider-step="100" data-slider-value="500"/>
    <br>
    </br>
    <label>Loan Amount:</label> <input id="amount" class="btn btn-primary" style="width: 70px" type="text" value="500">
    <br>
    <hr>
            <label> Select number of days </label>
    <br>
    <input id="ex2" name = "ex2" data-slider-id='ex2Slider' type="text" data-slider-min="7" data-slider-max="31" data-slider-step="1" data-slider-value="7"/>
    <br>
    </br>
    <label>Days:</label> <input id="days" class="btn btn-primary" style="width: 70px" type="text" value="7">
    <br>
    <hr>
    <br>
    <label>Repayment date</label> <input id="date" class="btn btn-primary" style="" type="text" value="">
    <br>
    <br>
    <label>Borrowing: Rs </label> <input class="btn btn-primary" style="width: 70px" id="borrwing" type="text" value="500"><strong> + </strong>
    <label>Interest: Rs </label> <input class="btn btn-primary" style="width: 70px" id="interest" type="text" value="7"><strong> = </strong>
    <label>Total to Repay: Rs  </label> <input class="btn btn-primary" style="width: 70px" id="total" type="text" value="507">

    <br>
    </br>
    <button class="btn btn-success" id="apply" type="submit">Apply for Loan</button>
</form>
</div>



<?php }?>

<script>


    function calculate() {

        var amount = $('#amount').val();
        var days = $('#days').val();
        var interest = 0.0;
        var week1 = 0;
        var week2 = 0;
        var week3 = 0;
        var week4 = 0;
        if ((days/7)>0)
        {
            week1 = 7;
        }

        else{
            week1 = days%7;
        }


        if (days/14>0)
        {

            week2 = 7;
        }
        else{

            week2 = days%14-7;
        }

        if (days/21>0)
        {
            week3 = 7;

        }
        else{

            week3 = days%21-14;
        }
        if (days>21)
        {

            week4 = days-21;
        }


        interest = ((week1*0.2*amount)+(week2*0.4*amount)+(week3*0.6*amount)+(week4*0.8*amount))/100;

        $('#borrwing').val(amount);
        $('#interest').val(interest);
        $('#total').val(parseFloat(amount)+parseFloat(interest));


    }

    $('#apply').click(function () {


        $.post("<?php echo base_url().'apply/applyLoan/';?>",{ 'ex1': $('#amount').val(),
            'ex2':$('#days').val()
        } ).done(function(resultData) {
            resultData = resultData.trim('\n');
            if (resultData=='200')
            {
                alert('applied for loan successfully');
                window.location.reload();

            }
            else{
                alert(resultData);
            }

            return false;
        });

//        alert($('#amount').val());
//        alert($('#days').val());




    });


    $('#ex1').slider({
        formatter: function(value) {

            $('#amount').val(value);
            calculate();
            return 'Rs: ' + value;
        }
    });

    $('#ex2').slider({
        formatter: function(value) {
            $('#days').val(value);
            $("#date").val( moment().add(value, 'days').format('MMM D, YYYY') );
            calculate();
            return 'Days: ' + value;
        }
    });


    $(document).ready(function() {

        calculate();
        // set an element
        $("#date").val( moment().add(7, 'days').format('MMM D, YYYY') );


//        // set a variable
//        var today = moment().format('D MMM, YYYY');

    });


</script>