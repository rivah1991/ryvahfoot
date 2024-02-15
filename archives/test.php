<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Commande</title>
</head>

<body>
<?php
echo $_POST['menu1'];

if (isset($_POST['id'.$i]))
{
    $tab=$_POST['item'.$i];
    echo $tab;}
?>
<Input Type="Button" Value="Ajout ligne" OnClick=Ajouter()>
<Input Type="Button" Value="Supprimer ligne" OnClick=Supprimer()>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="input" name="menu1" value="Texte entré par l'utilisateur" />
    <input type="submit" value="OK" />
</form>

    <div id="saisies1">
    </div>

<script type="text/javascript">
function Ajouter(){
    i=1;
    var form = document.getElementById("form"); //le noeud parent

    var input = document.createElement('input');  //creation de l'element
    input.setAttribute('id','menu'+i)
    input.setAttribute('type','text');
    form.appendChild(input);

    var inputHidden = document.createElement('input');  //creation de l'element
    inputHidden.setAttribute('id','id'+i)
    inputHidden.setAttribute('type','hidden');
    form.appendChild(inputHidden);
    i++;
}
    function Supprimer(){
        var input = document.getElementById('menu'+i);
        input.parentNode.removeChild(input);

        var inputHidden=document.getElementById('id'+i);
        inputHidden.parentNode.removeChild(inputHidden);
        i--;
    }
</script>
</body>

</html>