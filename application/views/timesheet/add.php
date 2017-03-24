
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css';?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/moment.js";?>"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/clone-timesheet-form.js";?>"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/bootstrap-datetimepicker.min.js";?>"></script>
<script src="<?php echo base_url()."assets/js/bootstrap.min.js";?>"></script> <!-- only added as a smoke test for js conflicts -->
</head>

<body>
<div id="wrapper">

    <form action="timesheet_add" method="post" id="timesheet_area" role="form" class="form-inline">
        <div id="entry1" class="clonedInput">
            <h2 id="reference" name="reference" class="heading-reference">Timesheet #1</h2>
            <fieldset>
                <input type="hidden" value="<?php echo $user_id;?>" name="user_id">





                <input required type="text" class="name form-control" name="name" value="<?php echo set_value('name');?>" placeholder="Project name">

                <input required type="text" class="asana_link form-control" name="asana_link" placeholder="Asana link" value="<?php echo set_value('asana_link');?>">



                <div class="input-group date start_time" data-date="2017-03-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="start_time">
                    <input required class="form-control start_time " type="datetime" value="" placeholder="start time" name="start_time">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>



                <div class="input-group date end_time " data-date="2017-03-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="end_time">
                    <input required class="form-control end_time" type="datetime" value="" placeholder="End time" name="end_time">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>










                <select required name="client_id" class="client_id form-control">
                    <option value="" selected="selected" disabled="disabled">Select Client</option>
                    <?php foreach ($clients as $client):?>
                        <option value="<?php echo $client['id'];?>"><?php echo $client['name'];?></option>
                    <?php endforeach;?>
                </select>


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


        </div><!-- end #entry1 -->
        <!-- Button (Double) -->
        <br>



        <p>
            <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Add another timesheet</button>
            <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">Remove above timesheet</button>
        </p>

        <!-- Button -->
        <p>
            <button id="submit_button" name="submit_button" class="btn btn-primary">Submit</button>
        </p>

        </fieldset>
    </form>



</div> <!-- end wrapper -->
