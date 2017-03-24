<h2>
Employee# : <?php echo $project['id']; ?></h2><br>
<div >
    Name: <?php echo $project['name']; ?><br>
    Copy: <?php echo $project['copy']; ?><br>
    Asana: <?php echo $project['asana_link']; ?><br>
    Briefing: <?php echo $project['link_briefing']; ?><br>
    Art: <?php echo $project['art']; ?><br>
</div>

<hr>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>project/edit/<?php echo $project['id']; ?>">Edit</a>

<?php echo form_open('/project/delete/'.$project['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>