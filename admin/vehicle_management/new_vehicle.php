<?php include('../head.php') ?>
<main>
  <form action="" method="post">
    <label for="model_year">Model Year:</label>
    <!-- <input type="number" name="model_year"> -->
    <select name="model_year">
      <!-- options -->
      <?php foreach($years as $year) : ?>
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="make_select">Make:</label>
    <select name="make_select">
      <!-- options -->
      <?php foreach($makes as $make) : ?>
        <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make'] ?></option>
      <?php endforeach; ?>
    </select>

    <label for="model_name">Model:</label>
    <input type="text" name="model_name">

    <label for="price">Price:</label>
    <input type="number" name="price">

    <label for="class_select">Class:</label>
    <select name="class_select">
      <!-- options -->
      <?php foreach($classes as $class) : ?>
        <option value="<?php echo $class['class_id']; ?>"><?php echo $class['class']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="type_select">Type:</label>
    <select name="type_select">
      <!--options -->
      <?php foreach($types as $type) : ?>
        <option value="<?php echo $type['type_id']; ?>"><?php echo $type['type']; ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit"><span class="icon-plus">Add Vehicle</button>
  </form>
</main>

<?php include('../../views/footer.php') ?>
