<?php include('../views/mgmtHeader.php') ?>
  <main class="makes_container">
    <?php include('../views/managementNav.php') ?>
    <section class="class-list-container">
      <header><h3>Makes</h3></header>
      <div class="class-list-grid">
        <div class="class-list-body">
          <?php foreach($makes as $make) : ?>
            <div class="list-row">
              <div><?php echo $make['make']; ?></div>
              <form action="." method="POST">
                <input type="hidden" name="action" value="delete_make" />
                <input type="hidden" name="make_id" value="<?php echo $make['make_id']; ?>">
                <button type="submit" class="btn delete">
                  <span class="icon-bin"></span>
                </button>
              </form>
            </div>
          <?php endforeach ?>
        </div>
        <form action="." method="post">
          <input type="hidden" name="action" value="add_new_make">
          <label for="make_name">Name:</label>
          <input type="text" name="make_name" />
          <button type="submit"><span class="icon-plus"></span>Add</button>
        </form>
      </div>
    </section>
  </main>
<?php include('../../views/footer.php') ?>