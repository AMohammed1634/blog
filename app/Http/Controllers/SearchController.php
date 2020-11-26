<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function SearchForm()
    {
        return view("user.searchForm");
    }
    public function SearchResult(Request $request)
    {
        $searchItems = DB::select("select * from products where name like '%".$request->name."%'");
//
//        dd($searchItems);
        return view("user.searchForm",compact('searchItems'));
    }
}
