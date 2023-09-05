<?php 
session_start();
require 'function.php';

$usernamee = $_SESSION["usernamee"];
$pelanggan=queryy("SELECT * FROM pelanggan WHERE usernamee='$usernamee'")[0];


$data = query("SELECT * FROM blog");
$data2 = query("SELECT DISTINCT kategori FROM blog");
// cariii
if(isset($_POST["cari"])){
    $data = cari ($_POST["keyword"]);
}


if (!isset($_SESSION['usernamee'])) {
    header("location:../pelanggan/loginn.php");
  }
  error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href=".img/logo-removebg-preview.png">
        <title>Pesanan || KFC Lhokseumawe</title>
        <link rel="stylesheet" href="blog8.css">
    <link rel="shortcut icon" href="img/logokfc.png" type="image/x-icon">

        <style>
        <?php include 'header.css';
              
?>

        </style>

</head>
<body>
    <header>
    <div class="header">
        <div class="logo">

            <!-- <li class="logoo"><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/wifi-zone-14-858430.png?w=128&f=avif" alt=""></li> -->
            <li class="judull"><a href="index.php"><img src="img/logo_header.jpg" alt=""></a></li>
        </div>
        <ul>
            <div class="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="portofolio.php">GALLERY</a></li>
                <li><a href="blog.php">PESANAN</a></li>
                <li><a href="store.php">STORE</a></li>
            </div>
            <!-- <div class="keranjang">
                <a href="keranjang.php"><img src="img/keranjangkfc.png" alt=""><span>(3)</span></a>
            </div> -->
            <div class="oi">
            <div class="dropbtnn"><img class="img" src="../pagehome/img/<?= $pelanggan['foto']?>" alt=""></div>
            <div class="dropdownn-contentt">
            <a href="setting.php">Setting</a>
            <a href="../pelanggan/logout.php">Log Out</a>
            </div>
            </div>
        </ul>
    </div>
    </header>
    <div class="container">
        <div class="blog">
            <ul>
                <li><h1>Pesan Menu Pilihan Anda Di Sini.</h1></li>
            </ul>
        </div>
        <div class="con-wrap">
            
            <div class="wrap">
                <div class="isi">

 

                    <?php $i =1; ?>
                    <?php $data = array_reverse($data);?>
                    <?php foreach($data as $row){?>  
                        <?php $string = strip_tags($row['artikel']);
                            if (strlen($string) > 260) {

                                // truncate string
                                $stringCut = substr($string, 0, 260);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '....';
                            }
                           
                            ?>                      
                        <div class="title">
                    
                            <ul>
                                <!-- <li><?= $i ?></li> -->
                                <a class="hover" href="blog-detail.php?id=<?= $row['id']?>"><li><img src="../admin/img/<?= $row['foto']?>" alt="" class="fotoone"></li>
                                <li><a href="blog-detail.php?id=<?= $row['id']?>"><h3><?= $row['judul']?></h3></a></li></a>
                                <!-- <li><p><?= $string?></p></li> -->
                                <!-- <li><h1 class="judu"><?= $row['tanggal']?></h1></li> -->
                            </ul>                            
                        </div>
                    <?php $i++ ?>
                    <?php }?>
                </div>
            </div>

        </div>


            
            
    </div>
</body>
<?php include'footer.php' ?>
</html>