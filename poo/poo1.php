<?php
class Maclasse1
{
    public $attribut1;
    public $attribut2;
    public function __clone()
    {
        $this->attribut2 = "coucou";
    }
}
$a = new Maclasse1();
$b = $a;
$a->attribut1 = "bonjour";
echo "Objet A: " . $a->attribut1 . "<br />"; // Affiche : Bonjour
echo "Objet B: " . $b->attribut1 . "<br />"; // Affiche : Bonjour
echo "<hr />";
$origine = new Maclasse1();
$origine->attribut1 = "bonsoir";
$copie = clone $origine;
echo "Objet Origine: " . $origine->attribut1 . "<br />"; // Affiche : Bonsoir
echo "Objet copie: " . $copie->attribut1 . "<br />"; // Affiche : Bonsoir
echo "Objet Origine: " . $origine->attribut2 . "<br />"; // n'affiche rien
echo "Objet copie: " . $copie->attribut2 . "<br />"; // Affiche : coucou


class Singleton
{
    private static $instance = null;
    public $numero;
    private function __construct() {}
    public static function creation()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Singleton();
        }
        return self::$instance ;
    }
}
$a = Singleton::creation(); // A est la référence #1 qui représente l'objet en RAM
$b = Singleton::creation(); // B est la référence #1 qui représente l'objet en RAM
$c = Singleton::creation(); // C est la référence #1 qui représente l'objet en RAM
$c->numero = 18; // j'affecte une propriété
echo $a->numero . '<hr />'; // 18 - et tout les représentant de l'objet ont cette valeur (preuve qu'il s'agit bien du même objet.
echo $b->numero . '<hr />'; // 18
echo $c->numero . '<hr />'; // 18

