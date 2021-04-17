<?php

namespace App\Library;

use DB;
class ShopCustomerWeight
{
    //Get the total bill  paid till date to the shop.
    public function totalBillPaidToShop()
    {
      return 10000; 
    }
    //Get the SellsDdata of customer  & shop of past 4 months.
    public function sd()
    {
      return 100;
    }
    //Get the total Invested Time.
    public function investedAmount()
    {
        return 1000;
    }

    public function eulerNumber()
    {
        return 2.71828;

    }

    //write the function to calculate the weight.
    public function weight()
    {
          $weight =   log10((sqrt($this->totalBillPaidToShop() + $this->investedAmount() ) ) + sqrt($this->sd())) / $this->eulerNumber();
          return $weight;
    }
    //store the weight.
    public function storeWeight()
    {
        
    }
    //do this after every sell to the customer.

}
