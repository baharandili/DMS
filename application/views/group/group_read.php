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
        <h2 style="margin-top:0px">group Read</h2>
        <table class="table">
            <tr><td>Kode Group</td><td><?php echo $kode_group; ?></td></tr>
        <tr><td>Nama Group</td><td><?php echo $grp; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('group') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </body>
</html>