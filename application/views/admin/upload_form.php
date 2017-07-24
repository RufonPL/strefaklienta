<?php echo $error;?>

<?php echo form_open_multipart('admin/do_upload');?>

<?php echo "ProjectID = ".$_SESSION["project_id"]."<br>"; ?>

Project Name: <input disabled type="text" name="project_name" value="<?php echo $this->admin_model->getProjectSlug($_SESSION["project_id"]);?>" />
Page number: <input disabled type="text" name="page_id" value="<?php echo $_SESSION['pageId'];?>" />
<input type="hidden" name="page_id" value="<?php echo $_SESSION['pageId'];?>" />
<br />
<br/>
<input type="text" name="layout_title" placeholder="Title"/>
<input type="text" name="layout_slug" placeholder="Slug"/>
<br /><br />
<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>
