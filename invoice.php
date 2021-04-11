<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Event Booking</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                               EVENT BOOKING
                            </td>
                            
                            <td>
                                Invoice : <?php echo date("Y-m-d")?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php 
                include 'koneksi1.php';
                $id = $_GET['kode'];
                $data = mysqli_query ($con, "select acara.*,users.*,lokasi.nama_lokasi,lokasi.tipe,lokasi.harga as lokasi_harga from acara join users on acara.id_user=users.id join lokasi on acara.id_lokasi=lokasi.id where acara.kode='$id'");
                while ($d = mysqli_fetch_array($data)){
                    ?>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               Event Booking, Corp.<br>
                                Jalan Sunan Kalijaga Malang VIII No.4, Kec.<br>
                               Lowokwaru, Malang, Jawa Timur 65142
                            </td>
                            
                            <td>
                                Kepada.<br>
                                <?php echo $d['name']; ?><br>
                                <?php echo $d['email']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                  Nama Acara 
                </td>
                
                <td>
                    Kuota
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo $d['nama_acara']; ?>
                </td>
                
                <td>
                    <?php echo $d['kuota']; ?> Orang
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Harga
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $d['nama_lokasi']; ?>
                </td>
                
                <td>
                    <?php echo 'Rp.'.$d['lokasi_harga'].',00'; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Biaya Kuota
                </td>
                
                <td>
                     <?php
                        $bis = $d['kuota']*10000;
                      echo 'Rp.'.$bis.',00'; ?>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Biaya Durasi
                </td>
                
                <td>
                      <?php
                        $bos = $d['durasi_acara']*100000;
                      echo 'Rp.'.$bos.',00'; ?>
                </td>
            </tr>

            <tr class="item last">
                <td>
                   Status Tagihan
                </td>
                
                <td>
                      <?php
                      $kiat = $d['lunas'];
                      if($kiat == 1){
                       
                      echo 'Lunas';
                      }else{
                         echo 'Belum Lunas';

                      } ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total:  <?php echo 'Rp.'.$d['total_bayar'].',00'; ?><br/>
                   <hr>
                   DP :  <?php echo 'Rp.'.$d['bayar_dp'].',00'; ?>
                </td>

            </tr>
            <?php $uye =$d['bukti'];
            if($uye==NULL){
                $yog=' ';
            }else{
                 $yog='none';
            }
              ?>
             <tr class="total" style="display: <?php echo $yog; ?>">
                <td></td>
                
                <td>
                  Silahkan Lakukan Pembayaran DP dan Pelunasan Manual Transfer Ke NO Rek : BCA - 351097667890<br/>
                   <hr>
                   <form action="upload_bukti.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="bukti">
                   <input type="hidden" name="kode" value="<?php echo $d['kode']; ?>">
                     <input type="submit" value="Upload">
                   </form>
                </td>

            </tr>
        </table>
      
    </div>
    <p align="center"> <a href="hapus_kode.php?kode=<?php echo $d['kode']; ?>" onClick="return confrim ('Apakah Anda yakin Ingin Menghapus Data?')"> <input type="button" value="Hapus"></a>  <a href="home.php" ><input type="button" value="Kembali"></a></p>
    <p align="center"><font size="3" face="Bodoni MT" color="black"></p></font>
      <?php 
}
?>
</body>
</html>