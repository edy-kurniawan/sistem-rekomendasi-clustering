<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();
include 'config.php';
include'includes/ez_sql_core.php';
include'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
include'includes/general.php';
$mod = $_GET['m'];
$act = $_GET['act'];

$rows = $db->get_results("SELECT id_user, kode_user, nama_user FROM tb_user ORDER BY id_user");
foreach($rows as $row){
    $ALTERNATIF[$row->id_user]['kode'] = $row->kode_user;
    $ALTERNATIF[$row->id_user]['nama'] = $row->nama_user;
}

$rows = $db->get_results("SELECT id_ekstra, kode_ekstra, nama_ekstra FROM tb_ekstra ORDER BY kode_ekstra");
foreach($rows as $row){
    $KRITERIA[$row->id_ekstra] = array(
        'kode'=>$row->kode_ekstra,
        'nama'=>$row->nama_ekstra,
    );
}

function get_komposisi(){
    global $ALTERNATIF;
    $arr = array();
    $keys = array_keys($ALTERNATIF);
    
    foreach($keys as $key){
        foreach($keys as $k){
            if($key!=$k)
                $arr[$key][$k] = 1;
        }
    }    
    
    $result = array();
    foreach($arr as $key => $val){
        foreach($val as $k => $v){
            $result[] = array($key, $k);
        }
    }
            
    return $result;
}

function get_normal( $data = array(), $komposisi = array()){
    $arr = array();
    
    global $KRITERIA;
    
    foreach($KRITERIA as $key => $val){
        foreach($komposisi as $k => $v){
            $arr[$key][] = array( $v[0], $v[1]);
        }
    }
    return $arr;
}

function get_selisih($data = array(), $normal = array()){
    $arr = array();
    
    foreach($normal as $key => $val){
        foreach($val as $k => $v){
            $arr[$key][$k] = $data[$v[0]][$key] - $data[$v[1]][$key];
        }
    }
    return $arr;
}

function get_preferensi($selisih = array()){
    global $KRITERIA;
    foreach($selisih as $key => $val){
        foreach($val as $k => $v){
            $arr[$key][$k] = hitung_pref($KRITERIA[$key]['tipe'], $KRITERIA[$key]['par_q'], $KRITERIA[$key]['par_p'], $KRITERIA[$key]['minmax'], $v);
        }
    }
    return $arr;
}

function get_index_pref($preferensi = array()){
    global $KRITERIA;
    $arr = array();
    foreach($preferensi as $key => $val){
        foreach($val as $k => $v){        
            $arr[$key][$k] = $v * $KRITERIA[$key]['bobot'];
        }
    }    
    return $arr;
}

function hitung_pref($tipe, $q, $p, $minmax, $jarak){
    $minmax = strtolower($minmax);
    if($minmax=='minimasi' && $jarak > 0)
        return 0;
    if($minmax=='maksimasi' && $jarak < 0)
        return 0;
    
    if($tipe==5){
        if(abs($jarak) <= $q)
            return 0;
        if(abs($jarak) > $q && abs($jarak) <= $p)
            return (abs($jarak) - $q) / ($p - $q);
        if($p < abs($jarak))
            return 1;
        return -1;
    } else if($tipe==4){
        if(abs($jarak) <= $q)
            return 0;
        if(abs($jarak) > $q && abs($jarak) <= $p)
            return 0.5;
        if($p < abs($jarak))
            return 1;
        return -1;
    } else if($tipe==3){
        if($jarak >= $p * -1 && $jarak<=$p)
            return $jarak / $p;
        if($jarak < $p * -1 || $jarak >= $p)
            return 0;
        return -1;
    } else if($tipe==2){
        if($jarak >= $q * -1 && $jarak<=$q)
            return 0;
        if($jarak < $q * -1 || $jarak >= $q)
            return 1;
        return -1;
    } else if($tipe==1){
        if($jarak == 0)
            return 0;
        elseif($jarak != 0)
            return 1;  
        
        return -1;                  
    } else {
        return -1;
    } 
}

function get_total_indeks_pref($index_pref = array()){
    $arr = array();
    foreach($index_pref as $key => $val){
        foreach($val as $k => $v){
            $arr[$k]+= $v;
        }
    }
    return $arr;
}

function get_matriks($komposisi = array(), $total_index_pref = array()){
    $arr = array();
    global $ALTERNATIF;
    foreach($ALTERNATIF as $key => $val){
        foreach($ALTERNATIF as $k => $v){
            $arr[$key][$k] = 0;
        }
    }
    
    foreach($komposisi as $key => $val){
        $arr[$val[0]][$val[1]] = $total_index_pref[$key];
    }
    return $arr;
}

function get_total_kolom($matriks = array()){
    $arr = array();
    foreach($matriks as $key => $val){
        foreach($val as $k => $v){
            $arr[$k]+=$v;
        }
    }
    return $arr; 
}

function get_total_baris($matriks = array()){
    $arr = array();
    foreach($matriks as $key => $val){
        foreach($val as $k => $v){
            $arr[$key]+=$v;
        }
    }
    return $arr;
}

function get_leaving($matriks = array(), $total_baris = array()){
    $arr = array();
    foreach($matriks as $key => $val){
        $arr[$key] = $total_baris[$key] / (count($val) - 1);
    }
    return $arr;
}

function get_entering($matriks = array(), $total_kolom = array()){
    $arr = array();
    foreach($matriks as $key => $val){
        $arr[$key] = $total_kolom[$key] / (count($val) - 1);
    }
    return $arr;
}


function get_net_flow($leaving = array(), $entering = array()){
    $arr = array();
    foreach($leaving as $key => $val){
        $arr[$key] = $val - $entering[$key];
    }
    return $arr;
}

function get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}

function get_data(){
    global $db;
    $rows = $db->get_results("SELECT a.id_user, k.id_ekstra, ra.nilai
        FROM tb_user a 
        	INNER JOIN tb_rating ra ON ra.id_user=a.id_user
        	INNER JOIN tb_ekstra k ON k.id_ekstra=ra.id_ekstra
        ORDER BY a.id_user, k.id_ekstra");
    $data = array();
    foreach($rows as $row){
        $data[$row->id_user][$row->id_ekstra] = $row->nilai;
    }
    return $data;
}

function get_min_max_option($selected = ''){
    $atribut = array('Minimasi'=>'Minimasi', 'Maksimasi'=>'Maksimasi');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}