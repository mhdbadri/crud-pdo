<?php 
    include 'koneksi.php';
    $query = $koneksi->prepare("SELECT * FROM orderan
                                JOIN userr ON orderan.id_user = userr.id_user
                                JOIN customer ON orderan.id_customer = customer.id_customer
                                JOIN provider ON orderan.id_provider = provider.id_provider
                                JOIN tarifpulsa ON orderan.id_tarif = tarifpulsa.id_tarif ");
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
            <h2 align="center">Data Orderan</h2>
            <br>
            
            <thead>
            <table>
                <div class="tr1">
                <tr>
                    <th>NO</th>
                    <th>ID ORDERAN</th>
                    <th>NAMA PENJUAL</th>   
                    <th>NO HP CUSTOMER</th>
                    <th>NAMA CUSTOMER</th>
                    <th>NAMA PROVIDER</th>
                    <th>TARIF</th>
                    <th>HARGA JUAL</th>
                    <th>TANGGAL ORDER</th>
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
                    <td><?php echo $value['id_order'] ?></td>
                    <td><?php echo $value['user_name'] ?></td>
                    <td><?php echo $value['nohp_customerr'] ?></td>
                    <td><?php echo $value['nama_customer'] ?></td>
                    <td><?php echo $value['nama_provider'] ?></td>
                    <td><?php echo $value['pil_tarif'] ?></td>
                    <td><?php echo $value['harga_jual'] ?></td>
                    <td><?php echo $value['tgl_order'] ?></td>
                    <td width="90px" align="center">
                    <a class="edit" href="orderan_edit.php?id=<?php echo $value['id_order']; ?>">Edit</a>
                    <a class="hapus" href="orderan_hapus.php?id=<?php echo $value['id_order']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                    </td>
                </tr>
            <tbody>
            <?php endforeach; ?>

            </table> 


            <br>
          

            <div align="center">
            <a href="orderan_input.php">
            <button class="input">Tambah</button>
            </a>
            </div>
            <br>
            
</div>

        <div>
            <?php include "footer.php"; ?>
        </div>

</body>