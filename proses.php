<?php
//Koneksi Ke database
$conn = mysqli_connect ("localhost", "root", "", "db_emoney");

$tarifResult = mysqli_query($conn, "SELECT * FROM tb_tarif WHERE jenis = 'harga'");

$tarif = mysqli_fetch_assoc($tarifResult);

$tarif = $tarif["tarif"];

date_default_timezone_set('Asia/Jakarta');



$harga = (int)$tarif;


if (isset($_POST['uid'])) {
    
    $id = $_POST['uid'];
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id' ");
    $cek = mysqli_num_rows($query);
    //$waktu = date('H:i:s, d-m-Y');


    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $saldo = $data['saldo'];
        $id = $data['id'];
        $no_kartu = $data['no_kartu'];
        $nama = $data['nama'];
        $jml_transaksi = $harga;
        $hasil_saldo = $saldo - $harga;

        $waktu = date('H:i:s, d-m-Y');

        if ($hasil_saldo >= 0) {
            $status = 'TRANSAKSI SUKSES';
            $feedback_saldo = number_format($hasil_saldo, 0, "", ".");
            mysqli_query($conn, "UPDATE tb_user SET saldo ='$hasil_saldo' WHERE id='$id'");
            mysqli_query($conn, "INSERT INTO tb_history VALUES ('','$id','$no_kartu','$nama','$jml_transaksi','$waktu','Sukses');");
            
        } else {
            $status = 'TRANSAKSI GAGAL';
            $hasil_saldo = $saldo;
            $feedback_saldo = number_format($hasil_saldo, 0, "", ".");
            mysqli_query($conn, "INSERT INTO tb_history VALUES ('','$id','$no_kartu','$nama','$jml_transaksi','$waktu','Gagal');");
        } 
    }

    else {
        $status = 'TIDAK TERDAFTAR';
        $feedback_saldo = '-';
    }

    $output = 
    [
        "Detail" =>
        [
            "Status" => $status,
            "Saldo Akhir" => (string)$feedback_saldo
        ]
    ];
    $json = json_encode($output);
    echo $json;
}

else {
    header("location:../login.php");
    exit;
}
?>