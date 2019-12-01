<?php

require_once('parts/header.php');
$sql = "SELECT id, file_name FROM images WHERE id = 1";
if ($stmt = $mysqli->prepare($sql)) {
    
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        //var_dump($stmt);

       
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $file_name);
            if ($stmt->fetch()) {
                $img_src = "/content/uploads/" . $file_name;
                //var_dump($img_src) ;
            }
        }
    }
}
?>
    <div class="row">
        <div class="col col-lg-12">
            <h1>HELLO ADMIN</h1>
            <img src="<?php echo $img_src?>">
        </div>
    </div>



<?php

require_once('parts/footer.php')

?>