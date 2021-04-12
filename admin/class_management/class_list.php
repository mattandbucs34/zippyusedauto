<?php include('../views/headers.php') ?>
  <main class="classes-container">
  <?php include('../views/managementNav.php') ?>
    <section class="class-list-container">
      <header><h3>Classes</h3></header>
      <div class="class-list-grid">
        <div class="class-list-body">
          <?php foreach($classes as $class) : ?>
            <div class="list-row">
              <div><?php echo $class['class']; ?></div>
              <form action="." method="POST">
                <input type="hidden" name="action" value="delete_class" />
                <input type="hidden" name="class_id" value="<?php echo $class['class_id']; ?>">
                <button type="submit" class="btn delete">
                  <span class="icon-bin"></span>
                </button>
              </form>
            </div>
          <?php endforeach ?>
        </div>
        <form action="." method="post">
          <input type="hidden" name="action" value="add_new_class">
          <label for="class_name">Name:</label>
          <input type="text" name="class_name" />
          <button type="submit" ><span class="icon-plus"></span>Add</button>
        </form>
      </div>
    </section>
  </main>
<?php include('../../views/footer.php') ?>