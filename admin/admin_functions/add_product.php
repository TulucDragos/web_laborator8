<?php

require_once '../parts/header.php';
$error = "";
if (isset($_POST['submit'])) {
    // preluam datele de pe formular
    $nume = htmlentities($_POST['nume'], ENT_QUOTES);
    $pret = htmlentities($_POST['pret'], ENT_QUOTES);
    $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
    $short_description = htmlentities($_POST['short_description'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);
    $stoc = htmlentities($_POST['stoc'], ENT_QUOTES);
    $pret_oferta = htmlentities($_POST['pret_oferta'], ENT_QUOTES);
    $recomandat = htmlentities($_POST['recomandat'], ENT_QUOTES);
    $categorie = htmlentities($_POST['categorie'], ENT_QUOTES);

    // verificam daca sunt completate
    if ($nume == '' || $pret == '' || $imagine == '' || $short_description == '' || $description == '' || $stoc == '' || $pret_oferta == '' || $recomandat == '' || $categorie == '') {
        // daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';

    } else {
        // insert
        $sql = "INSERT into produs (nume, pret,imagine,short_description,description,stoc,pret_oferta,recomandat,categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sdsssisss", $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
            $stmt->execute();
            $stmt->close();
        }
        // eroare le inserare
        else {
            echo "ERROR: Nu se poate executa insert.";
        }

    }
}
// se inchide conexiune mysqli
$mysqli->close();
if ($error != '') {
    echo $error;
}
?>
<div class="row">
    <div class="col col-lg-12">
        <form action="" method="post">
            Nume: <input type="text" name="nume" value=""> <br>
            Pret: <input type="number" name="pret" value=""><br>
            Selecteaza imaginea produsului: <input type="file" name="imagine" value=""><br>
            Descriere scurta: <input type="text" name="short_description" value=""> <br>
            Descriere: <input type="text" name="description" value=""><br>
            Stoc: <input type="number" name="stoc" value=""><br>
            Pret Oferta: <input type="number" name="pret_oferta" value=""><br>
            Produs Recomandat: <input type="text" name="recomandat" value=""><br>
            Categorie: <input type="text" name="categorie" value=""><br>
            <input type="submit" name="submit" value="Add Product">
        </form>
    </div>
</div>



<?php

require_once '../parts/footer.php'

?>