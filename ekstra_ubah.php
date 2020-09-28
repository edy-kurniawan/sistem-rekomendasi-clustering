<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_ekstra WHERE id_ekstra='".$id."'"); 
?>
<div class="page-header">
    <h1>Ubah Ekstra</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=ekstra_ubah&ID=<?=$row->id_ekstra?>">
            <div class="form-group">
                <label>Kode Ekstra <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_ekstra" value="<?=$row->kode_ekstra?>"/>
            </div>
            <div class="form-group">
                <label>Nama Ekstra <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_ekstra" value="<?=$row->nama_ekstra?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=ekstra"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>