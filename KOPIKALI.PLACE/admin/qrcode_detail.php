<?php
	require_once 'header_template.php';

    $query_select = 'select * from qrcode where idqrcode = "'.$_GET['id'].'"';
    $run_query_select = mysqli_query($conn, $query_select);
    $d = mysqli_fetch_object($run_query_select);

?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Lihat QR Code</h3>

        <div class="card">

            <img src="../uploads/qrcode/qrcode.png" width="200">

            <hr style="margin-bottom: 10px;">

            <button type="button" onclick="window.location = 'qrcode.php'" class="btn-back">Kembali</button>

        </div>

    </div>
</div>

<?php require_once 'footer_template.php' ?>