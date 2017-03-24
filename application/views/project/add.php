<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!---->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>' type='text/javascript'%3E%3C/script%3E"));
    }
</script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/clone-project-form.js";?>"></script>
<script src="<?php echo base_url()."assets/js/bootstrap.min.js";?>"></script> <!-- only added as a smoke test for js conflicts -->
</head>

<body>
<div id="wrapper">

    <form action="project_add" method="post" id="sign-up_area" role="form" class="form-inline">
        <div id="entry1" class="clonedInput">
            <h2 id="reference" name="reference" class="heading-reference">Project #1</h2>
            <fieldset>
                <input type="hidden" value="<?php echo $user_id;?>" name="created_by">
                <input required type="text" class="name form-control" name="name" value="<?php echo set_value('name');?>" placeholder="Project name">


                <select required name="type" class="type form-control">
                    <option value="" selected="selected" disabled="disabled">Select Deliverable</option>
                    <option value="CC">CC</option>
                    <option value="CE">CE</option>
                    <option value="CA">CA</option>
                </select>

                <input required type="text" class="asana_link form-control" name="asana_link" placeholder="Asana link" value="<?php echo set_value('asana_link');?>">
                <label>Briefing</label>
                <input required type="date" class="date_briefing form-control" name="date_briefing" placeholder="add date" value="<?php echo set_value('date_briefing');?>">
                <label>Completion</label>
                <input required type="date" class="date_completed form-control" name="date_completed" placeholder="add date" value="<?php echo set_value('date_completed');?>">
                <input required type="text" class="link_briefing form-control" name="link_briefing" placeholder="Briefing link" value="<?php echo set_value('link_briefing');?>">
                <select required name="art" class="art form-control">
                    <option value="" selected="selected" disabled="disabled">Select Art</option>
                    <?php foreach ($employees as $employee):?>
                        <option value="<?php echo $employee['id'];?>"><?php echo $employee['name'];?></option>
                    <?php endforeach;?>
                </select>

                <select required name="copy" class="copy form-control">
                    <option value="" selected="selected" disabled="disabled">Select Copy</option>
                    <?php foreach ($employees as $employee):?>
                        <option value="<?php echo $employee['id'];?>"><?php echo $employee['name'];?></option>
                    <?php endforeach;?>
                </select>



                <select required name="client_id" class="client_id form-control">
                    <option value="" selected="selected" disabled="disabled">Select Client</option>
                    <?php foreach ($clients as $client):?>
                        <option value="<?php echo $client['id'];?>"><?php echo $client['name'];?></option>
                    <?php endforeach;?>
                </select>



        </div><!-- end #entry1 -->
        <!-- Button (Double) -->
        <br>
        <p>
            <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Add Another Project</button>
            <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">Remove above project</button>
        </p>

        <!-- Button -->
        <p>
            <button id="submit_button" name="submit_button" class="btn btn-primary">Submit</button>
        </p>

        </fieldset>
    </form>



</div> <!-- end wrapper -->
