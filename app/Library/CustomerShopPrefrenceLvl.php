<?

namespace App\Library;
use DB;

class ShopCustomerReferenceModel
{
    /*
    * Lvl1 is the shop, customer visit frequently.
    * Lvl2 is the shop, customer visit as new customer.
    * Lvl3 is the shop, customer never visits. 
    */


    public function defaultRefPoints()
    {
    	//If User Signed Up.
    	//Donate the 10 ref points to them for nearest shop.

    }

    public function getRefPointsOnBringingUsers()
    {
    	//Add +10 further.

    }

    public function getRefPointsOnBringingShops()
    {
    	//Add +20 further.
    }

    public function releaseRefPointsOnEveryShoping()
    {
    	//Release the ref points after shopping.
    	//More you pay less you release.
    	//Get the points for other shops.
    }

    public function cardRefConnection()
    {

    } 

}