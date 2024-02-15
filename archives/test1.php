<html>
<head>
    <title> Expert System </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div >
    <table id="cells2" border="0" cellpadding="15" cellspacing="5"  font size="6">

        <tr>
            <th><img id="header2"  src="images/Kuwait_University_Logo.jpg" > </th>
            <th>KUWAIT UNIVERSITY</th>
        </tr>
    </table>
    <div class='back1'>
        <form method='post' action='edit_subjects.php'>
            <table border='1' align='center' id='customers' >
                <?php
                require "init.php";
                session_start();

                global $con,$users,$dr_id,$sub_id,$dr_name,$sub_name,$days,$fav,$timing;
                global $dr_ide,$dr_namee,$sub_namee,$dayse,$fave,$timinge;


                $query= "SELECT * FROM subjects_current where subjects_current.sub_ID NOT IN (SELECT test.subject_id from test)";
                $result=mysqli_query($con,$query);
                if ( $result->num_rows == 0 ) // User doesn't exist
                    echo "Subjects doesn't exist!";
                else {
                    while($row = mysqli_fetch_array($result))
                    {

                        $IDs[]=$row['sub_ID'];
                        $Names[]=$row['Name'];
                        //echo $row['Name'];
                    }



                $query= "SELECT * FROM test order by dr_id";
                $result=mysqli_query($con,$query);
                if ( $result->num_rows == 0 ) // User doesn't exist
                    echo "Subjects doesn't exist!";
                else { echo "
        <tr>
            <th>Professor Name</th>
            <th>First Choice</th>
            <th>Second Choice</th>
            <th>Third Choice</th>
            <th>Fourth Choice</th>
            <th>Fifth Choice</th>
            <th>Update Subject</th>

        </tr>";

                    $r=0;
                    $f=0;
                    while($row = mysqli_fetch_array($result))
                    {
                        $dr_ide[$f]=$row['dr_id'];
                        $dr_namee[$f]=$row['dr_name'];
                        $sub_namee[$f]=$row['sub_name'];
                        $dayse[$f]=$row['days'];
                        $timinge[$f]=$row['timing'];
                        $fave[$f]=$row['fav'];

                        //echo "<tr>";
                        //echo "<td> Dr. " . $dr_namee[$f] . "</td>";
                        //echo "<td>" . $sub_namee[$f] . "</td>";
                        //echo "<td>" . $fave[$f] . "</td>";
                        //echo "<td>" . $dayse[$f] . "</td>";
                        //echo "</tr>";
                        //$r++;
                        $f++;
                    }
                    //for($i=0;$i<count($Names);$i=$i+5)
                    //{
                    for($i=0;$i<count($dr_ide);$i=$i+5)
                    {
                        echo "<tr>";
                        echo "<td> Dr. " . $dr_namee[$i] . "</td>";
                        echo "<td>" . $sub_namee[$i] . "</td>";
                        echo "<td>" . $sub_namee[$i+1] . "</td>";
                        echo "<td>" . $sub_namee[$i+2] . "</td>";
                        echo "<td>" . $sub_namee[$i+3] . "</td>";
                        echo "<td>" . $sub_namee[$i+4] . "</td>";

                        echo "<td>  <select  name='perr' >
                        <option  selected=selected>Choose one</option>";
                        foreach($Names as $name) {
                            echo"<option value='$name'>$name</option>";

                        }
                        echo "</select></td>";
                        //echo "<td>" . $dayse[$i] . "</td>";
                        //echo "<td>" . $timing[$i] . "</td>";
                        echo "</tr>";
                    }
                }

                echo $_SESSION["tt"];

                if(isset($_POST['confirm'])){
                    echo $_POST['perr'];
                }

                ?>
            </table>

            <input ID="btn2" name="confirm"  type="submit" value="Home">

        </form>
    </div>
</body>
</html>
