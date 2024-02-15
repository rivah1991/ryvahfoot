<html>
<head>
    <style type="text/css">
        fieldset {border:0}
        body, input, label {font:11px verdana}
        #debug {color:red;margin-top:10px}
    </style>
</head>
<body>
<form id="myForm" method="post" action="form.html">
    <fieldset>
        <label for="produit1">Produit</label> : <input id="produit1" name="produit1" type="text" value="" />
        <label for="quantite1">Quantité</label> : <input id="quantite1" name="quantite1" type="text" value=""/>
        <label for="autre1">Autre</label> : <input id="autre1" name="autre1" type="text" value=""/>
    </fieldset>
    <input type="submit" value="Envoyer" />
</form>
<a href="#" class="add">Ajouter</a> <a href="#" class="del">Supprimer</a>
<div id="debug"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        var nb = 1;
        $('.add').click(function(){
            var ligneTemp = $(myForm).children("fieldset:last");
            ligneTemp.after(ligneTemp.clone(true));
            $(myForm).children("fieldset:last").hide().fadeIn();
            var ligneTemp = $(myForm).children("fieldset:last");
            ligneTemp.find('label').each(function() {
                tempLabel = $(this).attr("for").replace(nb, nb+1);
                $(this).attr("for",tempLabel);
            });
            ligneTemp.find('input').each(function() {
                this.id= this.id.replace(nb, nb+1);
                this.name= this.name.replace(nb, nb+1);
                this.value= "";
            });
            nb++;
        });
        $('.del').click(function(){
            if (nb>1) { // Pour qu'il reste au moins une ligne
                $(myForm).children("fieldset:last").fadeOut(300, function(){$(this).remove();});
                nb--;

            }
        });
        $("#myForm").submit(function(){
            var datas_form = $("#myForm").serializeArray();
            $("#debug").empty();
            $.each(datas_form, function(i, field){
                $("#debug").append(field.name + ":" + field.value + "<br />");
            });
            return false;
        });
    });
</script>
</body>
</html>