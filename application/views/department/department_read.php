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
        <h2 style="margin-top:0px">department Read</h2>
        <table class="table">
            <tr><td>Kode Department</td><td><?php echo $kode_department; ?></td></tr>
        <tr><td>Nama Department</td><td><?php echo $department; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('department') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </body>
</html>