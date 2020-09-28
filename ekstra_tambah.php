<div class="page-header">
    <h1>Tambah Ekstra</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=ekstra_tambah">
            <div class="form-group">
                <label>Kode ekstra <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_ekstra" value="<?=$_POST['kode_ekstra']?>"/>
            </div>
            <div class="form-group">
                <label>Nama ekstra <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_ekstra" value="<?=$_POST['nama_ekstra']?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=ekstra"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>