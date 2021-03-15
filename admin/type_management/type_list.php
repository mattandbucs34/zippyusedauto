<?php include('../head.php') ?>
  <main>
    <aside></aside>
    <section class="class-list-container">
      <header><h3>Types</h3></header>
      <div class="class-list-grid">
        <div class="class-list-body">
          <?php foreach($types as $type) : ?>
            <div class="list-row">
              <div><?php echo $type['type']; ?></div>
              <form action="." method="POST">
                <input type="hidden" name="action" value="delete_type" />
                <input type="hidden" name="type_id" value="<?php echo $type['type_id']; ?>">
                <button type="submit" class="btn delete">
                  <span class="icon-bin"></span>
                </button>
              </form>
            </div>
          <?php endforeach ?>
        </div>
        <form action="." method="post">
          <input type="hidden" name="action" value="add_new_type">
          <label for="type_name">Name:</label>
          <input type="text" name="type_name" />
          <button type="submit"><span class="icon-plus"></span>Add</button>
        </form>
      </div>
    </section>
  </main>
<?php include('../../views/footer.php') ?>