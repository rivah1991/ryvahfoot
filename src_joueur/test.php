
<?php
// Passons une variable $_GET à notre exemple, dans ce cas
// c'est aid pour actor_id dans notre base de données Sakila.
// Rendons le par défaut à 1, et transtypons le en entier pour éviter
// les injections SQL et / ou des problèmes de sécurité connexe.
// Gérer tout ceci sort du cadre de cet exemple basique. Exemple :
//   http://example.org/script.php?aid=42
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  //  require_once("../config/database.php");
    $aid = (int) $_GET['id'];
} else {
    $aid = 1;
}

// Se connecter et sélectioner une base de données MySQL nommé sakila
// Hostname: 127.0.0.1, username: votre_utilisateur, password: votre_mdp, db: sakila
$mysqli = new mysqli('localhost', 'root', '', 'foot');

// Oh non ! Une connect_errno existe donc la tentative de connexion a échoué !
if ($mysqli->connect_errno) {
    // La connexion a échoué. Que voulez-vous faire ? 
    // Vous pourriez vous contacter (email ?), enregistrer l'erreur, afficher une jolie page, etc.
    // Vous ne voulez pas révéler des informations sensibles

    // Essayons ceci :
    echo "Désolé, le site web subit des problèmes.";

    // Quelque chose que vous ne devriez pas faire sur un site public,
    // mais cette exemple vous montrera quand même comment afficher des
    // informations lié à l'erreur MySQL -- vous voulez peut être enregistrer ceci
    echo "Error: Échec d'établir une connexion MySQL, voici pourquoi : \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";

    // Vous voulez peut être leurs afficher quelque chose de jolie, nous ferons simplement un exit
    exit;
}

// Réaliser une requête SQL
$sql = "SELECT id, nom FROM club WHERE id = $aid";
if (!$result = $mysqli->query($sql)) {
    // Oh non ! La requête a échoué. 
    echo "Désolé, le site web subit des problèmes.";

    // Denouveau, ne faite pas ceci sur un site public, mais nous vous
    // montrerons comment récupérer les informations de l'erreur
    echo "Error: Notre requête a échoué lors de l'exécution et voici pourquoi :\n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, nous avons réussie. Nous savons que la connexion MySQL et la requête 
// a réussi, mais avons nous un résultat ?
if ($result->num_rows === 0) {
    // Oh, pas de lignes ! Dès fois c'est acceptable et attendue, dès fois
    // ce l'est pas. Vous décidez. Dans ce cas, peut être que actor_id était trop
    // large ?
    echo "Nous n'avons pas trouvé de correspondance pour ID $aid, nous sommes désolé. Veuillez réessayer de nouveau.";
    exit;
}

// Maintenant, nous savons qu'un seul résultat existera dans cet exemple donc
// récupérons le dans un tableau associatif où les clés du tableau sont
// les noms de colonnes de la table
$actor = $result->fetch_assoc();
echo "Parfois je vois " . $actor['first_name'] . " " . $actor['last_name'] . " à la TV.";

// Maintenant, récupérons cinq acteurs aléatoires et affichons leurs noms dans une liste.
// Nous ajouterons moins de gestion d'erreur car vous savez désormais faire ceci vous-même.
$sql = "SELECT actor_id, nom FROM club ORDER BY rand() LIMIT 5";
if (!$result = $mysqli->query($sql)) {
    echo "Désolé, le site web subit des problèmes.";
    exit;
}

// Affichons nos 5 acteurs aléatoires, et un lien pour chaque acteur
echo "<ul>\n";
while ($actor = $result->fetch_assoc()) {
    echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $actor['actor_id'] . "'>\n";
    echo $actor['id'] . ' ' . $actor['nom'];
    echo "</a></li>\n";
}
echo "</ul>\n";

// Le script libérera automatiquement le résultat et fermera la connexion
// MySQL quand elle existe, mais faisons le quand même
$result->free();
$mysqli->close();
?>
