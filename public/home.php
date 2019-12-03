<?php

require_once('../parts/header.php');

require_once('../parts/header.php');
$sql = "SELECT *  FROM produs";
if ($stmt = $mysqli->prepare($sql)) {

    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        $stmt->bind_result($id, $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
        while($stmt->fetch()) {
            $product_image = "/content/uploads/" . $imagine;
        ?>


        <div class="row">
            <div class="col col-lg-4">
                <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $product_image ?>"/>
                        </div>
                        <div class="product-title">
                            <h2><?php echo $nume ?></h2>
                        </div>
                </div>
            </div>

        </div>
        <?php
           
        }

    }
}


require_once('../parts/footer.php')

?>