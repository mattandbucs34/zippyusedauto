<?php include('../views/header.php') ?>
<main class='new_vehicle_container'>
  <?php include('../views/managementNav.php') ?>
  <form action="." method="post" class="new_vehicle_form">
    <input type="hidden" name="action" value="add_vehicle" />
    <header>
      <h3>Add New Vehicle</h3>
    </header>
    <div class="label_container">
      <label class="new_vehicle_label" for="model_year">Model Year:
      <!-- <input type="number" name="model_year"> -->
        <select name="model_year">
          <!-- options -->
          <?php foreach($years as $year) : ?>
            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php endforeach; ?>
        </select>
      </label>
  
      <label class="new_vehicle_label" for="make_select">Make:
        <select name="make_select">
          <!-- options -->
          <?php foreach($makes as $make) : ?>
            <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make'] ?></option>
          <?php endforeach; ?>
        </select>
      </label>
  
      <label class="new_vehicle_label" for="model_name">Model:
        <input type="text" name="model_name">
      </label>
  
      <label class="new_vehicle_label" for="price">Price:
        <input type="number" name="price" min="0">
      </label>
  
      <label class="new_vehicle_label" for="class_select">Class:
        <select name="class_select">
          <!-- options -->
          <?php foreach($classes as $class) : ?>
            <option value="<?php echo $class['class_id']; ?>"><?php echo $class['class']; ?></option>
          <?php endforeach; ?>
        </select>
      </label>
  
      <label class="new_vehicle_label" for="type_select">Type:
        <select name="type_select">
          <!--options -->
          <?php foreach($types as $type) : ?>
            <option value="<?php echo $type['type_id']; ?>"><?php echo $type['type']; ?></option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
    <div class="add_btn_container">
      <button type="submit" class="btn"><span class="icon-plus"></span>Add Vehicle</button>
    </div>
  </form>
</main>

<?php include('../../views/footer.php') ?>
