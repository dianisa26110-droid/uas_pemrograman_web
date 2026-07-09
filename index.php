<?php 
include_once("config.php"); 
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC"); 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8">
    <title>MILITARY SYSTEM - Data Alat</title> 
    <style> 
        body { 
            font-family: 'Courier New', Courier, monospace; 
            margin: 30px; 
            background-color: #2b3129; 
            color: #e2e8dd; 
        } 

        h2 {
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 3px double #556b2f;
            padding-bottom: 15px;
            margin-top: 0;
            margin-bottom: 20px;
            color: #cbd5e1;
        }
        
        /* Tombol Tambah ala Papan Komando */
        .btn-tambah {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4b5320; 
            color: #f5f5dc; 
            text-decoration: none;
            border: 2px solid #3b4218;
            border-radius: 4px;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            box-shadow: 3px 3px 0px #1c210c;
            transition: all 0.2s ease;
        }
        .btn-tambah:hover { 
            background-color: #5c6628; 
            box-shadow: 1px 1px 0px #1c210c;
            transform: translate(2px, 2px);
        }

        /* Desain Tabel Kamuflase Militer */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
            box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
            border: 2px solid #3b4218;
        } 

        th { 
            background-color: #3b4218; 
            color: #d4af37; 
            padding: 14px; 
            text-align: left; 
            text-transform: uppercase;
            font-size: 15px;
            border-bottom: 3px solid #556b2f;
            letter-spacing: 1px;
        } 

        td { 
            padding: 12px; 
            border-bottom: 1px solid #3f473b; 
            font-size: 14px;
            font-weight: bold;
        }
        tr:nth-child(odd) { background-color: #353c32; } 
        tr:nth-child(even) { background-color: #3d453a; } 
        tr:hover { background-color: #4c5649; } 

        .btn-aksi {
            text-decoration: none;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 12px;
        }
        .btn-edit { color: #8da9c4; }
        .btn-edit:hover { text-decoration: underline; color: #b4cbe3; }
        
        .btn-delete { color: #cd5c5c; }
        .btn-delete:hover { text-decoration: underline; color: #ff8484; }
    </style> 
</head> 
<body> 

    <h2>🪖 Sie Har Alkes - Inventarisasi Alat</h2>

    <a href="add.php" class="btn-tambah">[+] REGISTRASI ALAT BARU</a>

    <table> 
        <tr> 
            <th>Nama Alat</th>
            <th>Tahun Taktis</th>
            <th>Merek Vendor</th>
            <th>Lokasi Pos</th>
            <th>Otorisasi Aksi</th> 
        </tr> 
        <?php 
        while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>"; 
            echo "<td>⚠️ ".$user_data['nama_alat']."</td>"; 
            echo "<td>".$user_data['tahun']."</td>"; 
            echo "<td>".$user_data['merek']."</td>"; 
            echo "<td>🎖️ ".$user_data['lokasi']."</td>"; 
            echo "<td>
                    <a href='edit.php?id=$user_data[id]' class='btn-aksi btn-edit'>RE-EDIT</a> | 
                    <a href='delete.php?id=$user_data[id]' class='btn-aksi btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin MEMUSHNAHKAN data ini?\")'>DELETE</a>
                  </td>";
            echo "</tr>"; 
        } 
        ?> 
    </table> 
</body> 
</html>