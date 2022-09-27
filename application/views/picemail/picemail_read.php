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
        <h2 style="margin-top:0px">picemail Read</h2>
        <table class="table">
            <tr><td>Kode Pic email</td><td><?php echo $kode_picemail; ?></td></tr>
        <tr><td>Nama Pic email</td><td><?php echo $picemail; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('picemail') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </body>
</html>