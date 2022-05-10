<?php 

//VERWIJDEREN VAN DATA UIT DE DATABASE
require("dbh.class.php");

class Edit extends Dbh
{   //VERWIJDEREN VAN RESERVERINGEN 
    public function editOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg, $id)
    {
        $sql = "UPDATE onderdelen SET Naam = ?, Omschrijving = ?, VoorraadKg= ?, PrijsPerKg= ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$naam, $omschrijving, $voorraadkg, $prijsperkg, $id])) {
            header('location: onderdelen.php');
        }
    }
}

if (isset($_POST['editOnderdeel'])) {
    $id = $_GET['onderdeelID'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $voorraadkg = $_POST['voorraadkg'];
    $prijsperkg = $_POST['prijsperkg']; 
    $editOnderdeel = new Edit();
    $editOnderdeel->editOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg, $id);
}
//END




?>