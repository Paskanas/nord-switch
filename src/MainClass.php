<?php
require_once('./src/InputHandler.php');
require_once('./src/OutputHandler.php');
require_once('./src/TaxCalculator.php');
class MainClass
{
  public $total_income = 0;
  public $salary;
  public $taxException;
  public $additionalIncome;
  public $tax;

  public function main()
  {
    if ($this->salary > 0) {
      echo "Salary: $this->salary\n";
    }
    if ($this->taxException > 0) {
      echo "Tax exception: $this->taxException\n";
    }
    if ($this->additionalIncome > 0) {
      echo "Additional income: $this->additionalIncome\n";
    }
    if ($this->tax > 0) {
      $output = new OutputHandler();
      $output->tax_output($this->tax);
    }

    echo "Options: \n";
    echo "1-set salary, 2-set tax exemption, 3-set additional income, 4-calculate tax, 5-quit app\n";
    $option = readline("Enter option: ");
    if ($option == 1) {
      $salaryInput = new InputHandler();
      $this->salary = $salaryInput->validateInput('salary');
      print("\033[2J\033[;H");
      $this->main();
    } elseif ($option == 2) {
      $taxInput = new InputHandler();
      $this->taxException = $taxInput->validateInput('tax');
      print("\033[2J\033[;H");
      $this->main();
    } elseif ($option == 3) {
      $incomeInput = new InputHandler();
      $this->additionalIncome = $incomeInput->validateInput('income');
      print("\033[2J\033[;H");
      $this->main();
    } elseif ($option == 4) {
      if ($this->salary > 0) {
        $taxCalculation = new TaxCalculator($this->salary, $this->taxException, $this->additionalIncome);
        $this->tax = $taxCalculation->calculateTax();
      } else {
        print("\033[2J\033[;H");
        echo "Need to set salary first! \n";
      }
      $this->main();
    } elseif ($option == 5) {
      exit;
    } else {
      print("\033[2J\033[;H");
      echo "Choose correct option! \n";
      $this->main();
    }
  }
}
