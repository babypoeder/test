<?php 

require("dbh.class.php");


class Delete extends Dbh
{
    public function DeleteOnderdeel($id)
    {
        $sql = "DELETE FROM onderdelen WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/onderdelen.php");
        }
    }
}

if (isset($_GET['onderdeelID'])) {
    $id = $_GET['onderdeelID'];
    $deleteOnderdeel = new Delete();
    $deleteOnderdeel->DeleteOnderdeel($id);
}



?>
