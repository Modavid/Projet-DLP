<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">

        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
        <link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
    </head>

    <body>
        <?php
        include(dirname(__FILE__) . "/header.php");
        ?>
        <section class="conteneur-superieur">	
            <div class="conteneur">
                <?php
                include("auth.php");
                include("db_config.php");
                mysql_set_charset('UTF8');
                $conn = mysql_connect($DB_host, $DB_login, $DB_pass);
                $db = mysql_select_db($DB_select, $conn);
                if (!$conn) {
                    die('Connection error: ' . mysql_error());
                }

                if (!isset($_SESSION['AUTH'])) {
                    
                } else if ($_SESSION['AUTH'] == 2 || $_SESSION['AUTH'] == 1) {
                    /* $userid=$_SESSION['USERID'];

                      $SQL1="SELECT * FROM collectif WHERE cid='$userid'";
                      $result1=mysql_query($SQL1);
                      if(!$result1||mysql_num_rows($result1)==0)
                      {
                      ?>
                      <script>
                      alert('PROBLEME BASE DE DONNEE');
                      </script>
                      <?php
                      }
                      else
                      {
                     */
                    if ($_SESSION['AUTH'] == 1 || $_SESSION['AUTH'] == 2) {
                        $cpid = $_GET['cpid'];
                        $SQL1 = "SELECT * FROM contenupage WHERE cpid='$cpid'";
                        $SQL2 = "SHOW columns from contenupage ";
                        $result = mysql_query($SQL1);
                        $result2 = mysql_query($SQL2);

                        $length = mysql_num_rows($result2);

                        // 18
                        $lengthtotalphoto = $length - 2; //16
                        $lengthdiv = $lengthtotalphoto / 4; // 4

                        $lengthtotalnophoto = $lengthtotalphoto - $lengthdiv; // 12





                        $row = mysql_fetch_array($result);


                        $nom = htmlspecialchars($row['nom']);

                        $titres = array();
                        $soustitres = array();
                        $textes = array();
                        $photos = array();
                        for ($i = 1; $i < $lengthdiv + 1; $i++) {
                            array_push($titres, "titre$i");
                            array_push($soustitres, "soustitre$i");
                            array_push($textes, "texte$i");
                            array_push($photos, "photo$i");
                        }


                        $contents = array();
                        for ($i = 0; $i < $lengthdiv; $i++) {

                            array_push($contents, $titres[$i]);
                            array_push($contents, $soustitres[$i]);
                            array_push($contents, $textes[$i]);
                            array_push($contents, $photos[$i]);
                        }



                        $cpt = 0;
                        $contenupage = array();
                     
                        for ($i = 0; $i < $lengthtotalphoto; $i++) {

                            $var = $contents[$i];
                            if ($cpt != 3) {
                                $contenupage[$i] = mysql_real_escape_string($_POST[$contents[$i]]);
                                $contenupage[$i] = nl2br($contenupage[$i]);
                               

                                $cpt++;
                            } else {
                                if ($_FILES[$contents[$i]]['size'] == 0) {
                                    $contenupage[$i] = htmlspecialchars($row[$contents[$i]]);
                                  
                                    $cpt = 0;
                                } else {
                                    $contenupage[$i] = mysql_real_escape_string($_FILES[$contents[$i]]['name']);
                                   

                                    $cpt = 0;
                                }
                            }
                        }
                     










                        if ($row == 0) {
                            ?>
                            <script>
                                alert('The file does not exist.');
                            </script>
                            <h2 style="padding-left: 30px">
                                <a href="index.php">Index</a>
                            </h2>
                            <?php
                        } else {


                            $cpt = 0;
                            for ($i = 0; $i < $lengthtotalphoto; $i++) {

                                if ($cpt != 3) {
                                    $SQL3 = "UPDATE contenupage SET " . $contents[$i] . " = '$contenupage[$i]' WHERE cpid ='$cpid'";
                                    $cpt++;
                                } else {
                                    $SQL3 = "UPDATE contenupage SET " . $contents[$i] . " = '$contenupage[$i]' WHERE cpid ='$cpid'";

                                    if ($_FILES[$contents[$i]]["error"] > 0) {
                                        
                                    } else {
                                        echo "Upload: " . $_FILES[$contents[$i]]["name"] . "<br />";
                                        echo "Type: " . $_FILES[$contents[$i]]["type"] . "<br />";
                                        echo "Size: " . ($_FILES[$contents[$i]]["size"] / 1024) . " Kb<br />";
                                        echo "Temp file: " . $_FILES[$contents[$i]]["tmp_name"] . "<br />";

                                        if (file_exists("images-site/" . $_FILES[$contents[$i]]["name"])) {
                                            echo $_FILES[$contents[$i]]["name"] . " already exists. ";
                                        } else {
                                            move_uploaded_file($_FILES[$contents[$i]]["tmp_name"], "images-site/" . $_FILES[$contents[$i]]["name"]);
                                            echo "Stored in: " . "images-site/" . $_FILES[$contents[$i]]["name"];
                                        }
                                    }
                                 //   move_uploaded_file($temp[$i], "images-site/" . $contenupage[$i]);
                                    $cpt = 0;
                                }




                                //   $SQL3 = "UPDATE ENcontenupage SET ".$titre." ='$titres[$i]', ".$soustitre."='$soustitres[$i]', ".$texte."='$textes[$i]' WHERE cpid ='$cpid'";

                                $result3 = mysql_query($SQL3);
                            }


                            if ($result3) {
                                ?> 
                                <h2 style="padding-left: 30px">
                                    Le contenu a été modifié 
                                    <br><br>
                                    <a href="<?php echo $nom ?>.php">Voir les changements</a>

                                </h2>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert('DATABASE PROBLEM');
                                </script>
                                <a href="index.php">Retour</a>
                                <?php
                            }
                        }
                    }
                }
//}






                mysql_close($conn);
                ?>

            </div> 
            <!-- Fin div conteneur -->
                <?php
                include(dirname(__FILE__) . "/barre-laterale.php");
                ?>
            <!--Fin section conteneur-superieur-->
        </section>
        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>

        <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".fancybox").fancybox({
                                            helpers: {
                                                title: {
                                                    type: 'float'
                                                }
                                            }
                                        });
                                    });
        </script>

<?php
include(dirname(__FILE__) . "/footer.php");
?>
    </body>
</html>
