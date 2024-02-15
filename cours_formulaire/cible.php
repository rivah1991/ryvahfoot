<!DOCTYPE html>
<html>
<head>

</head>
</body>
<p>Bonjour !</p>
<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles
    <?php echo htmlspecialchars($_POST['prenom']); ?> !</p>
<p>Si tu veux changer de prénom, <a href="formulaire.php">clique
        ici</a> pour revenir à la page formulaire.php.</p>
</body>
</html>