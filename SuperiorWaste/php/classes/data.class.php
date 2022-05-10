<?php

require("dbh.class.php");

class Data extends Dbh
{
    public function getOnderdelen()
    {
        $sql = "SELECT * FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['VoorraadKg'] . "</td>";
            echo "<td>" . $row['PrijsPerKg'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_onderdeel.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }
}






?>