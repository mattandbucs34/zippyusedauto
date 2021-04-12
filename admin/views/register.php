<?php 
  if(!check_valid_admin()) {
    header("Location: .?action=show_login");
  }
  include('header.php')
?>
<main class="login-main">
  <?php if(isset($errors)) {
    foreach ($errors as $error) : ?>
      <p class="error"><?php echo $error ?></p>
    <?php endforeach; } ?> 
  <form action="." method="post">
    <header>
      <?php if($success) { ?><h3>That user has been added</h3><?php } ?>
      <h3>Administrator New User Registration</h3>
    </header>
    <div class="registration-body login">
      <input type="hidden" name="action" value="register">
      <div class="login-input-container">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
      </div>
      <div class="login-input-container">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="login-input-container">
        <label for="confirm_pwd">Confirm Password:</label>
        <input type="password" name="confirm_pwd" id="confirm_pwd">
      </div>
      <footer class="form-footer">
        <button class="btn">Register</button>
      </footer>
    </div>
  </form>
</main>
<?php 
  include('footer.php') 
?>