<h2>Edit Timesheet</h2>
<?php
echo validation_errors();
?>
<?php echo form_open('timesheet/update');?>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css';?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/bootstrap-datetimepicker.min.js";?>"></script>
<script src="<?php echo base_url()."assets/js/bootstrap.min.js";?>"></script> <!-- only added as a smoke test for js conflicts -->
<input type="hidden" name="id" value="<?php echo $timesheet['id'];?>">
<div class="form-inline">



    <label>Start Time</label>
    <div class="input-group date start_time" data-date="2017-03-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="start_time">
        <input required class="form-control start_time " type="datetime" value="<?php echo date('d-m-Y H:i:s', $timesheet['start_time']); ?>" placeholder="start time" name="start_time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>


    <label>End Time</label>
    <div class="input-group date end_time " data-date="2017-03-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="end_time">
        <input required class="form-control end_time" type="datetime" value="<?php echo date('d-m-Y H:i:s', $timesheet['end_time']); ?>" placeholder="End time" name="end_time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>





    <script type="text/javascript">
        $('.start_time').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });

    </script>


    <script type="text/javascript">
        $('.end_time').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });

    </script>


    <label>Asana Link</label>
    <input type="text" class="form-control" name="asana_link" placeholder="add link" value="<?php echo $timesheet['asana_link'];?>">

</div>

<button type="submit" class="btn btn-default">submit</button>
</form>