<?php

require_once('../parts/header.php');
$sql = "SELECT * FROM produs";
if ($stmt = $mysqli->prepare($sql)) {
    if ($stmt->execute()) { 
        $stmt->store_result();
    }
}
?>
    <div class="row">
        <div class="col col-lg-12">
            
        </div>
    </div>



<?php

require_once('../parts/footer.php')

?>