<?php
//utiliser la fonction in_array('', '')
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise',
    'Framboise');
if (in_array('Myrtille', $fruits))
{
    echo 'La valeur "Myrtille" se trouve dans les fruits !';
}
if (in_array('Cerise', $fruits))
{
    echo 'La valeur "Cerise" se trouve dans les fruits !';
}
echo '<hr/>';

//utilise un fonction array_key_exists pour savoir que le clé existe

$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
if (array_key_exists('ka', $coordonnees)) {
    echo 'La clé "nom" se trouve dans les coordonnées !';

}else{
    echo 'La clé "ka" se trouve pas dans les coordonnées !';

}
echo '<hr/>';
//test avec print_r, specialiser dans array
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

//parcourir un tableau
/**
 * echo '<pre>';
print_r($coordonnees);
echo '</pre>';
echo '<hr/>';

 *$prenoms = array('rova', 'rivah', 'nina', 'veronique');
for($i = 0; $i<3; $i++){
echo $prenoms[$i]. '<br />';
 *
 * foreach($prenoms as $element){
echo $element .'<br />';
}
}
 */
$prenoms = array(
    'prenom ' => 'rova',
    'nom ' => 'ravelomanantsoa',
    'adresse ' => 'anosivavaka',
    'ville ' => 'antananarivo',
);
   foreach($prenoms as $cle => $elements){
       echo $cle. ' vaut '.$elements .'<br />';
   }

echo '<hr/>';

//tableau associatif
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
 echo $coordonnees['ville'];
echo '<hr/>';

// La fonction array permet de créer un array
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique',
    'Benoît');

echo $prenoms[0] ;

echo '<hr/>';


$nombre_de_lignes = 1;
while ($nombre_de_lignes <= 10)
{
    echo 'Je ne dois pas regarder les mouches voler quand
j\'apprends le PHP.<br />';
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes +

}
?>
<?php
for ($nombre_de_lignes = 1; $nombre_de_lignes <= 10;
     $nombre_de_lignes++)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
}
?>
