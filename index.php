<?php
include_once("function/helper.php");
//echo BASE_URL;
$page = isset($_GET['page']) ? $_GET['page'] : false;
//echo $page;
?>

<html>
    <head>
        <title>WeShop | Barang Electronik</title>
        <link href="<?php echo BASE_URL."css/style.css" ?>" type="text/css" rel="stylesheet" />
    <head>

    <body>
        <div id="containter">
            <div id="header">
                <a href="<?php echo BASE_URL."index.php"; ?>">
                    <img src="<?php echo BASE_URL."images/logo.png"; ?>" />
                </a>

                <div id="menu">

                    <div id="user">
                        <a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
                        <a href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a>
                    </div>

                    <a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
                        <img src="<?php echo BASE_URL."images/cart.png"; ?>" />
                    </a>

                </div>

            </div>
            <div id="content">
                <?php
                    $filename = "$page.php";
                    //echo $filename;
                    if(file_exists($filename)){
                        include_once($filename);
                    }else{
                        echo "Maaf, File Tersebut Tidak Ada Di Dalam Sistem";
                    }
                ?>
            </div>

            <div id="footer">
                <p>Copyright weshop 2019</p>
            </div>
        </div>
    </body>
</html>