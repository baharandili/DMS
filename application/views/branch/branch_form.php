<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Branch <?php echo form_error('kode_branch') ?></label>
            <input type="text" class="form-control" name="kode_branch" id="kode_branch" placeholder=" Kode Branch" value="<?php echo $kode_branch; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder=" Nama Branch" value="<?php echo $branch; ?>" />
        </div>
        <input type="hidden" name="id_branch" value="<?php echo $id_branch; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('branch') ?>" class="btn btn-default">Cancel</a>
    </form>