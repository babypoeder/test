<?php 

require_once "dbh.class.php";

class Add extends Dbh
{
    public function addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg)
    {
        $sql = "INSERT INTO onderdelen(Naam, Omschrijving, VoorraadKg, PrijsPerKg) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $omschrijving, $voorraadkg, $prijsperkg]);
        header('location: ../pages/onderdelen.php');
    }
}


if (isset($_POST['addOnderdeel'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $voorraadkg = $_POST["voorraadkg"];
    $prijsperkg = $_POST["prijsperkg"];
    $addOnderdeel = new Add();
    $addOnderdeel->addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg);
}

?>