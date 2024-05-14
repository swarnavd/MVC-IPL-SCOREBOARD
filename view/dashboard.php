<?php

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
          <li>Dash Board</li>
          <li><a href="/Home">Home</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <div class="default-show">
      <?php if (!empty($player)) : ?>
        <table border="1" width="100%">
          <tr>
            <th>Player name</th>
            <th>Ball faced</th>
            <th>Run made</th>
            <th>Strike rate</th>
          </tr>
          <?php foreach ($player as $x) : ?>
            <tr>
              <td><?= $x['name'] ?></td>
              <td><?= $x['ball'] ?></td>
              <td><?= $x['run'] ?></td>
              <td><?= $x['strike_rate'] ?></td>

            </tr>
          <?php endforeach; ?>
        <?php endif ?>

        </table>
        <div class="mom">
          <button type="button" class="mom" name="mom">See MOM</button>
        </div>
        <div class="result">

        </div>
    </div>
  </main>

  <script src="view/JS/script.js"></script>
</body>

</html>
