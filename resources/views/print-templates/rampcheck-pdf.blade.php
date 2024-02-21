<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rampcheck</title>
    <meta charset="utf-8">
    <style>
        * {
            border: 0px solid; 
        }
        body {
            margin: 10px;
        }
        table.full {
            width: 100%;
            border-collapse: collapse;
        }
        #judul{
            text-align:center;
        }
        #halaman{
            width: auto; 
            height: auto; 
            padding-left:50px;
            padding-right:10px;
        }
        #content {
            margin-bottom:50px;
            text-align: justify;
        }
        #header {
            text-align: center;
        }
        #header-logo {
            position: absolute;
            width: 100px;
            height: 100px;
        }
        #footer-right{
            width: 40%;
            float: right;
        }
        #footer-left{
            width: 40%;
            float: left;
            margin-left:30px;
        }
        h1,h2,h3,h4 {
            margin:0px;
        }
        tr,td {
            padding: 5px;
        }

    </style>
</head>
<?php 

$day = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
$mount = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$tgl = date('d');
$bulan = date('m');
$tahun = date('Y');

?>
<body>
    <div id="header-logo">
        <img src="" alt="" width="100" height="100">
    </div>
    <div id="header">
        <h2>header</h2>
    <hr>
    </div>

    <div id="judul">
        <h3><u>DAFTAR RAMPCHECK</u></h3>
    </div><br>
    <table class="full" border="1">
        <thead>
            <tr style="background-color:#dedede;">
                <th>header table</th>
                <th>header table</th>
                <th>header table</th>
                <th>header table</th>
                <th>header table</th>
                <th>header table</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>isian</td>
                <td>isian</td>
                <td>isian</td>
                <td>isian</td>
                <td>isian</td>
                <td>isian</td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div id="footer-right">
        <p>footer right</p>
    </div>
</body>
</html>


