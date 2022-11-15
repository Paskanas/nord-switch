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
    $output = new OutputHandler();
    $output->showEnteredParameters($this->salary, $this->taxException, $this->additionalIncome, $this->tax);

    $output->output("Options: ");
    $output->output("1-set salary, 2-set tax exemption, 3-set additional income, 4-calculate tax, 5-quit app");
    $option = readline("Enter option: ");
    if ($option == 1) {
      $salaryInput = new InputHandler();
      $this->salary = $salaryInput->validateInput('salary');
      $output->clearConsole();
      $this->main();
    } elseif ($option == 2) {
      $taxInput = new InputHandler();
      $this->taxException = $taxInput->validateInput('tax');
      $output->clearConsole();
      $this->main();
    } elseif ($option == 3) {
      $incomeInput = new InputHandler();
      $this->additionalIncome = $incomeInput->validateInput('income');
      $output->clearConsole();
      $this->main();
    } elseif ($option == 4) {
      if ($this->salary > 0) {
        $taxCalculation = new TaxCalculator($this->salary, $this->taxException, $this->additionalIncome);
        $this->tax = $taxCalculation->calculateTax();
        $output->clearConsole();
      } else {

        $output->output("Need to set salary first!", true);
      }
      $this->main();
    } elseif ($option == 5) {
      exit;
    } else {
      $output->output("Choose correct option!", true);
      $this->main();
    }
  }
}
