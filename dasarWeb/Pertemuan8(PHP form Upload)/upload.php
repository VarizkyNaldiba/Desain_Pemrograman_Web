<?php
if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $targetfile = $target_dir . basename($_FILES["myfile"]["name"]);
    $filetype = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx");
    $maxsize = 3*1024*1024;
    if (in_array($filetype, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxsize) {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File Uploaded";

            echo '<img src="' . $targetfile . '" style="width: 200px; height: auto;" alt="Thumbnail">';
        } else {
            echo "File Not Uploaded";
        }
    } else {
        echo "File Not Allowed";
    }
}
?>
