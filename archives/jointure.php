<select name="nom" style="width: 120px">
    <?php
    require_once("../config/database.php");
    /**
     *    $requser  = $base->prepare("SELECT * FROM club");
    $requser->execute(array($_POST['nom']));

    echo "<option>".$_POST['nom']."</option>";
     */
    $sql = "SELECT nom FROM club";
    $result = $base->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo $row["nom"];
            echo "<option>".$row['nom']."</option>";
        }
    } else {
        echo "0 results";
    }
    $base->close();
    ?>



    ?>
</select>
