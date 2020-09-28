<style>    
    .text-primary{font-weight: bold;}
</style>
<div class="page-header">
    <h1>Cari Rekomendasi</h1>
</div>
<?php
    $c = $db->get_results("SELECT * FROM tb_rating WHERE nilai < 0 ");
    if (!$ALTERNATIF || !$KRITERIA):
        echo "Tampaknya anda belum mengatur Data Siswa dan Ekstra. Silahkan tambahkan minimal 3 Data siswa dan 2 Ekstra.";
    elseif ($c):
        echo "Tampaknya anda belum mengatur Data Rating. Silahkan atur pada menu <strong>Data Rating</strong>.";
    else:
        $data = get_data();?>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Hasil Analisa</strong></div>
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped table-hover">
                <thead><tr>
                    <th rowspan="2">Data Siswa</th>                
                    <th class="text-center" colspan="<?=count($KRITERIA)?>">Ekstra</th>                
                </tr>
                <tr>
                    <?php foreach($KRITERIA as $key => $val):?>
                    <td><?=$val['nama']?></td>
                    <?php endforeach?>
                </tr></thead>
                <?php foreach($data as $key => $val):?>
                <tr>
                    <td><?=$ALTERNATIF[$key]['kode']?></td>
                    <?php foreach($val as $k => $v):?>
                    <td><?=$v?></td>
                    <?php endforeach?>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Masukkan 2 rating ekstra wajib</h3>
        </div>
        <div class="panel-body">
            <?php
            $succes = false;
            if($_POST){
                $jumlah = $_POST['jumlah'];
                $maksimum = $_POST['maksimum'];    
                if($jumlah < 0 || $maksimum < 10){
                    print_msg('Masukkan minimal 2 clustering, dan 10 iterasi');
                } else {
                    $succes = true;
                }
            }
            ?>
            <form method="post" action="?m=hitung#hasil">
                <div class="form-group">
                    <label>Tapak Suci <span class="text-danger">*</span></label>
                    <input class="form-control aw" type="text" name="jumlah" value="<?=set_value($_POST['jumlah'],)?>" />
                </div>
                <div class="form-group">
                    <label>Hisbul Wathon<span class="text-danger">*</span></label>
                    <input class="form-control aw" type="text" name="maksimum" value="<?=set_value($_POST['maksimum'],)?>" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span>Cari Rekomendasi</button>
                </div>
            </form>
        </div>
    </div>        
    <?php     
    if($succes)
        include 'hasil.php';
    ?>            
<?php endif?>

