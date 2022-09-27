<form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Kode Section <?php echo form_error('kode_section') ?></label>
            <input type="text" class="form-control" name="kode_section" id="kode_section" placeholder=" Kode Section" value="<?php echo $kode_section; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Section <?php echo form_error('section') ?></label>
            <input type="text" class="form-control" name="section" id="section" placeholder=" Nama Section" value="<?php echo $section; ?>" />
        </div>
        <input type="hidden" name="id_section" value="<?php echo $id_section; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('section') ?>" class="btn btn-default">Cancel</a>
    </form>