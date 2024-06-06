<?php include('server.php');

$id=$_GET['id'];
$sql = "SELECT * FROM product WHERE product_id='$id'";

$result = mysqli_query($db, $sql)->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaviatūra</title>
    <link href="style/ddartstyle.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="/foto/icon/Icon.ico">
</head>
<body>
    <header>
    <div class="navmenu">
                <nav class="navbar">
                    <ul class="flex-container space-between">
                        <li class="flex-item"><a class="navigation" href="Desktop_Shop.php">Veikals</a></li>
                        <li class="flex-item"><a class="navigation" href="Service.php">Serviss</a></li>
                        <li class="flex-item"><a class="navigation" href="Delivery.php">Piegade</a></li>
                        <li class="flex-item"><a class="navigation" href="Kontakti.php">Kontakti</a></li>

                    </ul>
                </nav>
            </div>
    </header>
    <div class="lgse">
        <a class="logobutton" href="Desktop_Shop.php"><img class="logo" src="foto/logo/MainLogotype.png"></a>
        <div class="location">
            <a class="locate" href="Desktop_Shop.php">DShop</a>
            <h3 class="hloc">></h3>
            <a class="locate" href="Keyboards.php">Klaviatūras</a>
        </div>
    </div>

    <div>

        <div class="mouse-content">

            <div class="mouse-slides-container">

                <div class="mouse-slider">

                    <div class="MouseSlider fade">
                        <div class="photo">1 / 4</div>
                        <img src="foto/atb/keyboard/keyboard1.png" style="width: 350px;">
                    </div>
    
                    <div class="MouseSlider fade">
                        <div class="photo">2 / 4</div>
                        <img src="foto/atb/keyboard/keyboard2.png" style="width: 350px;">
                    </div>
    
                    <div class="MouseSlider fade">
                        <div class="photo">3 / 4</div>
                        <img src="foto/atb/keyboard/keyboard3.png" style="width: 350px;">
                    </div>
    
                    <div class="MouseSlider fade">
                        <div class="photo">4 / 4</div>
                        <img src="foto/atb/keyboard/keyboard4.png" style="width: 350px;">
                    </div>
    
                </div>
    
                <div class="dot-container" style="text-align: center;">
                    <span class="dot" onclick="currentSlide(1)"><img id="dot-photo" src="foto/atb/keyboard/keyboard1.png"></span>
                    <span class="dot" onclick="currentSlide(2)"><img id="dot-photo" src="foto/atb/keyboard/keyboard2.png"></span>
                    <span class="dot" onclick="currentSlide(3)"><img id="dot-photo" src="foto/atb/keyboard/keyboard3.png"></span>
                    <span class="dot" onclick="currentSlide(4)"><img id="dot-photo" src="foto/atb/keyboard/keyboard4.png"></span>
                </div>
                
            </div>
            
            <div class="mouse-elements">
                <h1><?php echo $result['title'];?></h1>
                <h5>Preces kods: <?php echo $result['product_id'];?></h5>
                <div class="mouse-price">
                    <h3><?php echo $result['price'];?> €</h3><h5>/ gab.</h5>
                    <div class="add-item-to-cart">
                        <a href="#">Ielikt grozā</a>
                    </div>
                </div>
                <div class="mouse-warranty">
                    <div class="mouse-first-warranty">
                        <div>    
                            <input type="checkbox" class="warranty-checkbox">
                            <a href="#">Pagarinātā garantija</a><br>
                            <label for="">(Bezmaksas ierīces remonts)</label>
                        </div>
                        <div class="warranty-price">
                            <h5>12 mēneši (+ 5,13 €)</h5>
                        </div>
                    </div>
                    <div class="mouse-second-warranty">
                        <div>
                            <input type="checkbox" class="warranty-checkbox">
                            <a href="#">Pagarinātā garantija ar nomaiņu</a><br>
                            <label for=""> Bezmaksas ierīces remonts (ar nomaiņu)</label>
                        </div>
                        <div class="warranty-price">
                            <h5>12 mēneši (+ 10,63 €)</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mouse-feature-container">
                <div class="mouse-feature">
                    <div class="product-info-header">
                        <h2>Prēces informācija</h2>
                    </div>
                        <div class="product-specification">
                           <?php echo $result['specification'];?>
                        </div>
                    <div class="mouse-feature-table-container">
                        <div class="first-teble-block">
                            <table class="mouse-feature-table">
                                <div>
                                    <tr>
                                        <td colspan="2" class="table-header">Kopējie parametri</td> 
                                    </tr>
                                    <tr>
                                        <td class="talbe-cell">Preces veids</td>
                                        <td class="talbe-cell"><a class="link-to-page" href="Mouse.php"><?php echo $result['category'];?></a></td>
                                    </tr>
                                    <tr>
                                        <td class="talbe-cell">Zīmols</td>
                                        <td class="talbe-cell">HyperX</td>
                                    </tr>
                                    <tr>
                                        <td class="talbe-cell">Modelis</td>
                                        <td class="talbe-cell">Pulsefire Dart Wireless</td>
                                    </tr>
                                </div>

                            </table>
                        </div>
                        <div class="block-second-tables">
                            <table class="mouse-feature-table">
                                <tr>
                                    <td colspan="2" class="table-header" class="talbe-cell">Savienojumi un barošana</td> 
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Peles savienojuma veids</td>
                                    <td class="talbe-cell">	Bezvadu optiskā</td>
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Savienojuma tips</td>
                                    <td class="talbe-cell">Bez vadiem pie USB</td>
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Vada garums</td>
                                    <td class="talbe-cell">1.8 m</td>
                                </tr>
                            </table>
        
                            <table class="mouse-feature-table">
                                <tr>
                                    <td colspan="2" class="table-header" class="talbe-cell">Sensors</td> 
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Jutīgums (DPI)</td>
                                    <td class="talbe-cell">400 - 3200</td>
                                </tr>
                            </table>
        
                            <table class="mouse-feature-table">
                                <tr>
                                    <td colspan="2" class="table-header" class="talbe-cell">Papildus</td> 
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Apgaismojums</td>
                                    <td class="talbe-cell">Jā</td>
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Garantija</td>
                                    <td class="talbe-cell">24 mēneši</td>
                                </tr>
                                <tr>
                                    <td class="talbe-cell">Ergonomisks dizains</td>
                                    <td class="talbe-cell">Jā</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script/dart-script.js"></script>
</body>
</html>