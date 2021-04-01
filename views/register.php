<?php include('header.php') ?>
<main>
  <?php if($firstName == NULL) { ?>
    <div class="registration-container">
      <h3 class="registration-header">
        Registration
  </h3>
      <div class="registration-body">
        <form action="." method="GET">
          <input type="hidden" name="action" value="register">
          <label for="first_name">Name:</label>
          <input type="text" name="first_name" id="first_name">
          <div class="register-btn">
            <button class="btn" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  
  <?php } else { ?> 
    <div class="confirmation-message">
      <h3>Thank you for Registering <?php echo $firstName ?>!</h3>
      <a href="./index.php">Click Here</a> to view our vehicle list.
    </div>
  <?php } ?>
</main>
<?php include('footer.php') ?>