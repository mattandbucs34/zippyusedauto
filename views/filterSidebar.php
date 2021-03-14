<?php
  // include('./controllers/filtersController.php');
?>

<aside class="filter-sidebar">
  <form action="." method="POST">
    <input type="hidden" name="action" value="select_filter" />
    <header class="filter-header">
      <h3>Filters:</h3>
    </header>
    <section class="price-filter">
      <header><span>Price:</span></header>
      <div class="filter-selection-container">
        <div>
          <label for="price-greater-than-100">
            Greater than $100,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="100" <?php if(!empty($prices) && in_array(100, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
        <div>
          <label for="price-75-to-100">
            $75,000 - $100,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="75" <?php if(!empty($prices) && in_array(75, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
        <div>
          <label for="price-50-to-75">
            $50,000 - $75,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="50" <?php if(!empty($prices) && in_array(50, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
        <div>
          <label for="price-25-to-50">
            $25,000 - $50,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="25" <?php if(!empty($prices) && in_array(25, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
        <div>
          <label for="price-10-to-25">
            $10,000 - $25,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="10" <?php if(!empty($prices) && in_array(10, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
        <div>
          <label for="price-less-than-10">
            Less than $10,000
            <input onchange="this.form.submit()"  type="checkbox" name="price_select[]" value="9" <?php if(!empty($prices) && in_array(9, $prices)) { ?> checked <?php } ?>>
          </label>
        </div>
      </div>
    </section>
    <section class="year-filter">
      <header><span>Year:</span></header>
      <div class="filter-selection-container">
        <?php foreach($years as $year) : ?>
          <div>
            <label for="<?php echo $year['year'] ?>">
              <?php echo $year['year'] ?>
              <input onchange="this.form.submit()"  name="year_select[]" value="<?php echo $year['year'] ?>" type="checkbox" <?php if(!empty($selectedYears) && in_array($year['year'], $selectedYears)) { ?> checked <?php } ?> />
            </label>
          </div>
        <?php endforeach ?>
      </div>
    </section>
    <section class="make-filter">
      <header><span>Make:</span></header>
      <div class="filter-selection-container">
        <?php foreach($makes as $make) : ?>
          <div>
            <label for="<?php echo $make['make'] ?>"><?php echo $make['make'] ?>
              <input onchange="this.form.submit()"  name="make_select[]" value="<?php echo $make['make_id'] ?>" type="checkbox" <?php if(!empty($selectedMakes) && in_array($make['make_id'], $selectedMakes)) { ?> checked <?php } ?>/>
            </label>
          </div>
        <?php endforeach ?>
      </div>
    </section>
    <section class="type-filter">
      <header><span>Type:</span></header>
      <div class="filter-selection-container">
        <?php foreach($types as $type) : ?>
          <div>
            <label for="<?php echo $type['type'] ?>"><?php echo $type['type'] ?>
              <input onchange="this.form.submit()"  name="types_select[]" value="<?php echo $type['type_id'] ?>" type="checkbox" <?php if(!empty($selectedTypes) && in_array($type['type_id'], $selectedTypes)) { ?> checked <?php } ?> />
            </label>
          </div>
        <?php endforeach ?>
      </div>
    </section>
    <section class="class-filter">
      <header><span>Class:</span></header>
      <div class="filter-selection-container">
        <?php foreach($classes as $class) : ?>
          <div>
            <label for="<?php echo $class['class'] ?>"><?php echo $class['class'] ?>
              <input onchange="this.form.submit()"  name="classes_select[]" value="<?php echo $class['class_id'] ?>" type="checkbox" <?php if(!empty($selectedClasses) && in_array($class['class_id'], $selectedClasses)) { ?> checked <?php } ?> />
            </label>
          </div>
        <?php endforeach ?>
      </div>
    </section>
  </form>
</aside>