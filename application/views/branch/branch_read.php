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
        <h2 style="margin-top:0px">Branch Read</h2>
        <table class="table">
            <tr><td>Kode Branch</td><td><?php echo $kode_branch; ?></td></tr>
	    <tr><td>Nama Branch</td><td><?php echo $branch; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('branch') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>