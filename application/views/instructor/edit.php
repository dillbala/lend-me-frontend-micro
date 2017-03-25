<h2>Edit Employee</h2>
<?php
echo validation_errors();
?>
<?php echo form_open('instructor/update');?>
<input type="hidden" name="id" value="<?php echo $employee['id'];?>">
<div class="form-inline">
    <label>name</label>
    <input type="text" class="form-control" name="name" placeholder="add title" value="<?php echo $employee['name'];?>">
    <label>email</label>
    <input type="text" class="form-control" name="email" placeholder="add email" value="<?php echo $employee['email'];?>">
    <label>role</label>
    <select class="form-control" name="role">
        <?php foreach (array(array('role'=>'Admin','code'=>0),array('role'=>'User','code'=>1))as $role):?>
            <option value="<?php echo $role['code'];?>" <?php if($role['code']==$employee['role']){echo 'selected="selected"';}?>><?php echo $role['role'];?></option>
        <?php endforeach;?>
    </select>

    <label>team</label>
    <select name="team" class="form-control">
        <?php foreach ($teams as $team):?>
            <option value="<?php echo $team['team_name'];?>" <?php if($team['team_name']==$employee['team']){echo "selected";}?>><?php echo $team['team_name'];?></option>
        <?php endforeach;?>
    </select>
    <label>function</label>
    <select name="team_function" class="form-control">
        <?php foreach ($team_functions as $function):?>
            <option value="<?php echo $function['function'];?>" <?php if($function['function']==$employee['team_function']){echo 'selected="selected"';}?>><?php echo $function['function'];?></option>
        <?php endforeach;?>
    </select>
    <label>Position</label>
    <select name="position" class="form-control">
        <?php foreach ($positions as $position):?>
            <option value="<?php echo $position['designation'];?>"<?php if($position['designation']==$employee['position']){echo "selected";}?>><?php echo $position['designation'];?></option>
        <?php endforeach;?>
    </select>
</div>
<br>
<button type="submit" class="btn btn-default">submit</button>
</form>