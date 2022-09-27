<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Group <?php echo form_error('kode_group') ?></label>
            <input type="text" class="form-control" name="kode_group" id="kode_group" placeholder=" Kode Group" value="<?php echo $kode_group; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Group <?php echo form_error('grp') ?></label>
            <input type="text" class="form-control" name="grp" id="grp" placeholder=" Nama Group" value="<?php echo $grp; ?>" />
        </div>
        <input type="hidden" name="id_group" value="<?php echo $id_group; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('group') ?>" class="btn btn-default">Cancel</a>
    </form>