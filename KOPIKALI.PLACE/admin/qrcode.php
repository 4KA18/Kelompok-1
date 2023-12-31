<?php
	require_once 'header_template.php';

    $query_select = 'select * from qrcode';
    $run_query_select = mysqli_query($conn, $query_select);


    /* Cek Jika Ada Parameter Delete */
    if(isset($_GET['delete'])){

        $query_select_foto = 'select qrname from qrcode where idqrcode = "'.$_GET['delete'].'"';
        $run_query_select_foto = mysqli_query($conn, $query_select_foto);
        $d = mysqli_fetch_object($run_query_select_foto);

    /* Proses Delete Data */
    $query_delete = 'delete from qrcode where idqrcode = "'.$_GET['delete'].'" ';
    $run_query_delete = mysqli_query($conn, $query_delete);

    if(file_exists('../uploads/qrcode/' . $d->qrname)){
            unlink('../uploads/qrcode/' . $d->qrname);
        }

    if($run_query_delete){
        echo "<script>window.location = 'qrcode.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus')</script>";
    }

    }
?>

<div class="content">
    <div class="container">

        <h3 class="page-title">QR Code</h3>

        <div class="card">
        <a href="qrcode_add.php" class="btn-t" title="Tambah Data"><i class='fa fa-plus'></i></a>
        
        <table class="table">
            <thead>
                <tr>
                    <th width="50">NO</th>
                    <th>URL</th>
                    <th width="100">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($run_query_select) > 0){ ?>
                <?php $nomor = 1; ?>
                <?php while($row = mysqli_fetch_array($run_query_select)){ ?>
                <tr>
                    <td align="center"><?= $nomor++ ?></td>
                    <td><?= $row['url'] ?></td>
                    <td align="center">
                        <a href="qrcode_detail.php?id=<?= $row['idqrcode'] ?>" class="btn-t" title="Detail Data"><i class='fa fa-eye'></i></a>
                        <a href="?delete=<?= $row['idqrcode'] ?>" class="btn-t" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')" title="Hapus Data"><i class='fa fa-times'></i></a>
                    </td>
                </tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="3">Data Tidak Ada.</td>
                </tr>
                <?php } ?>   
            </tbody>
        </table>   

        </div>

    </div>
</div>

<?php require_once 'footer_template.php' ?>