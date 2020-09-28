<style>
    .text-primary {
        font-weight: bold;
    }
</style>
<div class="page-header">
    <h1>Cari Rekomendasi</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Masukkan 2 rating ekstra wajib</h3>
    </div>
    <div class="panel-body">
        
        <form method="post" action="">
            <div class="form-group">
                <label>Tapak Suci <span class="text-danger">*</span></label>
                <input class="form-control aw" type="text" name="tapaksuci" placeholder="max 10" />
            </div>
            <div class="form-group">
                <label>Hisbul Wathon<span class="text-danger">*</span></label>
                <input class="form-control aw" type="text" name="hisbulwaton" placeholder="max 10"/>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span>Cari Rekomendasi</button>
            </div>
        </form>

        <?php 
        if (isset($_POST['submit'])){ 
            $hisbulwaton     = intval($_POST['hisbulwaton']);
            $tapaksuci   = intval($_POST['tapaksuci']);
            if($hisbulwaton >=10 || $tapaksuci >=10 ){
                echo "Nilai maksimal yang di inputkan 10";
            }
            //pmr
            $pmr      =  ($hisbulwaton + $tapaksuci)/2;
            //pletonkhusus
            $array = [$hisbulwaton,  $tapaksuci, $pmr];
            rsort($array);
            $pletonkhusus     = ($array[0] + $array[1])/2;
            //voly
            $array2 = [$hisbulwaton,  $tapaksuci, $pmr, $pletonkhusus];
            rsort($array2);
            $voly     = ($array2[0] + $array2[1])/2;
            //sepakbola
            $array3 = [$hisbulwaton,  $tapaksuci, $pmr, $pletonkhusus, $voly];
            rsort($array3);
            $sepakbola     = ($array3[0] + $array3[1])/2;
            //musik
            $array4 = [$hisbulwaton,  $tapaksuci, $pmr, $pletonkhusus, $voly, $sepakbola];
            rsort($array4);
            $musik     = ($array4[0] + $array4[1])/2;
            //bhsjepang
            $array5 = [$hisbulwaton,  $tapaksuci, $pmr, $pletonkhusus, $voly, $sepakbola, $musik];
            rsort($array5);
            $bhsjepang     = ($array5[0] + $array5[1])/2;
            //futsal
            $array6 = [$hisbulwaton,  $tapaksuci, $pmr, $pletonkhusus, $voly, $sepakbola, $musik, $bhsjepang];
            rsort($array6);
            $futsal     = ($array6[0] + $array6[1])/2;

        }
        ?>

    <?php 
        if (isset($_POST['submit'])){ 
            if($hisbulwaton >=10 || $tapaksuci >=10 ){

            }else {
    ?>
        <table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Hisbul Waton</th>
					<th>Tapak Suci</th>
                    <th>PMR</th>
                    <th>Pleton Khusus</th>
					<th>Volly</th>
                    <th>Sepakbola</th>
                    <th>Musik</th>
					<th>Bahasa Jepang</th>
					<th>Futsal</th>				
				</tr>
			</thead>
			<tbody>
				<tr>
                    <td><?php echo $hisbulwaton ;?></td>
                    <td><?php echo $tapaksuci ;?></td>
                    <td><?php echo $pmr ;?></td>
                    <td><?php echo $pletonkhusus ;?></td>
                    <td><?php echo $voly ;?></td>
                    <td><?php echo $sepakbola ;?></td>
                    <td><?php echo $musik ;?></td>
                    <td><?php echo $bhsjepang ;?></td>
                    <td><?php echo $futsal ;?></td>
				</tr>
			</tbody>
        </table>
        <?php }} ?>
    
    </div>
</div>