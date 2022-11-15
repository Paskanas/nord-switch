<?php
class InputHandler
{
  public $validation = '';

  public function validateInput()
  {

    if ($_POST['salary'] < 0) {
      $this->validation .= 'Salary cannot be negative. Try again.' . '<br>';
    }

    if ($_POST['tax_exemption'] < 0) {
      $this->validation .= 'Tax exemption cannot be negative. Try again.' . '<br>';
    }
    if ($_POST['tax_exemption'] > $_POST['salary']) {
      $this->validation .= 'Tax exemption cannot be more then salary. Try again.' . '<br>';
    }
    if ($_POST['additional_income'] < 0) {
      $this->validation .= 'Additional income cannot be negative. Try again.' . '<br>';
    }
    return $this->validation;
  }
}
class OutputHandler
{
  public function output($output)
  {
    echo $output;
  }

  public function total_income_output($output)
  {
    echo "Total income: $output" . '<br>';
  }
  public function tax_output($output)
  {
    echo "Tax: $output" . '<br>';
  }
}
class TaxCalculator
{
  public function calculateTax($total_income)
  {
    if ($total_income < 30000) {
      $tax = $total_income * 0.20;
    } else {
      $tax = $total_income * 0.25;
    }
    return $tax;
  }
}
class MainClass
{
  public $total_income = 0;
  public function main()
  {
    if ($_POST) {
      $validateInputs = new InputHandler();
      $output = new OutputHandler();
      $inputValidation = $validateInputs->validateInput();
      if ($inputValidation) {
        $output->output($inputValidation);
      } else {
        $this->total_income = $_POST['salary'] + $_POST['additional_income'] - $_POST['tax_exemption'];
        $calculateTax = new TaxCalculator();
        $output->total_income_output($this->total_income);
        $output->tax_output($calculateTax->calculateTax($this->total_income));
      }
    }
  }
}

if (count($_POST) === 0  || (!isset($_POST['quit']) && count($_POST) > 0)) {
?>
  <form action="" method="post">
    <label for="salary">Salary</label>
    <input type="number" min='0' name='salary'>
    <label for="tax_exemption">Tax exemption</label>
    <input type="number" min='0' name="tax_exemption">
    <label for="additional_income">Additional income</label>
    <input type="number" min='0' name="additional_income">
    <button type="submit">Calculate Tax</button>
    <button type="submit" name='quit'>Quit</button>
  </form>
<?php
}
if ($_POST && !isset($_POST['quit'])) {
  $main = new MainClass();
  $main->main();
}
