<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function test1()
    {
           $collection1 = collect([
                ['id' => 1, 'name' => 'ABC'],
                ['id' => 2, 'name' => 'DEF'],
                ['id' => 3, 'name' => 'GHU'],
           ]);

           $result = $collection1->mapToGroups(function($item, $value){
                     return [$item['id'] => $item['name']];
           });

           dd($result->all());
    }


    public function test2()
    {
           $first = collect([["A" => 1, "B" => 2]]);           
           $result = $first->merge(["A" => 3, "C" => 7]);
           dd($result);
    }
}
