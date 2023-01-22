<?php

namespace App\Http\Controllers\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionsMethodControllerTwo extends Controller
{
    
    /*
        The first method returns the first element in the collection that 
        passes a given truth test.
    */

    public function first()
    {
           $collection = collect([1, 2, 3, 4]);

           $first = $collection->first(function($value, $key){
                     return $value>2;
           });

           dd($first);
    }


    /*
        The firstWhere method returns the first element in 
        the collection with the given key / value pair
    */

    public function firstwhere()
    {
        $collection = collect([
            ['name' => 'Regena', 'age' => null],
            ['name' => 'Linda', 'age' => 14],
            ['name' => 'Diego', 'age' => 23],
            ['name' => 'Linda', 'age' => 84],
        ]);

            // $result = $collection->firstWhere('name', 'Demo'); // null
            $result = $collection->firstWhere('name', 'Diego'); // ['name' => 'Diego', 'age' => 23]

           /*
                firstWhere method can be called with a comparison operator.
           */

           $result1 = $collection->firstWhere('age', '>', 14);  // ['name' => 'Diego', 'age' => 23]

           /*
                you may pass one argument to the firstWhere method. In this scenario, 
                the firstWhere method will return the first item where the given item 
                key's value is "truthy".
           */

           $result2 = $collection->firstWhere('age');  // ['name' => 'Linda', 'age' => 14]


        dd($result2);
    }


    /*
         To modify the values from collections.
    */

    public function flatmap()
    {
            $collection = collect([
                ['name' => 'Sally'],
                ['school' => 'Arkansas'],
                ['age' => 28]
            ]);

            $result = $collection->flatMap(function($values){
                      return array_map('strtoupper', $values); 
            });

            /*  O/P => [
                            "name" => "SALLY"
                            "school" => "ARKANSAS"
                            "age" => "28"
                       ]  */

            dd($result);
    }


    /*
           The flatten method flattens a multi-dimensional collection 
           into a single dimension.
    */

    public function flatten()
    {
            $collection = collect([
                'Apple' => [
                    [
                        'name' => 'iPhone 6S',
                        'brand' => 'Apple'
                    ],
                ],
                'Samsung' => [
                    [
                        'name' => 'Galaxy S7',
                        'brand' => 'Samsung'
                    ],
                ],
            ]);

            $products = $collection->flatten(1);
            $result = $products->all();
            dd($result);

            /*
              o/p =>  [
                    ['name' => 'iPhone 6S', 'brand' => 'Apple'],
                    ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
                ]
            */
    }


    /*
           Interchange the keys with value in collection.
    */

     public function flip()
     {
             $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
             $flipped = $collection->flip();
             $result = $flipped->all();
             dd($result);
     }


     /*
            The forget method removes an item from the collection by its key
     */

     public function forget()
     {
            $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
            $result = $collection->forget('name')->all();
            dd($result);
     }

     /*
          The forPage method returns a new collection containing the items 
          that would be present on a given page number.
     */

     public function forpage()
     {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $chunk = $collection->forPage(3, 2)->all();
        /*
            The method accepts the page number as its first argument and the 
            number of items to show per page as its second argument.
        */
        dd($chunk);
     }


     /*
          The get method returns the item at a given key. If the key does not 
          exist, null is returned.
     */

     public function get()
     {
            $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
            $value = $collection->get('name'); // taylor

            // You may optionally pass a default value as the second argument.

            $value2 = $collection->get('age', 30); // 30
            dd($value2);
     }


     /*
          The groupBy method groups the collection's items by a given key
     */

     public function groupby()
     {
            $collection = collect([
                ['account_id' => 'account-x10', 'product' => 'Chair'],
                ['account_id' => 'account-x10', 'product' => 'Bookcase'],
                ['account_id' => 'account-x11', 'product' => 'Desk'],
            ]);

            $grouped = $collection->groupBy('account_id')->all();
            dd($grouped);


            /*
             o/p =>   [
                            'account-x10' => [
                                ['account_id' => 'account-x10', 'product' => 'Chair'],
                                ['account_id' => 'account-x10', 'product' => 'Bookcase'],
                            ],
                            'account-x11' => [
                                ['account_id' => 'account-x11', 'product' => 'Desk'],
                            ],
                       ]
            */
     }


     /*
         The has method determines if a given key exists in the collection
     */

     public function has()
     {
        $collection = collect(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);
        $check1 = $collection->has('product'); // true
        $check2 = $collection->has(['product', 'amount']); // true
        $check3 = $collection->has(['product', 'price']); // false
        dd($check3);
     }


     /*
          joins items in collection.
     */

     public function implode()
     {
        $collection = collect([
            ['account_id' => 1, 'product' => 'Desk'],
            ['account_id' => 2, 'product' => 'Chair'],
        ]);

        $result = $collection->implode('product', ', '); // Desk, Chair
        dd($result);
     }

     /*
          The intersect method removes any values from the original collection 
          that are not present in the given array or collection. 
     */

     public function intersect()
     {
        $collection = collect(['Desk', 'Sofa', 'Chair']);
        $result = $collection->intersect(['Desk', 'Chair', 'Bookcase'])->all(); // [0 => 'Desk', 2 => 'Chair']
        dd($result);
     }


     /*
          Removes any keys and their corresponding values from the original 
          collection that are not present in the given array or collection
     */

     public function intersectbyKeys()
     {
        $collection = collect([
            'serial' => 'UX301', 'type' => 'screen', 'year' => 2009,
        ]);

        $intersect = $collection->intersectByKeys([
            'reference' => 'UX404', 'type' => 'tab', 'year' => 2011,
        ]);

        $result = $intersect->all(); // ['type' => 'screen', 'year' => 2009]
        dd($result);
     }


     /*
         joins the collection's values with a string.
     */

     public function join()
     {
            $join1 = collect(['a', 'b', 'c'])->join(', '); // 'a, b, c'
            $join2 = collect(['a', 'b', 'c'])->join(', ', ', and '); // 'a, b, and c'
            $join3 = collect(['a', 'b'])->join(', ', ' and '); // 'a and b'
            $join4 = collect(['a'])->join(', ', ' and '); // 'a'
            $join5 = collect([])->join(', ', ' and '); // ''
            dd($join5);
     }


     /*
          The keys method returns all of the collection's keys
     */

     public function keys()
     {
        $collection = collect([
            'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
            'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);

        $keys = $collection->keys()->all();
        dd($keys);
     }


     /*
     
     */

     public function map()
     {
            $collection = collect([1, 2, 3, 4, 5]);

            $additions = $collection->map(function($item, $key){
                       return $item + 2;
            });

            dd($additions);
     }

     /*
         The mapToGroups method groups the collection's items by the 
         given closure. 
     */

    public function maptoGroup()
    {
            $collection = collect([
                [
                    'name' => 'John Doe',
                    'department' => 'Sales',
                ],
                [
                    'name' => 'Jane Doe',
                    'department' => 'Sales',
                ],
                [
                    'name' => 'Johnny Doe',
                    'department' => 'Marketing',
                ],
                [
                    'name' => 'Johnny Doyal',
                    'department' => 'It',
                ]
            ]);

            $grouped = $collection->mapToGroups(function($item, $key){
                       return [$item['department'] => $item['name']];
            });

            dd($grouped);
    }


    /*
        The max method returns the maximum value of a given key
    */

    public function max()
    {
        $max = collect([
            ['foo' => 10],
            ['foo' => 20]
        ])->max('foo'); // 20

        $try2 = collect([0, 23, 45, 50, 12, 90, 60])->max(); // 90

        dd($try2);
    }


    /*
         The merge method merges the given array or collection with the 
         original collection. 
    */

    public function merge()
    {
        $collection = collect(['product_id' => 1, 'price' => 100]);
        $merged = $collection->merge(['price' => 200, 'discount' => false])->all();
        // ['product_id' => 1, 'price' => 200, 'discount' => false]
        dd($merged);
    }

    /*
        The only method returns the items in the collection with the 
        specified keys.
    */

    public function only()
    {
        $collection = collect([
            'product_id' => 1,
            'name' => 'Desk',
            'price' => 100,
            'discount' => false
        ]);

        $result = $collection->only(['name', 'price'])->all();
        dd($result);
    }

    /*
        fill the array with the given value until the array reaches 
        the specified size.
    */

    public function pad()
    {
        $collection = collect(['A', 'B', 'C']);
        $filtered = $collection->pad(5, 0)->all(); // ['A', 'B', 'C', 0, 0]
        $filtered1 = $collection->pad(-5, 0)->all(); // [0, 0, 'A', 'B', 'C']
        dd($filtered1);
    }

    /* 
        The pluck method retrieves all of the values for a given key
    */

    public function pluck()
    {
            $collection = collect([
                ['product_id' => 'prod-100', 'name' => 'Desk'],
                ['product_id' => 'prod-200', 'name' => 'Chair'],
            ]);

            $plucked = $collection->pluck('name')->all(); // ['Desk', 'Chair']
            $plucked1 = $collection->pluck('name', 'product_id')->all(); // ['prod-100' => 'Desk', 'prod-200' => 'Chair']

            /*
                  The pluck method also supports retrieving nested values 
                  using "dot" notation.
            */

            $collection_new = collect([
                [
                    'speakers' => [
                        'first_day' => ['Rosa', 'Judith'],
                        'second_day' => ['Angela', 'Kathleen'],
                    ],
                ],
            ]);

            $plucked2 = $collection_new->pluck('speakers.first_day')->all(); // ['Rosa', 'Judith']

            dd($plucked2);
    }


    /*
           The pop method removes and returns the last item from the collection
    */

    public function pop()
    {
           $collection = collect([1, 2, 3, 4, 5]);
            $poped_items = $collection->pop(); // 5
            // $poped_items = $collection->pop(3); // [5, 4, 3]
            $remaining_items = $collection->all(); // [1, 2, 3, 4]

           dd($remaining_items);
    }

    /*
         The prepend method adds an item to the beginning of the collection
    */

    public function prepend()
    {
        $collection = collect([1, 2, 3, 4, 5]);
        $new_items = $collection->prepend(0)->all();
        dd($new_items);
    }


    /*
         The pull method removes and returns an item from the 
         collection by its key.
    */

    public function pull()
    {
        $collection = collect(['product_id' => 'prod-100', 'name' => 'Desk']);
        $pulled_items = $collection->pull('name'); // 'Desk'
        $remaining_items = $collection->all(); // ['product_id' => 'prod-100']
        dd($remaining_items);
    }


    /*
          The put method sets the given key and value in the collection
    */

    public function put()
    {
        $collection = collect(['product_id' => 1, 'name' => 'Desk']);
        $collection->put('price', 100)->all(); // ['product_id' => 1, 'name' => 'Desk', 'price' => 100]
        dd($collection);
    }

    /*
        returns a collection containing integers between the specified range
    */

    public function range()
    {
           $collection = collect()->range(3, 6)->all();
           dd($collection);
    }

    /*
          reduces the collection to a single value
    */

    public function reduce()
    {
        $collection = collect([1, 2, 3]);
        $total = $collection->reduce(function($carry, $item){
               return $carry + $item;
        });  // 6

        dd($total);
    }


    /*
            The reject method filters the collection using the given closure.        
    */

    public function reject()
    {
        $collection = collect([1, 2, 3, 4, 5, 6]);
        $rejected = $collection->reject(function($value, $key){
                  return $value>3;
        });

        dd($rejected->all()); // [1, 2, 3]
    }

    /*
          The search method searches the collection for the given 
          value and returns its key if found.
    */

    public function search()
    {
             $collection = collect([1, 2, 3, 4, 5, 6]);
             $searched = $collection->search(4); // 3 (i.e, index of 4 in the collection)
             dd($searched);
    }

    /*
          The shift method removes and returns the multiple item from the collection
    */

    public function shift()
    {
            $collection = collect([1, 2, 3, 4, 5, 6]);
            $shifted = $collection->shift(2);
            $remaining_items = $collection->all(); // [3, 4, 5, 6]
            dd($remaining_items); 
    }


    /*
         Sliding divide the collections in chunk and repeat next data with previous one
    */

    public function sliding()
    {
           $collection = collect([1, 2, 3, 4, 5, 6]);
           $slide = $collection->sliding(3); // [[1,2,3], [2,3,4], [3,4,5], [4,5,6]]
           dd($slide); 
    }

    /*
       The skip method returns a new collection, with the given number of 
       elements removed from the beginning of the collection
    */

    public function skip()
    {
        $collection = collect([1, 2, 3, 4, 5, 6]);
        $after_skip = $collection->skip(3); // [4,5,6]
        dd($after_skip);   
    }

    /*
       The skipUntil method skips over items from the collection 
       until the given item found in the collection.
    */

     public function skipuntil()
     {
        $collection = collect([1, 2, 3, 4, 5, 6]);
        $skiped = $collection->skipUntil(5); // [5,6]
        dd($skiped);    
     }    


     /*
           The skipWhile method skips over items from the collection while 
           the given callback returns true and then returns the remaining 
           items in the collection as a new collection
     */

     public function skipwhile()
     {
            $collection = collect([1, 2, 3, 4, 5, 6]);
            $skipped = $collection->skipWhile(function($item){
                     return $item <3;
            }); // [3, 4, 5, 6]

            dd($skipped);
     }


     /*
          The slice method returns a slice of the collection starting at the given index
     */

     public function slice()
     {
            $collection = collect([1, 2, 3, 4, 5, 6]);
            // $sliced = $collection->slice(3); // [4,5,6]
            $sliced = $collection->slice(3, 2); // [4,5]
            dd($sliced); 
     }
}