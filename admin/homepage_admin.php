<?php require_once 'parts/header.php'; ?>


<div class="row">
    <div class="columns large-12 small-12">
        <h1>HELLO ADMIN</h1>
    </div>
</div>

<?php
$sql = "SELECT *  FROM produs";
if ($stmt = $mysqli->prepare($sql)) {

    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        //var_dump($stmt);
        ?>
            <div clas="row">

            
        <?php
        $stmt->bind_result($id, $nume, $pret, $imagine, $short_description, $description, $stoc, $pret_oferta, $recomandat, $categorie);
        while($stmt->fetch()) {
            $product_image = "/content/uploads/" . $imagine;
        ?>


        
            <div class="col col-lg-4">
            <div class="product">
                    <div class="product-image">
                        <img style="width:100%;" src="<?php echo $product_image ?>"/>
                    </div>
                    <div class="product-title">
                        <h2><?php echo $nume ?></h2>
                    </div>
            </div>
        </div>
        <?php
           
        }

    }
}
?>
</div>
</div>
</div>



<?php

require_once 'parts/footer.php'

?>