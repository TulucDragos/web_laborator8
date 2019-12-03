<?php

require_once('../parts/header.php');
$sql = "SELECT *  FROM produs";
if ($stmt = $mysqli->prepare($sql)) {

    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        //var_dump($stmt);
        ?>
           

            
        <?php
        $stmt->bind_result($id, $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
        while($stmt->fetch()) {
            $product_image = "/content/uploads/" . $imagine;
        ?>


        <div class="row">
            <div class="col col-lg-6">
                <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $product_image ?>"/>
                        </div>
                        <div class="product-title">
                            <h2><?php echo $nume ?></h2>
                        </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <h1>Action buttons</h1>
                <?php $update_url = "/admin/admin_functions/update_product.php?id=". $id . ""; ?>
                <a href="<?php echo $update_url ?>"><button type="button" class="btn btn-info">Update</button></a>
                <?php $delete_url = "/admin/admin_functions/delete_product.php?id=". $id . "";?>
                <a href="<?php echo $delete_url ?>"><button type="button" class="btn btn-danger">Delete</button></a>
            </div>
        </div>
        <?php
           
        }

    }
}
?>



<?php

require_once('../parts/footer.php')

?>