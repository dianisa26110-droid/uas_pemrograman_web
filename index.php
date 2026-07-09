<?php 
include_once("config.php"); 
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC"); 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Sim Rs - Data Alat</title> 
    <style> 
        .header { background-color: orange; color: white; } 
        table { width: 80%; border-collapse: collapse; margin-top: 10px; } 
        th, td { border: 1px solid black; padding: 8px; text-align: left; } 
    </style> 
</head> 
<body> 

    <div style="margin-bottom: 15px;">
        <a href="add.php" style="font-size: 20px; font-weight: bold; color: green; text-decoration: underline;">
            [ + TAMBAH ALAT BARU ]
        </a>
    </div>

    <table> 
        <tr class="header"> 
            <th>Nama Alat</th><th>Tahun</th><th>Merek</th><th>Lokasi</th><th>Aksi</th> 
        </tr> 
        <?php 
        while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>"; 
            echo "<td>".$user_data['nama_alat']."</td>"; 
            echo "<td>".$user_data['tahun']."</td>"; 
            echo "<td>".$user_data['merek']."</td>"; 
            echo "<td>".$user_data['lokasi']."</td>"; 
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td>";
            echo "</tr>"; 
        } 
        ?> 
    </table> 
</body> 
</html>