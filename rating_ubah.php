<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_user WHERE id_user='".$id."'"); 
?>
<div class="page-header">
    <h1>Ubah Nilai Rating &raquo; <small><?=$row->nama_user?></small></h1>
</div>
<div class="row">
    <div class="col-sm-4">
        <form method="post" action="aksi.php?act=rating_ubah&ID=<?=$row->kode_user?>">
        <?php
        $rows = $db->get_results("SELECT ra.id_rating, k.kode_ekstra, k.nama_ekstra, ra.nilai FROM tb_rating ra INNER JOIN tb_ekstra k ON k.id_ekstra=ra.id_ekstra  WHERE id_user='$_GET[ID]' ORDER BY kode_ekstra");
        foreach($rows as $row):?>
        <div class="form-group">
            <label><?=$row->nama_ekstra?></label>    
            <input class="form-control" type="text" name="ID-<?=$row->id_rating?>" value="<?=$row->nilai?>" />
        </div>
        <?php endforeach?>
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        <a class="btn btn-danger" href="?m=rating"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>