<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Category <?php echo form_error('kode_category') ?></label>
            <input type="text" class="form-control" name="kode_category" id="kode_category" placeholder=" Kode Category" value="<?php echo $kode_category; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Category <?php echo form_error('category') ?></label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Nama Category" value="<?php echo $category; ?>" />
        </div>
        <input type="hidden" name="id_category" value="<?php echo $id_category; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('category') ?>" class="btn btn-default">Cancel</a>
    </form>