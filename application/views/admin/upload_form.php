<?php echo $error;?>

<?php echo form_open_multipart('admin/do_upload');?>

<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>
