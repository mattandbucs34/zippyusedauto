<div class="vehicle-list">
  <section>
    <!-- vehicle filters -->
  </section>
  <section>
    <div class="vehicle-list-container">
      <header>
        <h3>Available Vehicles</h3>
        <?php include('../views/sortBy.php') ?>
      </header>
      <div class="vehicle-list-header">
        <div class="list-row">
          <div>Year</div>
          <div>Make</div>
          <div>Model</div>
          <div>Type</div>
          <div>Class</div>
          <div>Price</div>
        </div>
      </div>
      <div class="admin vehicle-list-body">
        <?php foreach($vehicles as $vehicle) : ?>
          <div class="list-row">
            <div><?php echo $vehicle['year']; ?></div>
            <div><?php echo $vehicle['make']; ?></div>
            <div><?php echo $vehicle['model']; ?></div>
            <div><?php echo $vehicle['type']; ?></div>
            <div><?php echo $vehicle['class']; ?></div>
            <div>$<?php echo number_format($vehicle['price'], 2, '.',','); ?></div>
            <div>
              <form action="." method="post">
                <input type="hidden" name="action" value="delete_vehicle" />
                <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>" />
                <input type="hidden" name="type_id" value="<?php echo $vehicle['type_id']; ?>" />
                <input type="hidden" name="make_id" value="<?php echo $vehicle['make_id']; ?>" />
                <input type="hidden" name="class_id" value="<?php echo $vehicle['class_id']; ?>" />
                <button type="submit" class="btn delete">
                  <span class="icon-bin"></span>
                </button>
              </form>  
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
</div>