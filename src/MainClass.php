<?php
require_once('./src/InputHandler.php');
require_once('./src/OutputHandler.php');
require_once('./src/TaxCalculator.php');
class MainClass
{
  public $total_income = 0;
  public function main()
  {
    $salaryInput = new InputHandler();
    $salary = $salaryInput->validateInput('salary');
    $taxInput = new InputHandler();
    $tax = $taxInput->validateInput('tax');
    $incomeInput = new InputHandler();
    $income = $incomeInput->validateInput('income');

    $taxCalculation = new TaxCalculator($salary, $tax, $income);
    $output = new OutputHandler();
    $output->tax_output($taxCalculation->calculateTax());
    // $quit = readline('Do you want to continue y/n: ');
    $quit = '';
    while (($quit != 'y') && ($quit != 'n')) {
      echo "$quit \n";
      $quit = readline('Do you want to continue y/n: ');
      if ($quit === 'y') {
        $this->main();
      } elseif ($quit === 'n') {
        exit;
      }
    };
    // if ($_POST) {
    //   $validateInputs = new InputHandler();
    //   $output = new OutputHandler();
    //   $inputValidation = $validateInputs->validateInput();
    //   if ($inputValidation) {
    //     $output->output($inputValidation);
    //   } else {
    //     $this->total_income = $_POST['salary'] + $_POST['additional_income'] - $_POST['tax_exemption'];
    //     $calculateTax = new TaxCalculator();
    //     $output->total_income_output($this->total_income);
    //     $output->tax_output($calculateTax->calculateTax($this->total_income));
    //   }
    // }
  }
}
