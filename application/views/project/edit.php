<h2>Edit Project</h2>
<?php
echo validation_errors();
?>
<?php echo form_open('project/update');?>
<input type="hidden" name="id" value="<?php echo $project['id'];?>">
<div class="form-inline">
    <label>name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $project['name'];?>" placeholder="add name">
    <label>Type of deliverable</label>
    <select name="type" class="form-control">
        <?php foreach (array("CC","CE","CA") as $type):?>
            <option value="<?php echo $type;?>" <?php if($type==$project['type']){echo 'selected="selected"';}?>><?php echo $type;?></option>
        <?php endforeach;?>
    </select>


    <label>Asana Link</label>
    <input type="text" class="form-control" name="asana_link" placeholder="add link" value="<?php echo $project['asana_link'];?>">
    <label>Date of briefing</label>
    <input type="date" class="form-control" name="date_briefing" placeholder="add date" value="<?php echo $project['date_briefing'];?>">
    <label>Date of completion</label>
    <input type="date" class="form-control" name="date_completed" placeholder="add date" value="<?php echo $project['date_completed'];?>">
    <label>Link of briefing</label>
    <input type="text" class="form-control" name="link_briefing" placeholder="add link" value="<?php echo $project['link_briefing'];?>">
    <label>Art</label>
    <select name="art" class="form-control">
        <?php foreach ($employees as $employee):?>
            <option value="<?php echo $employee['id'];?>" <?php if($employee['id']==$project['art']){echo 'selected="selected"';}?>><?php echo $employee['name'];?></option>
        <?php endforeach;?>
    </select>

    <label>Copy</label>
    <select name="copy" class="form-control">
        <?php foreach ($employees as $employee):?>
            <option value="<?php echo $employee['id'];?>" <?php if($employee['id']==$project['copy']){echo 'selected="selected"';}?>><?php echo $employee['name'];?></option>
        <?php endforeach;?>
    </select>


</div>

<button type="submit" class="btn btn-default">submit</button>
</form>