<?php
require_once __DIR__ . '/../model/Connection.php';
class Query {
  /**
   * A function to insert every details of a player by admin.
   *
   * @param string $name
   *  Stores player's name.
   * @param integer $ball
   *  Stores the number of ball faced by a particular player.
   * @param integer $run
   *  Stores the run made by a player.
   * @param integer $strike
   *  Stores the calculated strike rate in database.
   *
   * @return void
   */
  public function insertPlayer(string $name, int $ball, int $run, int $strike) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO player (name, ball, run, strike_rate) VALUES(:name, :ball, :run, :strike_rate)");
      $sql->execute(array(':name' => $name, ':ball' => $ball, ':run' => $run, ':strike_rate' => $strike));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is already registered or not.
   *
   * @param string $email
   * User's email id.
   *
   * @return boolean
   *  Returns true if user's email is existed else false.
   */
  public function isExistingUser(String $email) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$email'");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row > 0) {
        return 1;
      }
      else {
        return 0;
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is exists in database or not.
   *
   * @param string $usr
   *  Stores user's email address.
   *
   * @return array
   */
  public function validUser(String $usr) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$usr'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to fetch all the player's details.
   *
   * @return array
   */
  public function fetchPlayer() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM player");
      $sql->execute();
      $user = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to delete a particular player's details based on id of a player.
   *
   * @param integer $id
   *  Stores player id.
   *
   * @return void
   */
  public function deletePlayer(int $id) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("DELETE FROM player WHERE id = $id");
      $sql->execute();
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to update the details of player when admin wants to.
   *
   * @param integer $id
   *  Stores player's id.
   * @param string $name
   *  Stores player's name.
   * @param integer $ball
   *  Stores the number of balls faced by a particular player.
   * @param string $run
   *  Store the run made by a player.
   * @param integer $strike
   *  Stores calculated strike rate of a particular player.
   *
   * @return void
   */
  public function updatePlayer(int $id, string $name, int $ball, string $run, int $strike) {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("UPDATE player SET name=:name, ball=:ball, run=:run, strike_rate=:strike_rate WHERE id=:id");
    $sql2->bindParam(':name', $name, PDO::PARAM_STR);
    $sql2->bindParam(':ball', $ball, PDO::PARAM_INT);
    $sql2->bindParam(':run', $run, PDO::PARAM_STR);
    $sql2->bindParam(':strike_rate', $strike, PDO::PARAM_INT);
    $sql2->bindParam(':id', $id, PDO::PARAM_INT);
    $sql2->execute();
  }

  /**
   * A function to calculate who is the man of the match based on highest strike
   * rate.
   *
   * @return array
   */
  public function calculatemom() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT name FROM player WHERE strike_rate = (SELECT MAX(strike_rate) FROM player)");
      $sql->execute();
      $user = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to identify if the number of player is greater than 11 or not.
   *
   * @return bool
   */
  public function calculatePlayer() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM player");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row <= 10) {
        return 1;
      }
      else {
        return 0;
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }
}
