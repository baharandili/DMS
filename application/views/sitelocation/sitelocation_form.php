<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Site Location <?php echo form_error('kode_sitelocation') ?></label>
            <input type="text" class="form-control" name="kode_sitelocation" id="kode_sitelocation" placeholder=" Kode Site Location" value="<?php echo $kode_sitelocation; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Site Location <?php echo form_error('sitelocation') ?></label>
            <input type="text" class="form-control" name="sitelocation" id="sitelocation" placeholder="  Nama Site Location" value="<?php echo $sitelocation; ?>" />
        </div>
        <input type="hidden" name="id_sitelocation" value="<?php echo $id_sitelocation; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('sitelocation') ?>" class="btn btn-default">Cancel</a>
    </form>