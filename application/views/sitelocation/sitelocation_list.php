<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sitelocation/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sitelocation/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sitelocation'); ?>" class="btn btn-default">Reset</a>
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
        <th>Kode Site Location</th>
        <th>Nama Site Location</th>
        <th>Action</th>
            </tr><?php
            foreach ($sitelocation_data as $sitelocation)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $sitelocation->kode_sitelocation ?></td>
            <td><?php echo $sitelocation->sitelocation ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo ' | '; 
                echo anchor(site_url('sitelocation/update/'.$sitelocation->id_sitelocation),'Update',array('class' => 'btn btn-warning btn-sm'));
                echo ' | '; 
                echo anchor(site_url('sitelocation/delete/'.$sitelocation->id_sitelocation),'Delete',array('class'=> 'btn btn-danger btn-sm'),' onclick=> "javasciprt: return confirm"(\'Are You Sure ?\')"');
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