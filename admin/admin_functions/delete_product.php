<?php

require_once('../parts/header.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // preluam variabila 'id' din URL
 $id = $_GET['id'];

 // stergem inregistrarea cu ibstudent=$id
 if ($stmt = $mysqli->prepare("DELETE FROM produs WHERE id = ? LIMIT 1"))
 {
 $stmt->bind_param("i",$id);
 $stmt->execute();
 $stmt->close();
 }
 else
 {
 echo "ERROR: Nu se poate executa delete.";
 }
 $mysqli->close();
 echo "<div>Inregistrarea a fost stearsa!!!!</div>";
 }
 else {
     echo "Ceva nu e bine";
}

 echo "<p><a href=\"all_products.php\">Vezi toate produsele</a></p>";

require_once('../parts/footer.php');