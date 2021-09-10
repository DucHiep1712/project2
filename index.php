<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Tải file</title>
</head>
<body>

  <div class="container">
    <form method="POST" action="upload.php" enctype="multipart/form-data">
      <button type="button" class="upload-button">
        <label style="cursor: pointer" for="file-button">
          Choose file
        </label>
        <input id="file-button" type="file" name="file">
      </button>
      <button class="upload-button" type="submit" name="submit">Upload</button>
      <div class="separate"></div>
    </form>

    <?php
      $stored = scandir('uploads');
      for ($a = 2; $a < count($stored); $a++) {
        ?>
        <div class="block">
          <a href="uploads/<?php echo $stored[$a] ?>" class="name"><?php echo $stored[$a] ?></a>
          <br>
          <img class="uploaded" src="uploads/<?php echo $stored[$a] ?>">

          <a class="download-button" download="<?php echo $stored[$a] ?>" href="uploads/<?php echo $stored[$a] ?>">
              <img class='download-icon' src="download-icon.png">
              Download
          </a>
        </div>
        <div class="separate"></div>
        <?php
      }
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'none') {
          ?><script>alert ('Tải file lên thành công!');</script><?php
        }
        elseif ($_GET['error'] == 'oversize') {
          ?><script>alert ('Dung lượng file quá lớn để tải lên!');</script><?php
        }
        elseif ($_GET['error'] == '404') {
          ?><script>alert ('Có lỗi xảy ra!');</script><?php
        }
        elseif ($_GET['error'] == 'nofile') {
          ?><script>alert ('Bạn chưa chọn file!');</script><?php
        }
        elseif ($_GET['error'] == 'wrongtype') {
          ?><script>alert ('Không thể tải định dạng file này lên!');</script><?php
        }
      }
    ?>
  </div>

</body>
</html>
