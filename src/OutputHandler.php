<?php
class OutputHandler
{
  public function clearConsole()
  {
    print("\033[2J\033[;H");
  }

  public function output($output, $clear = false)
  {
    if ($clear) {
      $this->clearConsole();
    }
    echo $output . " \n";
  }

  public function tax_output($output)
  {
    echo "Tax: $output" . "\n";
  }
  public function showEnteredParameters($salary, $taxException, $additionalIncome, $tax)
  {
    if ($salary > 0) {
      echo "Salary: $salary\n";
    }
    if ($taxException > 0) {
      echo "Tax exception: $taxException\n";
    }
    if ($additionalIncome > 0) {
      echo "Additional income: $additionalIncome\n";
    }
    if ($tax > 0) {
      $this->tax_output($tax);
    }
  }
}
