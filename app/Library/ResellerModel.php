<?

namespace App\Http\Library;

use Illuminate\Http\Request;

/**
 * 
 */
class ResellerModel
{
	public $shop, $margin, $startDate, $endDate, $target;


	//A constructor for inputs
	public function __construct($shop, $margin, $startDate, $endDate;)
	{
		$this->shop = $shop;
		$this->margin = $margin;
		$this->startDate = $startDate;
		$this->endDate = $endDate;

	}

	public function releaseProgram()
	{
		//If current date is $this->startDate
		//return True
		date('Y-m-d') == $this->startDate ? return true: return false;

	}

	public function joinProgram($joined = true)
	{
		if($this->releaseProgram() and  !$joined)
			return true;
		else
			return false;
	}
	public function monitorProgram($currentSells)
	{
		switch ($currentSells) {
			case $currentSells >= (0.3*$this->target) and $currentSells < (0.5*$this->target):
				return 1;
				break;
			case $currentSells >= (0.5*$this->target) and $currentSells < (0.8*$this->target):
				return 2;
				break;

			case $currentSells >= (0.8*$this->target):
				return 3;
				break;
			default:
				return 0;
				break;
		}
	}

	public function inactiveProgram()
	{
		date("Y-m-d") == $this->endDate ? return true : return false; 
	}

	public function giveBenefits($users, $totalSold, $marignPerSell)
	{
		$earningPerUser = array();
		foreach ($users as $user) {
			$amountAfterMargin = ($totalSold * $marignPerSell) / 100;
			$amountToMarkoverse =  $amountAfterMargin * 0.25;
			$amountToUser = $amountAfterMargin - $amountToMarkoverse;
			$earningPerUser[$user] = $amountToUser;
		}
		return $earningPerUser;
	}

	public function leaveProgram($user, $joined=true)
	{
		$joined ? return true: return false;
	}	

	public function deleteProgram($data)
	{
		//make Json of all the data,
		json_encode($data);
		Store::s3($data);
		return true;
		//Store in deleted table.
		//With the digital Footprint.

	}

	//Function to release the program.
	//Function to join the program.
	//Function to join the program.
	//Function to monitor the program.
	//Function to leave the program.
	//Function to give the benefits to the attendents.

}