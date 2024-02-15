<html>
<head>
    <style type="text/css">
        /* Mettez le code CSS ici. */

    </style>
    <link rel="stylesheet" type="text/css" href="test.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="test.js"></script>
    <script type="text/javascript">

        // Mettez le code javascript ici.
    </script>
</head>
<body>
<input type="text" id="nom" placeholder="Nom">
<input type="text" id="email" placeholder="Adresse email">
<input type="button" class="add" value="Ajouter une ligne">
<table class="test">
    <tr>
        <th>Sélectionner</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    <tr>
        <td><input type="checkbox" name="select"></td>
        <td>Thomas Babtise</td>
        <td>thomas@waytolearnx.com</td>
    </tr>
</table>
<button type="button" class="delete">Supprimer une ligne</button>
</body>
<script>
    $(document).ready(function() {
        $(".add").click(function() {
            var nom = $("#nom").val();
            var email = $("#email").val();
   // var ligne = "<tr><td><input type='checkbox' name='select'></td><td>" + nom + "</td><td>" + email + "</td></tr>";
     var ligne = "<input type='text' placeholder='Nom'> </br>";
            $("table.test").append(ligne);
        });
        $(".delete").click(function() {
            $("table.test").find('input[name="select"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("table.test tr").remove();
                }
            });
        });
    });
</script>

<script>
    var nlignes = 0;
    function Ajouter1(){
        nlignes++;
        saisies1.insertAdjacentHTML('BeforeEnd','<BR>Produit '+nlignes+' <input type=text size=4 name=P'+nlignes+'> Quantité '+nlignes+' <input type=text name=QT'+nlignes+'> et de trois '+nlignes+' <input type=text name=QT'+nlignes+'>');
    };
</script>

<Form>
    <Input Type="Button" Value="Ajout ligne" OnClick=Ajouter1()>
    <br>
    <div id="saisies1"></div>
</Form>
</html>