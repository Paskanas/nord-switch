<?php
class InputHandler
{
  private $validation = '';
  private $input = 0;
  public function validateInput($text)
  {
    $this->input = readline("Enter $text: ");
    if ($this->input < 0) {
      $this->validation .= 'Number cannot be negative. Try again.' . "\n";
    }

    if ($this->input > 100) {
      $this->validation .= 'Tax exemption cannot be more than 100. Try again.' . "\n";
    }

    if ($this->validation) {
      echo $this->validation . "\n";
      $this->validation = '';
      $this->validateInput($text);
    }
    return $this->input;
  }
}
