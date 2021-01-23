<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    //
    public function index()
    {
        return view('Templates/FormTemplates/StartTest');
    }
    public function SearchMain()
    {
        return view('Templates/FormTemplates/SearchMain');
    }
    public function RentSearchForm()
    {
        return view('Templates/FormTemplates/Rent/RentSearchForm');
    }
    public function PropertyInsert()
    {
        return view('Templates/FormTemplates/PropertyInsert/PropertyInsertPage');
    }

}
