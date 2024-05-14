<?php

require_once __DIR__ . '/../model/Query.php';

$ob = new Query();
$player = $ob->calculatemom();
?>
<table border="1" width="100%">
  <tr>
    <th>Player name</th>
  </tr>
  <?php foreach ($player as $x) : ?>
    <tr>
      <td><?= $x['name'] ?></td>
    </tr>
  <?php endforeach; ?>

</table>
