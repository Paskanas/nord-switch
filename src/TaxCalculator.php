<?php
class TaxCalculator
{
  public $total_income = 0;
  public function __construct($salary, $tax_exemption, $additional_income)
  {
    $this->total_income = $salary + $additional_income - $tax_exemption;
  }

  public function calculateTax()
  {
    if ($this->total_income < 30000) {
      $tax = $this->total_income * 0.20;
    } else {
      $tax = $this->total_income * 0.25;
    }
    return $tax;
  }
}
