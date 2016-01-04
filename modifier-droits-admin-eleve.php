<!DOCTYPE html >
<html>
    <?php
        include('auth.php');
        if($_SESSION['USERID'] == 100 && $_SESSION['AUTH'] == 1)
        {
            $eid = $_GET['eid'];
            $admin = $_GET['admin'];
            if ($admin == '')
            {
                $SQL = "UPDATE utilisateurs SET type = 'admin' WHERE eid='$eid'";
            }
            else if ($admin == 'admin')
            {
                $SQL = "UPDATE utilisateurs SET type = '' WHERE eid='$eid'";
            }
            $result = mysql_query($SQL);
            if(!$result)
            {
                ?>
                    <script type="text/javascript">alert('Erreur lors de la modification');</script>
                <?php
            }
        }
    ?>
    <meta http-equiv="refresh" content="0;URL=http://www.ecole-theatrale.fr/afficher-profil-eleve?eid=<?php echo $eid?>">
</html>