<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <?php
    if (!empty($error))
    {
        echo $error;
    }

    ?>

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
<style>

    .wizard {
        margin: 20px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;

    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs > li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }

    .wizard .nav-tabs > li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }

    .wizard h3 {
        margin-top: 0;
    }

    @media( max-width : 585px ) {

        .wizard {
            width: 90%;
            height: auto !important;
        }

        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard .nav-tabs > li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }

</style>







    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active step1">
                                <a class="step1" href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab" style="font-size: .6em">
                                Employment
<!--                                <i class="glyphicon glyphicon-briefcase"></i>-->
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled step2">
                                <a class="step2" href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab" style="font-size: .6em">
                                Pan card
<!--                                <i class="glyphicon glyphicon-pencil"></i>-->
                            </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled step3">
                                <a class="step3" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab" style="font-size: .6em">
                                Adhar card
<!--                                <i class="glyphicon glyphicon-picture"></i>-->
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled step4">
                                <a class="step4" href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab" style="font-size: .6em">
                                bank
<!--                                <i class="glyphicon glyphicon-ok"></i>-->
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">

                                <form id="employmentFormId">
                                    <div class="form-group col-sm-6 col-sm-offset-3">

                                        <div class="well">
                                            <input hidden name="step" value="step1">
                                            <div id="errorStep1" class="text-danger"></div>
                                            <div class="text-primary"> <p>Employment Details</p></div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Employee Id</label></span>
                                                <input required class="form-control employeeId" type="file" name="employeeId" value="<?php echo set_value('employeeId');?>" >
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Employee Number</label></span>
                                                <input required class="form-control employeeNumber" type="text" name="employeeNumber" value="<?php echo set_value('employeeNumber');?>" >
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Last Month Salary Slip</label></span>
                                                <input required class="form-control salarySlip" type="file" name="salarySlip" value="<?php echo set_value('salarySlip');?>" >
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-inline pull-right">
                                                <li><button class="btn btn-primary next-step" type="submit">Save and continue</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <form id="panFormId">
                                    <div class="form-group col-sm-6 col-sm-offset-3">
                                    <div class="well">
                                        <input hidden name="step" value="step2">
                                        <div id="errorStep2" class="text-danger"></div>
                                        <div class="text-primary"> <p>Pan Card Details</p></div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><label>Pan Card</label></span>
                                            <input required class="form-control" type="file" name="panCard" value="<?php echo set_value('panCard');?>" >
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><label>Pan Number</label></span>
                                            <input required class="form-control" type="text" name="panNumber" value="<?php echo set_value('panNumber');?>" placeholder="Pan Number" minlength="10" maxlength="10">
                                        </div>
                                    </div>
                                        <ul class="list-inline pull-right">
<!--                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>-->
                                    <li><button type="submit" class="btn btn-primary next-step" >Save and continue</button></li>
                                </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <form id="adharFormId">
                                    <div class="form-group col-sm-6 col-sm-offset-3">
                                        <div class="well">
                                            <input hidden name="step" value="step3">
                                            <div id="errorStep3" class="text-danger"></div>
                                            <div class="text-primary"> <p>Adhar Details</p></div>


                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Adhar Card Front</label></span>
                                                <input required class="form-control" type="file" name="adharF" value="<?php echo set_value('adharF');?>" >
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Adhar Card Back</label></span>
                                                <input required class="form-control" type="file" name="adharB" value="<?php echo set_value('adharB');?>" >
                                            </div>

                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Adhar Number</label></span>
                                                <input required class="form-control" type="text" name="adharNumber" value="<?php echo set_value('adharNumber');?>" placeholder="Adhar Number" minlength="12" maxlength="12">
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-inline pull-right">
<!--                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>-->
<!--                                                <li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
                                                <li><button type="submit" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                            </ul>
<!--                                            <ul class="list-inline pull-right">-->
<!--                                                <li><button class="btn btn-primary next-step">Save and continue</button></li>-->
<!--                                            </ul>-->
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div class="tab-pane" role="tabpanel" id="step4">
                                <form id="bankFormId">
                                    <div class="form-group col-sm-6 col-sm-offset-3">
                                        <div class="well">
                                            <input hidden name="step" value="step4">
                                            <div id="errorStep4" class="text-danger"></div>
                                            <div class="text-primary"> <p>Bank Account Details</p></div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Last Month Bank Statement</label></span>
                                                <input required class="form-control" type="file" name="bankStatement" value="<?php echo set_value('bankStatement');?>">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Name on Bank Account</label></span>
                                                <input required class="form-control" type="text" name="nameOnBank" value="<?php echo set_value('nameOnBank');?>" placeholder="Name on Bank Account">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Bank Name</label></span>
                                                <input required class="form-control" type="text" name="bankName" value="<?php echo set_value('bankName');?>" placeholder="Bank Name" >
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Branch Name</label></span>
                                                <input required class="form-control" type="text" name="branchName" value="<?php echo set_value('branchName');?>" placeholder="Branch Name" >
                                            </div>
                                            <br>

                                            <div class="input-group">
                                                <span class="input-group-addon"><label>IFSC Code</label></span>
                                                <input required class="form-control" type="text" name="ifscCode" value="<?php echo set_value('ifscCode');?>" placeholder="IFSC Code" >
                                            </div>
                                            <br>

                                            <div class="input-group">
                                                <span class="input-group-addon"><label>Account Number</label></span>
                                                <input required class="form-control" type="text" name="accountNumber" value="<?php echo set_value('accountNumber');?>" placeholder="Account Number" >
                                            </div>
                                        </div>
                                        <ul class="list-inline pull-right">
<!--                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>-->
                                            <li><button type="submit" class="btn btn-primary next-step">Save and continue</button></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                </div>
            </section>
        </div>
    </div>




<div id="addFormProcess" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-6">

            <div class="modal-body">
                <strong>Updating data. Please wait !</strong>
            </div>

        </div>

    </div>
</div>




<div id="addFormSuccess" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-6">

            <div class="modal-body">
                <strong>Data Updated Successfully!</strong>
            </div>

        </div>

    </div>
</div>


    <script src="http://malsup.github.com/jquery.form.js"></script>



    <?php
    switch ($status){

        case 5:
            echo '<script>$(".step1").removeClass(\'disabled\');$(".step2").removeClass(\'disabled\').click();</script>';
            break;
        case 6:
            echo '<script>$(".step1").removeClass(\'disabled\');$(".step2").removeClass(\'disabled\');$(".step3").removeClass(\'disabled\').click();</script>';
            break;
        case 7:
            echo '<script>$(".step1").removeClass(\'disabled\');$(".step2").removeClass(\'disabled\');$(".step3").removeClass(\'disabled\');$(".step4").removeClass(\'disabled\').click();</script>';
            break;


    }


    ;?>

    <script>



        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

//            $(".next-step").click(function (e) {
//
//                var $active = $('.wizard .nav-tabs li.active');
//                $active.next().removeClass('disabled');
//                nextTab($active);
//
//            });
//            $(".prev-step").click(function (e) {
//
//                var $active = $('.wizard .nav-tabs li.active');
//                prevTab($active);
//
//            });
        });
//
//        function nextTab(elem) {
//            $(elem).next().find('a[data-toggle="tab"]').click();
//        }
//        function prevTab(elem) {
//            $(elem).prev().find('a[data-toggle="tab"]').click();
//        }



        $( '#employmentFormId' )
            .submit( function( e ) {
                $("#addFormProcess").modal();

                $.ajax( {
                    url: '/professional/do_upload/',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function (result) {

                        if (result.trim('\n')==200)
                        {
                            $("#addFormProcess").modal('hide');
                            $("#errorStep1").text('');
                            $(".step2").removeClass('disabled').click();
                        }
                        else{
                            result = result.trim("<p>");
                            result = result.trim("</p>");
                            $("#errorStep1").text(result);
                        }


                    },
                    failure: function(result){
                        alert(result);
                    }
                } );
                e.preventDefault();
            } );



        $( '#panFormId' )
            .submit( function( e ) {
                $("#addFormProcess").modal();
                $.ajax( {
                    url: '/professional/do_upload/',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result.trim('\n')==200)
                        {
                            $("#addFormProcess").modal('hide');
                            $("#errorStep2").text('');
                            $(".step3").removeClass('disabled').click();
                        }
                        else{
                            $("#errorStep2").text(result);
                        }


                    },
                    failure: function(result){
                        alert(result);
                    }
                } );
                e.preventDefault();
            } );


        $( '#adharFormId' )
            .submit( function( e ) {
                $("#addFormProcess").modal();
                $.ajax( {
                    url: '/professional/do_upload/',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result.trim('\n')==200)
                        {
                            $("#addFormProcess").modal('hide');
                            $("#errorStep3").text('');
                            $(".step4").removeClass('disabled').click();
                        }
                        else{
                            $("#errorStep3").text(result);
                        }


                    },
                    failure: function(result){
                        alert(result);
                    }
                } );
                e.preventDefault();
            } );



        $( '#bankFormId' )
            .submit( function( e ) {
                $("#addFormProcess").modal();
                $.ajax( {
                    url: '/professional/do_upload/',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result.trim('\n')==200)
                        {
                            $("#addFormProcess").modal('hide');
                            $("#errorStep4").text('');
                            location.reload;

                        }
                        else{
                            $("#errorStep4").text(result);
                        }


                    },
                    failure: function(result){
                        alert(result);
                    }
                } );
                e.preventDefault();
            } );

    </script>


    <?php echo form_open_multipart('professional/do_upload')?>


    <style>

        .input-group-addon:after {
            content:"*";
            color:red;
        }
    </style>



