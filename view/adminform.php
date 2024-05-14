<?php

require_once __DIR__ . '/../controller/sessioncheck.php';
require_once __DIR__ . '/../controller/playerentryprocess.php';
require_once __DIR__ . '/../controller/fetchplayer.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Form</title>
  <link rel="stylesheet" href="view/CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <form action="/form" method="post" class="form">
      <h3><?= $message ?>!!!</h3></br>
      <label for="title">Player Name:</label><br>
      <input type="text" id="title" name="title"><br>
      <label for="run">Run made by player</label>
      <input type="number" id="run" name="run"><br>
      <label for="ball">Ball faced by player</label>
      <input type="number" id="ball" name="ball"><br>
      <input type="submit" name="Submit" class="sub">
    </form>
    <div class="default-show">
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
            Run made: <input type="number" name="run" class="run" placeholder="Write to edit..."><br>
            <button type="button" class="editBtn">Update</button>
          </div>
        </div>
    </div>
  </main>

  <script src="view/JS/script.js"></script>
</body>

</html>
