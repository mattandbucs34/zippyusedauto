<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zippy Used Autos</title>
  <link rel="stylesheet" type="text/css" href="../admin/views/css/zippy.css">
  <link rel="stylesheet" type="text/css" href="../admin/views/css/style.css" >
  <link rel="stylesheet" type="text/css" href="../admin/css/admin.css" >
  <script src="../admin/js/zippy.js"></script>
</head>
<body>
  <header class="main-header">
    <div class="zippy-title">
      <h2>Zippy Used Autos</h2>
    </div>
  </header>
  <main class="login-main">
    <form class="login-form" action="." method="post">
      <header>
      <?php if(isset($login_message)) { ?><h3 class="login-error"><?php echo($login_message) ?></h3> <?php } ?>
        <h3>Administrator Log In</h3>
      </header>
      <div class="registration-body login">
        <input type="hidden" name="action" value="login">
        <div class="login-input-container">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username">
        </div>
        <div class="login-input-container">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" >
        </div>
        <footer class="form-footer">
          <button class="btn">Log In</button>
        </footer>
      </div>
    </form>
  </main>
  
</body>
</html>
