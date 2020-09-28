<div class="page-header">
    <h1> Data Siswa</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="datasiswauser" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Refresh</a>
        </div>
        
    </form>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama user</th>
        <th>Keterangan</th>
        
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_user WHERE nama_user LIKE '%$q%' ORDER BY id_user");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_user?></td>
    <td><?=$row->nama_user?></td>
    <td><?=$row->keterangan?></td>
    
</tr>
<?php endforeach; ?>
</table>
</div>
</div>