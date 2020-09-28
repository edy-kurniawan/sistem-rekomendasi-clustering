<?php
require_once 'functions.php';

    /** LOGIN ADMIN*/ 
    if ($act=='login'){
        $user = esc_field($_POST[user]);
        $pass = esc_field($_POST[pass]);
        
        $row = $db->get_row("SELECT * FROM tb_login WHERE user='$user' AND pass='$pass'");
        if($row){
            $_SESSION[login] = $row->user;
            redirect_js("halaman.php");
        } else{
            print_msg("Salah kombinasi username dan password");
        }          
    } elseif($act=='logout'){
        unset($_SESSION[login]);
        header("location:index.php");
    } else if ($mod=='password'){
        $pass1 = $_POST[pass1];
        $pass2 = $_POST[pass2];
        $pass3 = $_POST[pass3];
        
        $row = $db->get_row("SELECT * FROM tb_login WHERE user='$_SESSION[login]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg('Field bertanda * harus diisi.');
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif( $pass2 != $pass3 )
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            $db->query("UPDATE tb_login SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
            print_msg('Password berhasil diubah.', 'success');
        }
    } 
     
    
    /** LOGIN USER*/ 
    if ($act=='loginuser'){
        $loguser = esc_field($_POST[loguser]);
        $logpass = esc_field($_POST[logpass]);
        
        $row = $db->get_row("SELECT * FROM tb_loguser WHERE user='$loguser' AND pass='$logpass'");
        if($row){
            $_SESSION[loginuser] = $row->user;
            redirect_js("halamanuser.php");
        } else{
            print_msg("Salah kombinasi username dan password");
        }          
    } elseif($act=='logout'){
        unset($_SESSION[loginuser]);
        header("location:index.php");
    } else if ($mod=='password'){
        $pass1 = $_POST[pass1];
        $pass2 = $_POST[pass2];
        $pass3 = $_POST[pass3];
        
        $row = $db->get_row("SELECT * FROM tb_loguser WHERE user='$_SESSION[loginuser]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg('Field bertanda * harus diisi.');
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif( $pass2 != $pass3 )
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            $db->query("UPDATE tb_loguser SET pass='$pass2' WHERE user='$_SESSION[loginuser]'");                    
            print_msg('Password berhasil diubah.', 'success');
        }
    }


    /** user/data siswa */
    elseif($mod=='datasiswa_tambah'){
        $kode_user = $_POST['kode_user'];
        $nama_user = $_POST['nama_user'];
        $keterangan = $_POST['keterangan'];
        if($kode_user=='' || $nama_user=='')
            print_msg("Field yang bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_user WHERE kode_user='$kode_user'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("INSERT INTO tb_user (kode_user, nama_user, keterangan) VALUES ('$kode_user', '$nama_user', '$keterangan')");
            $ID = $db->insert_id;            
            $db->query("INSERT INTO tb_rating(id_user, id_ekstra, nilai) SELECT '$ID', id_ekstra, -1 FROM tb_ekstra");       
            redirect_js("halaman.php?m=datasiswa");
        }
    } else if($mod=='datasiswa_ubah'){
        $kode_user = $_POST['kode_user'];
        $nama_user = $_POST['nama_user'];
        $keterangan = $_POST['keterangan'];
        
        if($kode_user=='' || $nama_user=='')
            print_msg("Field yang bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_user WHERE kode_user='$kode_user' AND id_user<>'$_GET[ID]'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("UPDATE tb_user SET kode_user='$kode_user', nama_user='$nama_user', keterangan='$keterangan' WHERE id_user='$_GET[ID]'");
            redirect_js("halaman.php?m=datasiswa");
        }
    } else if ($act=='datasiswa_hapus'){
        $db->query("DELETE FROM tb_user WHERE id_user='$_GET[ID]'");
        $db->query("DELETE FROM tb_user WHERE id_user='$_GET[ID]'");
        header("location:halaman.php?m=datasiswa");
    } 
      
    /** ekstra */    
    if($mod=='ekstra_tambah'){
        $kode_ekstra = $_POST['kode_ekstra'];
        $nama_ekstra = $_POST['nama_ekstra'];
        
        if($kode_ekstra=='' || $nama_ekstra=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_ekstra WHERE kode_ekstra='$kode_ekstra'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("INSERT INTO tb_ekstra (kode_ekstra, nama_ekstra) 
                VALUES ('$kode_ekstra', '$nama_ekstra')");
            $ID = $db->insert_id;        
            $db->query("INSERT INTO tb_rating(id_user, id_ekstra, nilai) SELECT id_user, '$ID', -1  FROM tb_user");           
            redirect_js("halaman.php?m=ekstra");
        }                    
    } else if($mod=='ekstra_ubah'){
        $kode_ekstra = $_POST['kode_ekstra'];
        $nama_ekstra = $_POST['nama_ekstra'];
        
        if($kode_ekstra=='' || $nama_ekstra=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_ekstra WHERE kode_ekstra='$kode_ekstra' AND id_ekstra<>'$_GET[ID]'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("UPDATE tb_ekstra SET kode_ekstra='$kode_ekstra', nama_ekstra='$nama_ekstra' WHERE id_ekstra='$_GET[ID]'");
            redirect_js("halaman.php?m=ekstra");
        }    
    } else if ($act=='ekstra_hapus'){
        $db->query("DELETE FROM tb_ekstra WHERE id_ekstra='$_GET[ID]'");
        $db->query("DELETE FROM tb_rating WHERE id_ekstra='$_GET[ID]'");
        header("location:halaman.php?m=ekstra");
    } 
        
    /** RELASI ALTERNATIF */ 
    else if ($act=='rating_ubah'){
        foreach($_POST as $key => $value){
            $ID = str_replace('ID-', '', $key);
            $db->query("UPDATE tb_rating SET nilai='$value' WHERE id_rating='$ID'");
        }
        header("location:halaman.php?m=rating");
    }