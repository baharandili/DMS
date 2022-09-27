<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">document Read</h2>
        <table class="table">
        <tr><td>Kode Dokumen</td><td><?php echo $kode_dokumen; ?></td></tr>
	    <tr><td>Branch</td><td><?php echo $branch; ?></td></tr>
	    <tr><td>Department</td><td><?php echo $department; ?></td></tr>
	    <tr><td>Section</td><td><?php echo $section; ?></td></tr>
        <tr><td>Category</td><td><?php echo $category; ?></td></tr>
        <tr><td>Group</td><td><?php echo $grp; ?></td></tr>
        <tr><td>Site Location</td><td><?php echo $sitelocation; ?></td></tr>
        <tr><td>Pic Email</td><td><?php echo $picemail; ?></td></tr>
        <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
        <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('document') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>