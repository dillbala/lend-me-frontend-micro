<h2>Add Employee</h2>
<?php
echo validation_errors();
?>
<?php echo form_open('employee/add');?>
<div class="form-inline">
    <input required type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" placeholder="add name">
    <input required type="text" class="form-control" name="email" placeholder="add email" value="<?php echo set_value('email');?>">
    <select required name="role" class="form-control">
        <option selected value="" disabled >Role</option>
        <option  value="1">User</option>
        <option value="0">Admin</option>
    </select>

    <select required name="team" class="form-control">
        <option selected value="" disabled >Team Name</option>
    <?php foreach ($teams as $team):?>
        <option value="<?php echo $team['team_name'];?>"><?php echo $team['team_name'];?></option>
    <?php endforeach;?>
    </select>
    <select required name="team_function" class="form-control">
        <option selected value="" disabled >Function</option>
        <?php foreach ($team_functions as $function):?>
            <option value="<?php echo $function['function'];?>"><?php echo $function['function'];?></option>
        <?php endforeach;?>
    </select>
    <select required name="position" class="form-control">
        <option selected value="" disabled >Position</option>
        <?php foreach ($positions as $position):?>
            <option value="<?php echo $position['designation'];?>"><?php echo $position['designation'];?></option>
        <?php endforeach;?>
    </select>
</div>

<button type="submit" class="btn btn-default">submit</button>
</form>