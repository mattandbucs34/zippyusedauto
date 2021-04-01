<?php
  $firstName = $_SESSION['userid'];
  unset($_SESSION['userid']);
  session_destroy();
  $name = session_name();
  $expire = strtotime('-1 year');
  $params = session_get_cookie_params();
  $path = $params['path'];
  $domain = $params['domain'];
  $secure = $params['secure'];
  $httponly = $params['httponly'];
  setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
  include('header.php');
?>
<main>
  <div>
    <h3>You have been successfully logged out, <?php echo $firstName ?>.</h3>
    <a href="./index.php">Click Here</a> to view our vehicle list.
  </div>
</main>
<?php include('footer.php'); ?>