<?php 
    include 'koneksi.php';
    $query = $koneksi->prepare("SELECT * FROM provider 
                                JOIN supplier ON provider.id_supplier = supplier.id_supplier
                                JOIN tarifpulsa ON provider.id_tarif = tarifpulsa.id_tarif ");
    $query->execute();
    $data = $query->fetchAll();

 ?>

<html>

    <head>
    <title>HASBI PONSEL</title>
    <link rel="stylesheet"href="assets/css/style.css">
    </head>

<body>
    <div class="utama">
    <!--header-->
        <div>
            <?php include "header.php"; ?>
        </div>

        <!--menu-->
        <div>
            <?php include "menu.php"; ?>
        </div>
    
    <div class="isi">

    
    <br>
    <br>
            <h2 align="center">Data Provider</h2>
            <br>
            
            <thead>
            <table>
                <div class="tr1">
                <tr>
                    <th>NO</th>
                    <th>ID PROVIDER</th>
                    <th>NAMA PROVIDER</th>
                    <th>NAMA SUPPLIER</th>
                    <th>ID TARIF</th>
                    <th>HARGA JUAL</th>
                    <th>AKSI</th>
                    
                </tr> 
                </div>
            </thead>

                <?php 
                $no = 1;
                ?>

                <?php foreach ($data as $value): ?>
            <tbody>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $value['id_provider'] ?></td>
                    <td><?php echo $value['nama_provider'] ?></td>
                    <td><?php echo $value['nama_supplier'] ?></td>
                    <td><?php echo $value['pil_tarif'] ?></td>
                    <td><?php echo $value['harga_jual'] ?></td>
                    <td width="90px" align="center">
                    <a class="edit" href="provider_edit.php?id=<?php echo $value['id_provider']; ?>">Edit</a>
                    <a class="hapus" href="provider_hapus.php?id=<?php echo $value['id_provider']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                    </td>
                </tr>
            <tbody>
            <?php endforeach; ?>

            </table> 


            <br>
            

            <div align="center">
            <a href="provider_input.php">
            <button class="input">Tambah</button>
            </a>
            </div>
            
</div>
<br>

        <div>
            <?php include "footer.php"; ?>
        </div>

</body>