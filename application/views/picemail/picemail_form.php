<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Pic Email <?php echo form_error('kode_picemail') ?></label>
            <input type="text" class="form-control" name="kode_picemail" id="kode_picemail" placeholder=" Kode Pic Email" value="<?php echo $kode_picemail; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Pic Email <?php echo form_error('picemail') ?></label>
            <input type="text" class="form-control" name="picemail" id="picemail" placeholder=" Nama Pic Email" value="<?php echo $picemail; ?>" />
        </div>
        <input type="hidden" name="id_picemail" value="<?php echo $id_picemail; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('picemail') ?>" class="btn btn-default">Cancel</a>
    </form>