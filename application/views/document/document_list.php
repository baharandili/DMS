<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('document/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('document/index'); ?>" class="form-inline" method="get">
                    <div class="input-grp">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-grp-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('document'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Kode Dokumen</th>
        <th>Branch</th>
        <th>Department</th>
        <th>Section</th>
        <th>Category</th>
        <th>group </th>
        <th>Location</th>
        <th>Pic Email</th>
        <th>Tanggal Dokumen</th>
        <th>Deskripsi</th>
        <th>Action</th>
             </tr><?php
            foreach ($document_data as $document)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $document->kode_dokumen ?></td>
            <td><?php echo $document->branch ?></td>
            <td><?php echo $document->department ?></td>
            <td><?php echo $document->section ?></td>
            <td><?php echo $document->category ?></td>
            <td><?php echo $document->grp ?></td>
            <td><?php echo $document->sitelocation ?></td>
            <td><?php echo $document->picemail ?></td>
            <td><?php echo $document->tanggal ?></td>
            <td><?php echo $document->deskripsi ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo ' | '; 
                echo anchor(site_url('document/update/'.$document->id_document),'Update',array('class' => 'btn btn-warning btn-sm'));  
                echo ' | '; 
                echo anchor(site_url('document/delete/'.$document->id_document),'Delete',array('class'=> 'btn btn-danger btn-sm'),' onclick=> "javasciprt: return confirm"(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>