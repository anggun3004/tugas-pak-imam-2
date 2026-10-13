<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $merek       = $_POST['merek'];
    $stok        = $_POST['stok'];
    $harga       = $_POST['harga'];

    try {
        $sql = "INSERT INTO produk (nama_barang, merek, stok, harga) VALUES (:nama, :merek, :stok, :harga)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nama'  => $nama_barang,
            ':merek' => $merek,
            ':stok'  => $stok,
            ':harga' => $harga
        ]);

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Gagal menyimpan: " . $e->getMessage();
    }
}
?>