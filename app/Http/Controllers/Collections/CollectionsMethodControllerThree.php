<?php

namespace App\Http\Controllers\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionsMethodControllerThree extends Controller
{
    
    /*
         The sort method sorts the collection.
    */

    public function sort()
    {
           $collection = collect([5, 1, 3, 0, 9, 2]);
           $sorted = $collection->sort()->all(); // [3=>0, 1=>1, 5=>2, 2=>3, 0=>5, 4=>9]
           
           /*
                   the values method to reset the keys to consecutively numbered indexes. 
           */

           // $collection->sort()->values()->all(); // [0=>0, 1=>1, 2=>2, 3=>3, 4=>5, 5=>9] 
           dd($sorted);
    }


    /*
        The sortBy method sorts the collection by the given key.
    */

    public function sortby()
    {
        $collection = collect([
            ['name' => 'Desk', 'price' => 200],
            ['name' => 'Chair', 'price' => 100],
            ['name' => 'Bookcase', 'price' => 150],
        ]);

        $sorted = $collection->sortBy('price');

        /*
            [
                ['name' => 'Chair', 'price' => 100],
                ['name' => 'Bookcase', 'price' => 150],
                ['name' => 'Desk', 'price' => 200],
            ]
        */

        dd($sorted);
    }


    /*
          The sortKeys method sorts the collection by the keys of 
          the underlying associative array.
    */

    public function sortkeys()
    {
        $collection = collect([
            'id' => 22345,
            'first' => 'John',
            'last' => 'Doe',
        ]);

        $sorted = $collection->sortKeys();

        /*
            [
                'first' => 'John',
                'id' => 22345,
                'last' => 'Doe',
            ]
        */

        dd($sorted);
    }

    /*
         The splice method removes and returns a slice of items starting 
         at the specified index.
    */

    public function splice()
    {
           $collection = collect([1,2,3,4,5,6]);
           $spliced = $collection->splice(2); // [3,4,5,6]
           dd($spliced);
    }


    /*
          The split method breaks a collection into the given number of groups.
    */

    public function split()
    {
        $collection = collect([1, 2, 3, 4, 5]);
        $splited = $collection->split(2);
        dd($splited);
    }
    
    
    /*
    The take method returns a new collection with the specified number of items.
    */


    public function take()
    {
        $collection = collect([0, 1, 2, 3, 4, 5]);
        $taken = $collection->take(3)->all(); // [0,1,2]
        $taken = $collection->take(-3)->all(); // [3,4,5]

        dd($taken);
    }

    /*
       The takeWhile method returns items in the collection until 
       the given callback returns false
    */

    public function takewhile()
    {
        $collection = collect([1, 2, 3, 4]);

        $subset = $collection->takeWhile(function($item){
                  return $item<3;
        });   // [1,2]

        dd($subset);
    }

    /*
         to modify the collections data.    
    */

    public function transform()
    {
        $collection = collect([1, 2, 3, 4, 5]);

        $transformed = $collection->transform(function($item, $key){
                return $item*2;
        }); // [2,4,6,8,10]

        dd($transformed);
    }


    /*
        The undot method expands a single-dimensional collection that uses 
        "dot" notation into a multi-dimensional collection
    */

    public function undot()
    {
        $person = collect([
            'name.first_name' => 'Marie',
            'name.last_name' => 'Valentine',
            'address.line_1' => '2992 Eagle Drive',
            'address.line_2' => '',
            'address.suburb' => 'Detroit',
            'address.state' => 'MI',
            'address.postcode' => '48219'
        ]);

        $undoted = $person->undot()->all();

        /*
            [
                "name" => [
                    "first_name" => "Marie",
                    "last_name" => "Valentine",
                ],
                "address" => [
                    "line_1" => "2992 Eagle Drive",
                    "line_2" => "",
                    "suburb" => "Detroit",
                    "state" => "MI",
                    "postcode" => "48219",
                ],
            ]
        */

        dd($undoted);
    }

    /*
        The union method adds the given array to the collection. 
        If the given array contains keys that are already in the original 
        collection, the original collection's values will be preferred
    */
    
    public function union()
    {
        $collection = collect([1 => ['a'], 2 => ['b']]);
        $union = $collection->union([3 => ['c'], 4 => ['b'], 1=>['f']]);
        // [1 => ['a'], 2 => ['b'], 3 => ['c'], 4=>['b']]
        dd($union);
    }

    /*
          The unique method returns all of the unique items in the collection.
    */

    public function unique()
    {
        $collection = collect([1, 1, 2, 2, 3, 4, 2]);
        $unique = $collection->unique(); // [1,2,3,4]

        /*
             When dealing with nested arrays or objects, you may specify the key 
             used to determine uniqueness
        */

        $collection2 = collect([
            ['name' => 'iPhone 6', 'brand' => 'Apple', 'type' => 'phone'],
            ['name' => 'iPhone 5', 'brand' => 'Apple', 'type' => 'phone'],
            ['name' => 'Apple Watch', 'brand' => 'Apple', 'type' => 'watch'],
            ['name' => 'Galaxy S6', 'brand' => 'Samsung', 'type' => 'phone'],
            ['name' => 'Galaxy Gear', 'brand' => 'Samsung', 'type' => 'watch'],
        ]);

        $unique2 = $collection2->unique('type');

        dd($unique2->all());  
    }


    /*
          The values method returns a new collection with the keys 
          reset to consecutive integers
    */

    public function values()
    {
        $collection = collect([
            10 => ['product' => 'Desk', 'price' => 200],
            11 => ['product' => 'Desk', 'price' => 200],
        ]);

        $serialized = $collection->values();
        dd($serialized);
    }


    /*
        The when method will execute the given callback when the first argument 
        given to the method evaluates to true
    */

    public function when()
    {
           $collection = collect([1, 2, 3]);       

           $result = $collection->when(true, function($collection){
                 return $collection->push(4);
           }); // [1,2,3,4]

           $result1 = $collection->when(false, function($collection){
            return $collection->push(5);
           });


           /*
                
           */

           $result2 = $collection->when(false, function ($collection) {
                            return $collection->push(6);
                        }, function ($collection) {
                            return $collection->push(7);
                        });

           dd($result2);
    }


    /*
        The whenEmpty method will execute the given callback when the 
        collection is empty
    */

    public function whenempty()
    {
           $collection = collect([1,2,3]);
           
           $collection->whenEmpty(function($collection){
                   return $collection->push(7);
           }); // [1,2,3]

           // 

           $collection2 = collect();
           $collection2->whenEmpty(function($collection){
                    return $collection->push([9, 2]);
           }); // [9,2]

           dd($collection2);
    }


    /*
        The where method filters the collection by a given key / value pair
    */

    public function where()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->where('price', 100);
        dd($filtered->all());
    }


    /*
       The whereBetween method filters the collection by determining if a 
       specified item value is within a given range
    */

    public function wherebetween()
    {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 80],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Pencil', 'price' => 30],
            ['product' => 'Door', 'price' => 100],
        ]);

        $filtered = $collection->whereBetween('price', [100, 200]);

        dd($filtered);
    }

    /*
        The whereNotNull method returns items from the collection 
        where the given key is not null
    */

    public function wherenotnull()
    {
        $collection = collect([
            ['name' => 'Desk'],
            ['name' => null],
            ['name' => 'Bookcase'],
        ]);

       $filtered = $collection->whereNotNull('name');
        dd($filtered);
    }

   
    /*
        The whereNull method returns items from the collection where 
        the given key is null
    */

    public function wherenull()
    {
        $collection = collect([
            ['name' => 'Desk'],
            ['name' => null],
            ['name' => 'Bookcase'],
        ]);

        $filtered = $collection->whereNull('name');
        dd($filtered);
    }

    /*
         The zip method merges together the values of the given array with 
         the values of the original collection at their corresponding index
    */

    public function zip()
    {
        $collection = collect(['Chair', 'Desk']);
        $zipped = $collection->zip([100, 200]);
        dd($zipped);  // [['Chair', 100], ['Desk', 200]]
    }

}
