<?php echo validation_errors(); ?>

<?php echo form_open('admin/pageadd'); ?>

    <label for="PageTitle">PageTitle</label>
    <input type="input" name="PageTitle" placeholder="PageTitle"/><br />

    <label for="PageSlug">PageSlug</label>
    <input type="input" name="PageSlug" placeholder="PageSlug"></input><br />

    <input class="btn btn-default" type="submit" name="submit" value="Dodaj nową stronę" />

</form>
