<?php echo $error;?>

<?php echo form_open_multipart('admin/do_upload');?>

<?php echo "ProjectID = ".$_SESSION["project_id"]."<br>"; ?>

<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>
