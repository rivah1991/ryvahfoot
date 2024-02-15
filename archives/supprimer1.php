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
<a href="#" onclick="add();">Ajouter</a> <a href="#"  onclick="del();">Supprimer</a>
<script type="text/javascript">
    var nb = 1;
    function add() {
        ligneCount = document.getElementsByTagName("fieldset").length-1;
        ligneTemp = document.getElementsByTagName("fieldset")[ligneCount];
        ligneClone = ligneTemp.cloneNode(true);
        for (i=0; i<ligneClone.getElementsByTagName("input").length; i++) {
            ligneClone.getElementsByTagName("input")[i].id=ligneClone.getElementsByTagName("input")[i].id.replace(nb,nb+1);
            ligneClone.getElementsByTagName("input")[i].name=ligneClone.getElementsByTagName("input")[i].name.replace(nb,nb+1);
            ligneClone.getElementsByTagName("input")[i].value="";
            ligneClone.getElementsByTagName("label")[i].htmlFor=ligneClone.getElementsByTagName("label")[i].htmlFor.replace(nb,nb+1);
            ligneClone.getElementsByTagName("label")[i].innerHTML=ligneClone.getElementsByTagName("label")[i].innerHTML.replace(nb,nb+1);
        }
        myForm.getElementsByTagName("fieldset")[0].appendChild(ligneClone);//
        nb++;
    }
    function del() {
        if (nb>1) {
            var noeud=myForm.getElementsByTagName("fieldset")[0].lastChild;
            myForm.getElementsByTagName("fieldset")[0].removeChild(noeud);
            nb--;
        }
    }
    function verif() {
        return false;
    }
</script>
</body>
</html>