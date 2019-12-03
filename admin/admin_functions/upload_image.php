<?php require_once "../parts/header.php";

?>
<div class="wrapper">
    <?php
// File upload path
$targetDir = "../../content/uploads/";
$fileName = basename($_FILES["imagine"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["submit"]) && !empty($_FILES["imagine"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["imagine"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $sql = "INSERT into images (file_name) VALUES (?)";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $fileName);

                $stmt->execute();

            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
    <div class="form-wrapper">
        <h1>Adauga o imagine</h1>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
            Select Image File to Upload:
            <input type="file" name="imagine">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</div>

<?php
require_once '/parts/footer.php';