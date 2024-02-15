<html>
<head>
    <style type="text/css">
        fieldset {border:0;margin:3px 0;padding:0}
        body, input, label {font:11px verdana}
    </style>
</head>
<body>
<form id="myForm" method="post" action="form2.html" onSubmit="return verif();">
    <fieldset>
        <label for="produit1">Produit 1</label> : <input id="produit1" name="produit1" type="text" value="" />
        <label for="quantite1">Quantité 1</label> : <input id="quantite1" name="quantite1" type="text" value=""/>
        <label for="autre1">Autre 1</label> : <input id="autre1" name="autre1" type="text" value=""/>
    </fieldset>
    <input type="submit" value="Envoyer" />
</form>

<Input Type="Button" Value="Ajout ligne" OnClick=Ajouter()>
<Input Type="Button" Value="Supprimer ligne" OnClick=Supprimer()>
<script type="text/javascript">
    var i = 0;
    function Ajouter()
    {
        var form = document.getElementById("form");
        var input = document.createElement("input");
        input.setAttribute('name','menu'+i);
        input.setAttribute('type','text');
        input.setAttribute('value','menu'+i);
        input.setAttribute('id','menu'+i);
        form.appendChild(input);
        i++;
    }

    function Supprimer()
    {
        var form = document.getElementById("form");
        form.removeChild(form.lastChild);
        i--;
    }
    }
</script>
</body>
</html>
