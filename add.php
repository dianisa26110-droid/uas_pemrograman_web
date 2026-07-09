<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Alat</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 300px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-submit:hover { background-color: #218838; }
        .btn-kembali { display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Tambah Alat Baru</h2>
    
    <form action="add.php" method="post" name="form1">
        <div class="form-group">
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" required>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" min="1900" max="2099" required>
        </div>
        <div class="form-group">
            <label>Merek</label>
            <input type="text" name="merek" required>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" required>
        </div>
        <button type="submit" name="Submit" class="btn-submit">Simpan Alat</button>
    </form>

    <a href="index.php" class="btn-kembali">← Kembali ke Halaman Utama</a>

    <?php
    // Jika form disubmit, masukkan data ke database.
    if(isset($_POST['Submit'])) {
        $nama_alat = $_POST['nama_alat'];
        $tahun = $_POST['tahun'];
        $merek = $_POST['merek'];
        $lokasi = $_POST['lokasi'];
        
        // Sertakan file koneksi database
        include_once("config.php");
                
        // Query untuk memasukkan data ke tabel 'alat'
        $query = "INSERT INTO alat(nama_alat, tahun, merek, lokasi) VALUES('$nama_alat', '$tahun', '$merek', '$lokasi')";
        $result = mysqli_query($mysqli, $query);
        
        if($result) {
            echo "<br><p style='color: green; font-weight: bold;'>Data alat berhasil ditambahkan! <a href='index.php'>Lihat Data</a></p>";
        } else {
            echo "<br><p style='color: red; font-weight: bold;'>Gagal menambahkan data: " . mysqli_error($mysqli) . "</p>";
        }
    }
    ?>
    
</body>
</html>