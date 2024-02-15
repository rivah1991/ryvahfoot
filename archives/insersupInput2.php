<html>
<head>
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
                                                                                                                                                  <script src="../scripts/bootstrap.bundle.js"></script>
                                                                                                                                                                                                 <script src="../scripts/jquery-3.4.1.min.js"></script>

    <script language="javascript">
        fields = 0;
        function addInput() {
            var con = document.getElementById('text');
            if(fields != 10)
            {
                con.insertAdjacentHTML('beforeend', "<br></br>Study:" +
                " <input type=\"text\" name=\"study[]\">Bug: <input type=\"text\" name=\"bug[]\"> BuildFile: " +
                "<input type=\"text\" name=\"bname[]\" size=\"40\"> WAR File: <input type=\"text\" name=\"wname[]\" size=\"50\"><br />");

                fields += 1;
            }
            else
            {
                con.insertAdjacentHTML('beforeend', "<br />Only 10 instances allowed.");
                document.form.add.disabled=true;
            }
        }
        function remove() {
            element = document.getElementById('text');
            element.parentNode.removeChild(element)

        }

        <input type="button" value="Remove Element" onClick="remove('parent','child');">

    </script>
    <script>
        function deleteAllInputs() {
            $('#text').find('input[type="text"]').each(function() {
                $(this).remove();
            })
        }
    </script>
</head>
<body>
...
...
<input type="button" onclick="addInput()" name="add" value="Add more Builds" />
