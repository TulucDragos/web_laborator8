<?php

require_once('../parts/header.php');

require_once('../parts/header.php');
$sql = "SELECT *  FROM produs";
if ($stmt = $mysqli->prepare($sql)) {

    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        $stmt->bind_result($id, $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
        ?>
        <div class="row">
        <?php
        while($stmt->fetch()) {
            $product_image = "/content/uploads/" . $imagine;
        ?>



            <div class="col col-lg-4">
                <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $product_image ?>"/>
                        </div>
                        <div class="product-title">
                            <h2><?php echo $nume ?></h2>
                            <h3><?php echo "Pret: " .$pret. " " ?> RON</h3>
                        </div>
                        <div class="product-buttons">
                        <?php $details_url = "/admin/admin_functions/details.php?id=". $id ?>
                        <?php $add_url = "/admin/admin_funtions/add_to_cart.php?id=" . $id ?>
                        <a href="<?php echo $details_url ?>"><button type="button" class="btn btn-primary">View Details</button></a> 
                        <a href="<?php echo $add_url ?>"><button type="button" class="btn btn-primary">Add To Cart</button></a>
                        </div>
                </div>
            </div>


        <?php
           
        }
        ?>
                </div>
                <?php

    }
}


require_once('../parts/footer.php')

?>