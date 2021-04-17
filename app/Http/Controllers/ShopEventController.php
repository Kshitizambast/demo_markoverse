<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopEventController extends Controller
{

	public function __constructor()
	{
		return $this->middleware('auth:shop');
	}

    public function index()
    {
    	return view('sellerDashboard.events.index');
    }

    public function createEvent()
    {

    }

    public function updateEvent()
    {

    }

    public function deleteEvent()
    {

    }
}
