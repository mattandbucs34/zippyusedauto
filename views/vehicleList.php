<div class="vehicle-list">
  <section>
    <!-- vehicle filters -->
  </section>
  <section>
    <div class="vehicle-list-container">
      <header>
        <h3>Available Vehicles</h3>
        <?php include('sortBy.php') ?>
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
      <div class="vehicle-list-body">
        <?php foreach($vehicles as $vehicle) : ?>
          <div class="list-row">
            <div><?php echo $vehicle['year']; ?></div>
            <div><?php echo $vehicle['make']; ?></div>
            <div><?php echo $vehicle['model']; ?></div>
            <div><?php echo $vehicle['type']; ?></div>
            <div><?php echo $vehicle['class']; ?></div>
            <div>$<?php echo number_format($vehicle['price'], 2, '.',','); ?></div>
          
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
</div>