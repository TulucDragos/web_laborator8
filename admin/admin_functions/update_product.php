<?php

require_once '../parts/header.php';
$error = "";
if (!empty($_POST['id'])) {
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['id'])) {
            $id = $_POST['id'];
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
                $sql = "UPDATE  produs SET nume=?, pret=?,imagine=?,short_description=?,description=?,stoc=?,pret_oferta=?,recomandat=?,categorie=? WHERE id =" . $id;
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("sdsssisss", $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
                    $stmt->execute();
                    $stmt->close();
                }
                // eroare le inserare
                else {
                    echo "ERROR: Nu se poate executa update.";
                }
        
            }
        }
        else {
            echo "id-ul nu este valid";
        }
        
    }

}

// se inchide conexiune mysqli
//$mysqli->close();
if ($error != '') {
    echo $error;
}
?>
<div class="row center">
    <div class="col col-lg-12">
    <h1><?php if ($_GET['id'] != '') { echo "Modificare Inregistrare"; }?></h1>
    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";
    }?>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <p>ID: <?php echo $_GET['id'];
        $sql = "SELECT * FROM produs where id =" . $_GET['id'];
        if ($result = $mysqli->query($sql))
        {
            if ($result->num_rows > 0)
                { $row = $result->fetch_object(); ?></p>
            Nume: <input type="text" name="nume" value="<?php echo $row->nume ?>"> <br>
            Pret: <input type="number" name="pret" value="<?php echo $row->pret ?>"><br>
            Selecteaza imaginea produsului: <input type="file" name="imagine" value="<?php echo $row->imagine ?>"><br>
            Descriere scurta: <input type="text" name="short_description" value="<?php echo $row->short_description ?>"> <br>
            Descriere: <input type="text" name="description" value="<?php echo $row->description ?>"><br>
            Stoc: <input type="number" name="stoc" value="<?php echo $row->stoc ?>"><br>
            Pret Oferta: <input type="number" name="pret_oferta" value="<?php echo $row->pret_oferta ?>"><br>
            Produs Recomandat: <input type="text" name="recomandat" value="<?php echo $row->recomandat ?>"><br>
            Categorie: <input type="text" name="categorie" value="<?php echo $row->categorie ?>"><br>
            <input class="btn btn-primary" type="submit" name="submit" value="Update Product">
            <br>
            <br>
            <?php
                }
            }
            ?>

        </form>



<?php

require_once '../parts/footer.php'

?>