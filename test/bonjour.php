<?php
/**
 * Created by PhpStorm.
 * User: RAVELOMANANTSOA
 * Date: 31/10/2020
 * Time: 19:00
 */
?>
<!DOCTYPE html>
<html>
<head>

</head>
</body>
<?php
if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter'])) // On a le nom    et le prénom
{
    //Transtipage permet de convertir en entier
    $_GET['repeter'] = (int) $_GET['repeter'];
    if($_GET['repeter']>0 AND $_GET['repeter']<20){
    for($i=0; $i<=$_GET['repeter']; $i++){
    echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] .  ' !<br/>';
     }
}else{
        echo 'il faut renseigner un nom, prenom et un nombre de repetition';
    }
}
else // Il manque des paramètres, on avertit le visiteur
{
    echo 'Il faut renseigner un nom et un prénom !';
}
?>

</body>
</html>