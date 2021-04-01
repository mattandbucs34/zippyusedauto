<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zippy Used Autos</title>
  <link rel="stylesheet" type="text/css" href="css/zippy.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" >
  
</head>
<body>
  <header class="main-header">
    <div class="zippy-title">
      <h2>Zippy Used Autos</h2>
    </div>
    <div class="registration-link-container">
      <?php if(($action != 'register' && $action != 'logout') && !isset($_SESSION['userid'])) { print_r($action) ?>
        <a href=".?action=register">Register</a>
        <?php }else if(($action != 'register' && $action != 'logout') && isset($_SESSION['userid'])) { ?>
          <a href=".?action=logout">Log Out</a>
      <?php } ?>
    </div>
  </header>