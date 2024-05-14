<?php
/**
 * A class to validate any type of input.
 */

class Validation {
  /**
   * A function to check that email format is valid or not.
   *
   * @param string $email
   *  User's registered email.
   *
   * @return bool
   *  Returns true if it contains correct email.
   */
  public function validEmail(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    return FALSE;
  }
  /**
   * A function to checks that a field is contains only number or not.
   *
   * @param string $number
   *  User's provided input.
   *
   * @return bool
   *  Returns true if it contains only number.
   */
  public function validNumber(int $number) {
    $numberRegex = '/^\d+$/';
    if (preg_match($numberRegex, $number)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * A function to check if a stock's name contains only alphabet or not.
   *
   * @param string $name
   *  Player's name.
   *
   * @return bool
   *  Returns true if name only contains alphabet else false.
   */
  public function validPlayer(string $name) {
    $namePattern = '/^[a-zA-Z]+$/';
    if (preg_match($namePattern, $name)) {
      return TRUE;
    }
    return FALSE;
  }
}
