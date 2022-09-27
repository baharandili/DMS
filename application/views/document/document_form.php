<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
            <label for="varchar">Kode Dokumen <?php echo form_error('kode_dokumen') ?></label>
            <input type="text" class="form-control" name="kode_dokumen" id="kode_dokumen" placeholder="Kode Dokumen" readonly="kode_dokumen"value="<?php echo $kode_dokumen; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar"> Branch <?php echo form_error('branch') ?></label>
            <select name="branch" class="form-control">
                <option value="<?php echo $branch ?>"><?php echo $branch ?></option>
                <?php 
                $sql = $this->db->get('branch');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->branch ?>"><?php echo $row->branch ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar"> Department <?php echo form_error('department') ?></label>
            <select name="department" class="form-control">
                <option value="<?php echo $department ?>"><?php echo $department ?></option>
                <?php 
                $sql = $this->db->get('department');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->department ?>"><?php echo $row->department ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar"> Section <?php echo form_error('section') ?></label>
            <select name="section" class="form-control">
                <option value="<?php echo $section ?>"><?php echo $section ?></option>
                <?php 
                $sql = $this->db->get('section');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->section ?>"><?php echo $row->section ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar"> Category <?php echo form_error('category') ?></label>
            <select name="category" class="form-control">
                <option value="<?php echo $category ?>"><?php echo $category ?></option>
                <?php 
                $sql = $this->db->get('category');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->category ?>"><?php echo $row->category ?></option>
            <?php } ?>
            </select>
        </div>
       <div class="form-group">
            <label for="varchar"> Group <?php echo form_error('grp') ?></label>
            <select name="grp" class="form-control">
                <option value="<?php echo $grp ?>"><?php echo $grp ?></option>
                <?php 
                $sql = $this->db->get('grp');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->grp ?>"><?php echo $row->grp ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar"> Site Location <?php echo form_error('sitelocation') ?></label>
            <select name="sitelocation" class="form-control">
                <option value="<?php echo $sitelocation ?>"><?php echo $sitelocation ?></option>
                <?php 
                $sql = $this->db->get('sitelocation');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->sitelocation ?>"><?php echo $row->sitelocation ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar"> Pic Email <?php echo form_error('picemail') ?></label>
            <select name="picemail" class="form-control">
                <option value="<?php echo $picemail ?>"><?php echo $picemail ?></option>
                <?php 
                $sql = $this->db->get('picemail');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->picemail ?>"><?php echo $row->picemail ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Tanggal Dokumen <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control tgl" name="tanggal" id="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
        <input type="hidden" name="id_document" value="<?php echo $id_document; ?>" /> 
         <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('id_document') ?>" class="btn btn-default">Cancel</a>
    </form>