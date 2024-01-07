<?php
	require_once 'header_template.php';

    $query_select = 'select * from users';
    $run_query_select = mysqli_query($conn, $query_select);


    /* Cek Jika Ada Parameter Delete */
    if(isset($_GET['delete'])){

    /* Proses Delete Data */
    $query_delete = 'delete from users where iduser = "'.$_GET['delete'].'" ';
    $run_query_delete = mysqli_query($conn, $query_delete);

    if($run_query_delete){
        echo "<script>window.location = 'users.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus')</script>";
    }

    }
?>

<div class="content">
    <div class="container">

        <h3 class="page-title">Users</h3>

        <div class="card">
        <a href="users_add.php" class="btn-t" title="Tambah Data"><i class='fa fa-plus'></i></a>
        
        <table class="table">
            <thead>
                <tr>
                    <th width="50">NO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th width="100">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($run_query_select) > 0){ ?>
                <?php $nomor = 1; ?>
                <?php while($row = mysqli_fetch_array($run_query_select)){ ?>
                <tr>
                    <td align="center"><?= $nomor++ ?></td>
                    <td><?= $row['namalengkap'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td align="center">
                        <a href="users_edit.php?id=<?= $row['iduser'] ?>" class="btn-t" title="Edit Data"><i class='fa fa-edit'></i></a>
                        <a href="?delete=<?= $row['iduser'] ?>" class="btn-t" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')" title="Hapus Data"><i class='fa fa-times'></i></a>
                    </td>
                </tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="4">Data Tidak Ada.</td>
                </tr>
                <?php } ?>   
            </tbody>
        </table>   

        </div>

    </div>
</div>

<?php require_once 'footer_template.php' ?>