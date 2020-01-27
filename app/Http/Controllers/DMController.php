<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\FPGrowth;
use App\Helper\FPNode;
use App\Helper\FPTree;

class DMController extends Controller
{
    //
    public function FPTreeAlgorithm(){

        $transactions = [
            ['M', 'O', 'N', 'K', 'E', 'Y'],
            ['D', 'O', 'N', 'K', 'E', 'Y'],
            ['M', 'A', 'K', 'E'],
            ['M', 'U', 'C', 'K', 'Y'],
            ['C', 'O', 'O', 'K', 'I', 'E'],
        ];

        $support = 3;
        $confidence = 0.7;

        $fpgrowth = new FPGrowth($support, $confidence);

        $fpgrowth->run($transactions);

        $patterns = $fpgrowth->getPatterns();
        $rules = $fpgrowth->getRules();
        return $patterns;

    }
}
