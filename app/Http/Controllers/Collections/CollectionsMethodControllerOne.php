<?php

namespace App\Http\Controllers\Collections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionsMethodControllerOne extends Controller
{
    

    /*
        The all method returns the underlying array represented by the collection.
    */

    public function all()
    {
        $todocollection = collect([
            [
                'user_id' => '1',
                'title' => "Do Laundry",
                "description" => "I have to do laundry",
            ],
            [
                 'user_id' => '1',
                'title' => "Finish Assignment",
                "description" => "I have to finish Maths assignment",
            ],
        ]);

        dd($todocollection->all());
    }


    /*
         The avg method returns the average value of a given key
    */

    public function average()
    {
           $numbers = collect([12, 20, 15, 24, 35]);

           // we can also define as this..
           $numbers_1 = collect([
                            ['num' => 10],
                            ['num' => 30],
                            ['num' => 20],
                            ['num' => 15],
                            ['test' => 25],
                            ['test' => 25],
                            ['test' => 45],
                        ])->avg('num');

           // dd("Average of all numbers : ".$numbers->avg());
           dd("Average of all numbers : ".$numbers_1);
    }


    /*
         The chunk method breaks the collection into multiple, smaller 
         collections of a given size
    */

    public function chunk()
    {
           $chunk_values = collect(["laravel", 9, "is", "the", "latets", "version", "in", "2022"]);
           dd($chunk_values->chunk(3));
    }


    /*
          The chunkWhile method breaks the collection into multiple, 
          smaller collections based on the evaluation of the given callback.
    */

    public function chunkwhile()
    {
           $chunk_values = collect([1, 2, 3, 3, 5, 7, 7, 7]);
           
           $chunks = $chunk_values->chunkWhile(function($value, $key, $chunk){
                     return $value === $chunk->last();
           });

           dd($chunks->all());
    }


    /*
         Collapse the collection of items into a single array. 
         (Merge all arrays into single one)
    */

    public function collapse()
    {
           $collections = collect([
                              [1, 2, 3],
                              [4, 5, 6],
                              [7, 8, 9],
                              [10, 11, 12],
                            ]);
            
            
            $collapsed = $collections->collapse();
            dd($collapsed->all());
    }

   
    /*
           The combine method combines the values of the collection, as keys, 
           with the values of another array or collection
    */

    public function combine()
    {
           $collapsed_keys = collect(['name', 'email', 'password', 'age']);
           $collapsed_values = collect(['Test', 'test@rest.in', 'test', '30']);
           $combine = $collapsed_keys->combine($collapsed_values);

           dd($combine->all());
    }


    /*
        The concat method appends the given array or collection's values onto 
        the end of another collection
    */

    public function concat()
    {
           $demo = collect(["Laravel"]);
           $demo1 = collect(["is", "a", "php"]);
           $demo2 = collect(["Framework"]);

           $concated_value = $demo->concat($demo1)->concat($demo2);
           dd($concated_value);
    }


    /*
        The contains method determines whether the collection contains 
        a given item.
    */

    public function contains()
    {
        // to check whether a integer value present in collections or not.

            $values = collect([1, 2, 3, 4, 5]);

            if($values->contains(7)){
                  $result1 = "true";
            }else{
                  $result1 = "false";
            }

        // to check whether a string value present in collections or not.

           $str_values = collect(['name' => 'Desk', 'price' => 100]);
           $result2 = $str_values->contains('Desk'); // true
          // $result3 = $str_values->contains('USA'); // false

        /*
           You may also pass a key / value pair to the contains method, 
           which will determine if the given pair exists in the collection
        */

            $collect_values = collect([
                ['product' => 'Desk', 'price' => 200],
                ['product' => 'Chair', 'price' => 100],
            ]);

            $result4 = $collect_values->contains('product', 'Demo'); // false
            // $result5 = $collect_values->contains('product', 'Desk'); // true

            $results = [
                "Integer Contains Result" => $result1,
                "String Contains Result" => $result2,
                "Collection Contains Result" => $result4,
            ];

            dd($results);

    }


    /*
         The count method returns the total number of items in the collection.
    */

    public function count()
    {
            $collection = collect([1, 2, 3, 4]);
            dd($collection->count());
    }


    /*
    
    */

    public function countby()
    {
            $numbers = collect([1, 2, 3, 4, 3, 2, 2, 0, 1, 1, 1, 1]); 
            // dd($numbers->countBy()); // [1=>5, 2=>3, 3=>2, 4=>1, 0=>1]

            /*
                We can also count certain types of strings using countby.
            */

            $emails = collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com', 'test@gmail.com', 'demo@orkoot.com']);

            $counted_emails = $emails->countBy(function($email){
                    return substr(strchr($email, "@"), 1);
            });

            dd($counted_emails);
    }


    /*
        The crossJoin method cross joins the collection's values among the 
        given arrays or collections, returning a Cartesian product with all 
        possible permutations.
    */

    public function crossjoin()
    {
            $collections = collect([1, 2]);
            $matrix = $collections->crossJoin(['a', 'b'], [3, 4]);
            dd($matrix->all());
    }


    /*
          The diff method compares the collection against another collection 
          or a plain PHP array based on its values.
    */

    public function diff()
    {
            $numbers = collect([1, 6, 7, 2, 5, 0]);
            $diff = $numbers->diff([9, 2, 5]); // [1,6,7,0]
            dd($diff->all());
    }


    /*
          The diffAssoc method compares the collection against another 
          collection or a plain PHP array based on its keys and values.
    */

    public function diffassoc()
    {
             $colllects = collect([
                'color' => 'orange',
                'type' => 'fruit',
                'remain' => 6,
                'price' => 100,
             ]);

             $diff = $colllects->diffAssoc([
                'color' => 'orange',
                'type' => 'fruit',
                'remain' => 3,
                'used' => 6,
             ]);

             dd($diff->all());
    }


    /*
          The diffKeys method compares the collection against another 
          collection or a plain PHP array based on its keys.
    */

    public function diffkeys()
    {
            $collections = collect([
                            'one' => 10,
                            'two' => 20,
                            'three' => 30,
                            'four' => 40,
                            'five' => 50,
                         ]);

            $diff = $collections->diffKeys([
                            'two' => 2,
                            'four' => 4,
                            'six' => 6,
                            'eight' => 8,
                         ]);

            dd($diff->all());
    }


    /*
          The duplicates method retrieves and returns duplicate values 
          from the collection
    */

    public function duplicates()
    {
            $values = collect([1, 'a', 'a', 'b', 'b', 2, 2, 2, 5, 'd']);

            $employees = collect([
                ['email' => 'abigail@example.com', 'position' => 'Developer'],
                ['email' => 'james@example.com', 'position' => 'Designer'],
                ['email' => 'victoria@example.com', 'position' => 'Developer'],
            ]);
             
            $employee_diff = $employees->duplicates('position');
            
            // dd($values->duplicates());
            dd($employee_diff);
    }


    /*
          Each method basically takes each element from the collection and 
          applies the callback function on it. 
    */

    public function each()
    {
           $collection = collect([2,3,4,5]);
           $result = $collection->each(function($item){
                   return ($item + $item);
           });

           dd($result);
    }


   /*
          The every method may be used to verify that all elements 
          of a collection pass a given truth test
   */

   public function every()
   {

          // If the collection is empty, the every method will return true

          // $collections = collect([1, 2, 3, 4, 5]); // false
          $collections = collect([]); // Empty collection returns true

          $test = $collections->every(function($value, $key){
                  return $value>2;
          });

          dd($test);
   }



   /*
          The except method returns all items in the collection except 
          for those with the specified keys
   */

    public function except()
    {
        $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);
        $excepted_values = $collection->except(['price', 'discount']);
        dd($excepted_values);
    }


    /*
          The filter method filters the collection using the given callback, 
          keeping only those items that pass a given truth test.
    */

    public function filter()
    {
           $collection = collect([1, 2, 3, 4, 0, "", null, []]);

           $filtered = $collection->filter(function($value, $key){
                     return $value>2;
           }); // o/p - [ 2=>3, 3=>4]

           /*
               If no callback is supplied, all entries of the collection 
               that are equivalent to false will be removed
           */

          $filtered2 = $collection->filter(); // o/p- [1, 2, 3, 4]
          
          $result = [
                "output for non entries of collection" => $filtered,
                "output for empty collection" => $filtered2
          ];

          dd($result);
    }
    
    
}