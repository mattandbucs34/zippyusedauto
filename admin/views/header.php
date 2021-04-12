<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zippy Used Autos</title>
  <link rel="stylesheet" type="text/css" href="./views/css/zippy.css">
  <link rel="stylesheet" type="text/css" href="./views/css/style.css" >
  <link rel="stylesheet" type="text/css" href="./css/admin.css" >
  <script src="../js/zippy.js"></script>
</head>
<body>
  <header class="main-header">
    <div class="zippy-title">
      <h2>Zippy Used Autos</h2>
    </div>
    <div class="registration-link-container">
      <?php if(isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin'] == true) { ?>
        <a href=".?action=logout">Log Out</a>
      <?php } ?>
    </div>
  </header>