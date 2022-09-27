<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Department <?php echo form_error('kode_department') ?></label>
            <input type="text" class="form-control" name="kode_department" id="kode_department" placeholder=" Kode Department" value="<?php echo $kode_department; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Department <?php echo form_error('department') ?></label>
            <input type="text" class="form-control" name="department" id="department" placeholder=" Nama Department" value="<?php echo $department; ?>" />
        </div>
        <input type="hidden" name="id_department" value="<?php echo $id_department; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('department') ?>" class="btn btn-default">Cancel</a>
    </form>