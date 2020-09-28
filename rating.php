<?php
$rows = $db->get_results("SELECT a.id_user, ra.id_ekstra, ra.nilai            
        FROM tb_rating ra 
        	INNER JOIN tb_user a ON a.id_user = ra.id_user
        WHERE nama_user LIKE '%".esc_field($_GET['q'])."%'
        ORDER BY ra.id_user, ra.id_ekstra");
$data = array();   
     
foreach($rows as $row){
    $data[$row->id_user][$row->id_ekstra]  = $row->nilai;    
}
?>
<div class="page-header">
    <h1>Nilai Rating</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="rating" />
    <div class="form-group">
        <input class="form-control" type="text" name="q" value="<?=$_GET['q']?>" />
    </div>
    <div class="form-group">
        <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
    </div>
</form>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama User</th>
            <?php foreach($KRITERIA as $key => $val):?>
            <th><?=$val['nama']?></th>
            <?php endforeach?>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $key => $val):?>
    <tr>
        <td><?=$ALTERNATIF[$key]['kode']?></td>
        <td><?=$ALTERNATIF[$key]['nama'];?></td>
        <?php foreach($val as $k => $v):?>
        <td><?=$v?></td>               
        <?php endforeach?>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=rating_ubah&ID=<?=$key?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>        
        </td>
    </tr>
    <?php endforeach;
    ?>
    </tbody>
    </table>
</div>
</div>