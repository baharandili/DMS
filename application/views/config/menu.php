<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU UTAMA</b></li>
                <li class="list-group-item"><a href="<?php echo base_url()?>"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                
                <?php 
                if ($this->session->userdata('level') == 'admin') {
                 ?>
               
                <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-th-large"></i>Data Master  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                     
                      <a href="branch" class="list-group-item"> Branch </a>
                      <a href="department" class="list-group-item"> Department </a>
                      <a href="section" class="list-group-item"> Section </a>
                      <a href="category" class="list-group-item"> Category </a>
                      <a href="group" class="list-group-item"> Group </a>
                      <a href="sitelocation" class="list-group-item"> Site Location </a>
                      <a href="picemail" class="list-group-item"> PIC Email </a>
                    </li>
                </li>
                <li>
                  <a href="#demo5" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-folder-open"></i> Tansaction  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo5">
                      <a href="document" class="list-group-item">Dokumen</a>
                    </li>
                </li>
                <li class="list-group-item"><a href="users"><i class="glyphicon glyphicon-user"></i>Manajemen User </a></li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Logout </a></li>

                <?php 
                } elseif ($this->session->userdata('level') == 'DMSOfficer') {
                 ?>

                <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-th-large"></i>Data Master  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                    <a href="branch" class="list-group-item"> Branch </a>
                      <a href="department" class="list-group-item"> Department </a>
                      <a href="section" class="list-group-item"> Section </a>
                      <a href="category" class="list-group-item"> Category </a>
                      <a href="group" class="list-group-item"> Group </a>
                      <a href="sitelocation" class="list-group-item"> Site Location </a>
                      <a href="picemail" class="list-group-item"> PIC Email </a>
                    </li>
                </li>
                <li>
                  <a href="#demo5" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-folder-open"></i>Tansaction  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo5">
                      <a href="document" class="list-group-item">Dokumen</a>
                    </li>
                </li>
                <!-- <li class="list-group-item"><a href="users"><i class="glyphicon glyphicon-user"></i>Manajemen User </a></li> -->
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Logout </a></li>

                <?php 
                } elseif ($this->session->userdata('level') == 'petugas gudang') {
                 ?>

                <!-- <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-th-large"></i>Data Master  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                      <a href="barang" class="list-group-item"> Data Barang</a>
                      <a href="jenis_barang" class="list-group-item"> Jenis Barang</a>
                      <a href="merk_barang" class="list-group-item"> Merk Barang</a>
                      <a href="supplier" class="list-group-item"> Supplier</a>
                      
                    </li>
                </li> -->
                <li>
                  <a href="#demo5" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-folder-open"></i>Data Transaksi  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo5">
                      <a href="barang_masuk" class="list-group-item">Transaksi Barang Masuk</a>
                      <a href="barang_keluar" class="list-group-item">Transaksi Barang Keluar</a>
                      <a href="app/penjualan" class="list-group-item">Pemesanan Ke Supplier</a>
                      
                    </li>
                </li>
                <!-- <li class="list-group-item"><a href="users"><i class="glyphicon glyphicon-user"></i>Manajemen User </a></li> -->
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Logout </a></li>

                <?php 
                } elseif ($this->session->userdata('level') == 'supplier') {
                 ?>



                <li class="list-group-item"><a href="app/pemesanan_supplier"><i class="glyphicon glyphicon-tasks"></i>Daftar Pesanan Barang </a></li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Logout </a></li>

                <?php } ?>

                <!-- <li>
                  <a href="#demo5" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-home"></i>Proses  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo5">
                      <a href="<?php echo base_url('user')?>" class="list-group-item">2.1 Data User</a>
                      <a href="<?php echo base_url('app/history')?>" class="list-group-item">2.2 Hasil Diagnosa</a>
                    </li>
                </li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/konsultasi"><i class="glyphicon glyphicon-home"></i>Konsultasi </a></li> -->
                
               <!--  <li class="list-group-item"><a href="<?php echo base_url()?>app/konsultasi"><i class="glyphicon glyphicon-home"></i>Konsultasi </a></li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/history"><i class="glyphicon glyphicon-home"></i>History Diagnosa </a></li>

                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-home"></i>Logout </a></li> -->

              </ul>
          </div>