<?

namespace App\Library;
use App\DailySells;



class LuckyDrawWinner
{
    
    public $user_id;

    public function __constructor($user_id)
    {
        $this->user_id = $user_id;
    }


    public function getPurchasingData()
    {
        $total_purchase = DailySells::where('customer_id', $user_id)
                                    ->where('fullfilled', 0)
                                    ->where('created_at', '>', '2021-02-09 00:13:09')
                                    ->select('paid')
                                    ->get();

        return array_sum($total_purchase);

    }

    //Earth Radius 6357;
    public function assignScoreBasedOnPurchasing()
    {
        return $this->getPurchasingData() + (2* 3.14 * 0.6357);
    }


}
