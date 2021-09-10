<?php
  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 500000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          header("Location: index.php?error=none");
        }
        else {
          header("Location: index.php?error=oversize");
        }
      }
      else {
        header("Location: index.php?error=404");
      }
    }
    else {
      if ($fileSize == 0) {
        header("Location: index.php?error=nofile");
      }
      else {
        header("Location: index.php?error=wrongtype");
      }
    }
  }
