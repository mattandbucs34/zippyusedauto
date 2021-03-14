<?php

?>

<aside class="filter-sidebar">
  <header class="filter-header">
    <h3>Filters:</h3>
  </header>
  <section class="year-filter">
    <header><span>Year:</span></header>
    <div class="filter-selection-container">
      <?php foreach($years as $year) : ?>
        <div>
          <label for="<?php echo $year['year'] ?>"><?php echo $year['year'] ?>
            <input name="<?php echo $year ?>[]" type="checkbox" />
          </label>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <section>
    <header><span>Make:</span></header>
    <div class="filter-selection-container">
      <?php foreach($makes as $make) : ?>
        <div>
          <label for="<?php echo $make['make'] ?>"><?php echo $make['make'] ?>
            <input name="<?php echo $make ?>[]" type="checkbox" />
          </label>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <section>
    <header><span>Type:</span></header>
    <div class="filter-selection-container">
      <?php foreach($types as $type) : ?>
        <div>
          <label for="<?php echo $type['type'] ?>"><?php echo $type['type'] ?>
            <input name="<?php echo $type ?>[]" type="checkbox" />
          </label>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <section>
    <header><span>Class:</span></header>
    <div class="filter-selection-container">
      <?php foreach($classes as $class) : ?>
        <div>
          <label for="<?php echo $class['class'] ?>"><?php echo $class['class'] ?>
            <input name="<?php echo $class ?>[]" type="checkbox" />
          </label>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <section class="price-filter">
    <header><span>Price:</span></header>
  </section>
</aside>