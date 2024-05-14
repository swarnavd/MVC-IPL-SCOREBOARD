<?php

require_once __DIR__ . '/../model/Query.php';
require_once __DIR__ . '/../controller/Validation.php';

// Initializing object for query class.
$ob = new Query();
$valid = new Validation();
// Collecting data from ajax file.
$id = $_POST['id'];
$name = $_POST['name'];
$ball = $_POST['ball'];
$run = $_POST['run'];
// Initialize strike rate to 0 to avoid division by zero error
$strike = 0;
// Ensure 'ball' is not zero to prevent division by zero
if ($ball !== 0) {
  $strike = ($run / $ball) * 100;
}
if ( $valid->validNumber($ball) && $valid->validPlayer($name)) {
  $ob->updatePlayer($id, $name, $ball, $run, $strike);
}
$player = $ob->fetchPlayer();
?>

<?php if (!empty($player)) : ?>
  <table border="1" width="100%">
    <tr>
      <th>Player name</th>
      <th>Ball faced</th>
      <th>Run made</th>
      <th>Strike rate</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php foreach ($player as $x) : ?>
      <tr>
        <td><?= $x['name'] ?></td>
        <td><?= $x['ball'] ?></td>
        <td><?= $x['run'] ?></td>
        <td><?= $x['strike_rate'] ?></td>
        <td><button type="button" class="edit" name="edit" data-id="<?= $x['id'] ?>">Edit</button></td>
        <td><button type="button" class="delete" name="delete" data-id="<?= $x['id'] ?>">Delete</button></td>
      </tr>
    <?php endforeach; ?>
  <?php endif ?>

  </table>
  <div class="edit-div">
    <div class="edit-form">
      <div class="cross">
        <p>X</p>
      </div>
      Player name: <input type="text" name="name" class="name" placeholder="Write to edit..."><br>
      Ball faced: <input type="number" name="ball" class="ball" placeholder="Write to edit..."><br>
      Run made: <input type="number" name="run" class="price" placeholder="Write to edit..."><br>
      <button type="button" class="editBtn">Update</button>
    </div>
  </div>
  </div>
