<?php
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets/js/scripts.js';?>"></script>

<?php
if(!empty($authUrl)) {

        ?>
    <head>
        <body background="<?php echo base_url().'assets/images/main.jpg';?>"></body>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css';?>"
</head>


    <?php
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/gsign.png" height="50" alt="" /></a>';
}else{
    if ($userData['status']==0)
    {
        ?> <p>You are not registered with the database please contact admin</p><?php
        echo '<p><b><a href="'.base_url().'dashboard/logout">Logout</a></b></p>';

    }
    else
    {



    ?>
    <div class="wrapper">
        <h1>Profile Details</h1>
        <?php
        echo '<div class="welcome_txt">Welcome <b>'.$userData['name'].'</b></div>';
        echo '<div class="google_box">';
        echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
        echo '<p><b>Name : </b>' . $userData['name'].'</p>';
        echo '<p><b>Email : </b>' . $userData['email'].'</p>';
        echo '<p><b>employee_id : </b>' . $userData['employee_id'].'</p>';
        echo '<p><b>position : </b>' . $userData['position'].'</p>';
        echo '<p><b>team_function : </b>' . $userData['team_function'].'</p>';
        echo '<p><b>team: </b>' . $userData['team'].'</p>';
        echo '<p><b>Logout from <a href="'.base_url().'dashboard/logout">Google</a></b></p>';
        echo '</div>';
        ?>
    </div>
<?php }
if($userData['role']==0)
{
    ?>





    <div>
    <button id="button" onclick="addDuplicateForm()">Add another employee</button>

        <div id="form">

            <form id="employee0">
                <label>Name</label><input type="text" placeholder="name" name="name" required="true"/>
                <label>Email</label><input type="text" placeholder="hello@getfoolish.com" name="email" required="true"/>
                <label>Role</label><select required="true" name = "role">
                    <option value="1">User</option>
                    <option value="0">Admin</option>
                    </select>
                <label>Employee id</label><input type="text" placeholder="GF-1" name="employee_id" required="true"/>
                <label>Team</label>
                <select required="true" name = "team">
                    <?php
                    foreach ($userData['teams'] as $team)
                    {
                        echo '<option value="'.$team['id'].'">'.$team['team_name'].'</option>';
                    }
                    ?>
                </select>
                <label>Team function</label>
                <select required="true" name = "team_function" >
                    <?php
                    foreach ($userData['team_functions'] as $team_function)
                    {
                        echo '<option value="'.$team_function['id'].'">'.$team_function['function'].'</option>';
                    }
                    ?>

                </select>
                <label>Position</label>
                <select required="true" name = "position">
                    <?php
                    foreach ($userData['positions'] as $position)
                    {
                        echo '<option  value="'.$position['id'].'">'.$position['designation'].'</option>';
                    }
                    ?>
                </select>

            </form>

        </div>

        <button id="submit" onclick="submit()">Submit</button>
            <script>
                document.getElementById('button').onclick = addDuplicateForm;
                document.getElementById('submit').onclick = submit;
                var employee_i = 0;
                var original = document.getElementById('employee0');
                function addDuplicateForm() {
                    var clone = original.cloneNode(true); // "deep" clone
                    clone.id = "employee" + ++employee_i; // there can only be one element with an ID
                    original.parentNode.appendChild(clone);
                }

                function submit() {
                    var employees = {'data':[]};
                    for (i = 0; i<=employee_i;i++ )
                    {
                        var employee = {};
                        employee['email']=document.getElementById("employee"+i).elements['email'].value;
                        employee['name']=document.getElementById("employee"+i).elements['name'].value;
                        employee['employee_id']=document.getElementById("employee"+i).elements['employee_id'].value;
                        employee['role']=document.getElementById("employee"+i).elements['role'].value;
                        employee['team']=document.getElementById("employee"+i).elements['team'].value;
                        employee['team_function']=document.getElementById("employee"+i).elements['team_function'].value;
                        employee['position']=document.getElementById("employee"+i).elements['position'].value;
                        employees['data'].push(employee);
                    }
//                    post('test','1',employees);
                    var path = "<?php echo base_url().'user/add';?>";
                    post(path,employees,'POST');
                    console.log(employees);

                }

            </script>

<?php
}
} ?>