<?php
class OutputHandler
{
  public function output($output)
  {
    echo $output;
  }

  public function total_income_output($output)
  {
    echo "Total income: $output" . "\n";
  }
  public function tax_output($output)
  {
    echo "Tax: $output" . "\n";
  }
}
