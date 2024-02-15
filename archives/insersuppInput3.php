<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../css/menu_menu.css.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta charset="utf-8">
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/drop.js"></script>
    <style>
        body 	{
            font-style: normal;
            font-weight: bold;
            font-family: "Arial";

        }
    </style>
</head>
<body>
<div class="input_fields_wrap">
    <button class="add_field_button">Add Booking</button>
</div>
<div id='TextBoxesGroup'>
    <div id="TextBoxDiv1">
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 2;
        $(".add_field_button").click(function() {
            if (counter > 10) {
                alert("Only 10 textboxes allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<div id="target"><label>Textbox #' + counter + ' : </label>' +
            '<input type="text" name="textbox' + counter +
            '" id="firsttextbox' + counter + '" value="" >&nbsp;&nbsp;<input type="text" name="textbox' + counter +
            '" id="secondtextbox' + counter + '" value="" >  <a href="#" id="remove_field">Remove</a><input type="text" id="box' + counter + '" value="">this is 3rd textbox of each div</div>');
            newTextBoxDiv.appendTo("#TextBoxesGroup");

            counter++;

        });
        $(this).on("click", "#remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('#target').remove();
            counter--;

        });
    });
</script>
</body>
</html>