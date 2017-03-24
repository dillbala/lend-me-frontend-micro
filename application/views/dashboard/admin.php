<p>Welcome to get foolish</p>
<?php
echo validation_errors();
?>
<?php echo form_open('user/add');?>
    <div class="form-group">
        <label>title</label>
        <input type="text" class="form-control" name="title" placeholder="add title">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">body</label>
        <textarea class="form-control" name="body" placeholder="Add Body"></textarea>
    </div>
    <button type="submit" class="btn btn-default">submit</button>
</form>