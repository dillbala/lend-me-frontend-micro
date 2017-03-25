<h2><?php echo $title;?><a class="pull-right" href="<?php echo base_url().''?>">Login </a></h2>
<?php
echo validation_errors();
?>
<script  type="text/javascript">
    function confirmPassword() {

        console.log("I am called");
        var pass1 = document.getElementById("password").value;
        var pass2 = document.getElementById("confirmPassword").value;
        console.log(pass1);
        console.log(pass2);
        var ok = true;
        if (pass1 != pass2) {
            alert("Passwords Do not match");
            document.getElementById("password").style.borderColor = "#E34234";
            document.getElementById("confirmPassword").style.borderColor = "#E34234";
            ok = false;
        }
        else {
            alert("Passwords Match!!!");
            document.getElementById("regForm").submit();
        }
        return ok;
    }
</script>
<form id = "regForm" action="signup" method="post">
<div class="form-group">
    <label>First name</label>
    <input required type="text" class="form-control" name="firstName" value="<?php echo set_value('firstName');?>" placeholder="first name">
    <label>Middle Name</label>
    <input type="text" class="form-control" name="middleName" value="<?php echo set_value('middleName');?>" placeholder="middle name">
    <label>Last Name</label>
    <input required type="text" class="form-control" name="lastName" value="<?php echo set_value('lastName');?>" placeholder="last name">
    <label>Dob</label>
    <input required type="date" class="form-control" name="dob" value="<?php echo set_value('date');?>" placeholder="Dob">
    <label>Nationality</label>
    <select required name="nationality" class="form-control">
        <option selected value="">Nationality</option>
        <option value="India">India</option>
        <option value="Germany">Germany</option>
    </select>

    <label>Address</label>
    <textarea required type="text" class="form-control" name="address" value="<?php echo set_value('address');?>" placeholder="Address"></textarea>
    <label>Mobile</label>
    <input required type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile');?>" placeholder="Mobile">
    <label>email</label>
    <input required type="text" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="email">
    <label>Password</label>
    <input required type="password" class="form-control" id = "password" name="password" value="<?php echo set_value('password');?>" placeholder="password">
<!--    <label>Confirm password</label>-->
<!--    <input required type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="--><?php //echo set_value('confirmPassword');?><!--" placeholder="Confirm Password">-->
</div>
<?php if(!empty($error)){?>
    <br>
    <div class="alert-danger"><?php echo $error;?></div>
    <br>
<?php }?>

    <button type="submit" class="btn btn-default" onclick="confirmPassword()">submit</button>
<!--    <input type="submit" value="Submit" onsubmit="confirmPassword()">-->


    <!--<button type="submit" class="btn btn-default">submit</button>-->
</form>
