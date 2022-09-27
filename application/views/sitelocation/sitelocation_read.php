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
        <h2 style="margin-top:0px">sitelocation Read</h2>
        <table class="table">
            <tr><td>Kode Site Location</td><td><?php echo $kode_sitelocation; ?></td></tr>
        <tr><td>Nama Site Location</td><td><?php echo $sitelocation; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('sitelocation') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </body>
</html>