
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">


<div class="container-fluid">


    <form>
        <label> Select Amount of Loan</label>
        <br>
        <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="500" data-slider-max="5000" data-slider-step="500" data-slider-value="1000"/>
        <br>
        </br>
        <label>Loan Amount:</label> <input id="amount" class="btn btn-primary" style="width: 70px" type="text" value="1000">
        <br>
        <hr>
        <label> Select number of days </label>
        <br>
        <input id="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="1" data-slider-max="31" data-slider-step="1" data-slider-value="7"/>
        <br>
        </br>
        <label>Days:</label> <input id="days" class="btn btn-primary" style="width: 70px" type="text" value="7">
        <br>
        <hr>
        <br>
        <label>Repayment date</label> <input id="date" class="btn btn-primary" style="" type="text" value="">
        <br>
        <br>
        <label>Borrowing: Rs </label> <input class="btn btn-primary" style="width: 70px" id="borrwing" type="text" value="1000"><strong> + </strong>
        <label>Interest: Rs </label> <input class="btn btn-primary" style="width: 70px" id="interest" type="text" value="14"><strong> = </strong>
        <label>Total to Repay: Rs  </label> <input class="btn btn-primary" style="width: 70px" id="total" type="text" value="1014">

        <br>
        </br>
        <button class="btn btn-success" type="submit">Apply for Loan</button>
    </form>
</div>





<script>


    $('#ex1').slider({
        formatter: function(value) {

            $('#amount').val(value);
            calculate();
            return 'Rs: ' + value;
        }
    });

    function calculate() {

        var amount = $('#amount').val();
        var days = $('#days').val();
        var rate = 0.2;

        if (days<=7)
            rate = 0.2;
        if (days>7 && days<=14)
            rate = 0.4;
        if (days>14 && days<=21)
            rate = 0.6;
        if (days>21 && days<=31)
            rate = 0.8;
        $('#borrwing').val(amount);
        var interest = (amount*days*rate)/100;
        $('#interest').val(interest);
        $('#total').val(parseFloat(amount)+parseFloat(interest));

    }

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