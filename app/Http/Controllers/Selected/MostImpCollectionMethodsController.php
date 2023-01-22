<?php

namespace App\Http\Controllers\Selected;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MostImpCollectionMethodsController extends Controller
{
    /*
         Filter Collection Methods.
         -----------------------------

         For the inverse of filter, see the reject method.
         Returns Array.
    */

    public function filter_basic()
    {
           $collection = collect([1,2,3,4,5,6]);
           $filtered = $collection->filter(function($value, $item){
                   return $value>2;
           });

            /*
                By filtering, mnain collection items doesn't change but 
                filter returns a new collection.
            */

            $filtered->dump(); // [3,4,5,6]
            // $collection->dump(); // [1,2,3,4,5,6]
    }

    //

    public function filter_two()
    {
           $collection = collect([
            [
                'name' => 'Gaming PC Dell Quad Core i5-2400',
                'price' => 349.95,
                'featured' => 1
            ],
            [
                'name' => 'Dell OptiPlex 7010 SFF 3rd Gen Quad Core',
                'price' => 181.95,
                'featured' => 0
            ],
            [
                'name' => 'HP 24fh Ultra-Slim IPS Monitor',
                'price' => 149.99,
                'featured' => 0
            ],
            [
                'name' => 'Microsoft Surface Pro 6 12.3-Inch Tablet',
                'price' => 679.99,
                'featured' => 1
            ],
            [
                'name' => 'Lenovo IdeaPad 320 15.6" HD Notebook',
                'price' => 399.99,
                'featured' => 0
            ],
        ]);
        
        
        $filtered = $collection->filter(function($value, $item){
                  return $value['price']>300 && $value['featured']>0;
        });

        $filtered->dump();
    }
    
    //


    public function filter_three()
    {
        $collection = collect([
            [
                'user_id' => '1',
                'title' => 'Helpers in Laravel',
                'content' => 'Create custom helpers in Laravel',
                'category' => 'php'
            ],
            [
                'user_id' => '2',
                'title' => 'Testing in Laravel',
                'content' => 'Testing File Uploads in Laravel',
                'category' => 'php'
            ],
            [
                'user_id' => '3',
                'title' => 'Telegram Bot',
                'content' => 'Crypto Telegram Bot in Laravel',
                'category' => 'php'
            ],
        ]);

        $filtered = $collection->filter(function($value, $key) {
            if ($value['user_id'] > 1) {
                return true;
            }
            else{
                return false;
            }
        });
        

        dd($filtered->all());
    }



    /*
         Search
         -------------------------

         1) Search the collection for a given value.
         2) If the value does not matches any item, false is returned.
    */
    
     public function search_basic()
     {
        $names = collect(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);
        $searched = $names->search('John'); // 1 (index of the value)
        $searched1 = $names->search('Demo'); // false

        // we can also search by the length of the value

        $len_search = $names->search(function($value, $key){
                return strlen($value) == 5;
        }); // 2 

        dd($len_search);
     }


     /*
          Map
          --------------------

          a) Pass callback function to each item in Collection.
          b) After operating on each item, map() method returns new Collection object with updated items.
          c) The map() method will not modify the original Laravel Collection.
     */

     public function map_basic()
     {
         $names = collect(['Alex Doel', 'John Doe', 'Jason Sen', 'Martyn Roy', 'Hanlin Das']);
         $maped = $names->map(function($names, $key){
                $exp = explode(" ", $names);  
                return $exp[0][0].$exp[1][0];
         });

         dd($maped);
     }
     
     
     /*
          The reduce method reduces the collection to a single value, 
          passing the result of each iteration into the subsequent iteration.
     */

     public function reduce_basic()
     {
        $collection = collect([
            ['class' => 'Math', 'score' => 60],
            ['class' => 'English', 'score' => 61],
            ['class' => 'Chemistry', 'score' => 50],
            ['class' => 'Physics', 'score' => 49],
        ]);

        $total_score = $collection->reduce(function($carry, $item){
               return $carry+$item['score'];
        }); // 220

        dd($total_score);
     }

     /*
     
     */

     public function groupby_basic()
     {
        $collection = collect([
            [
                'name' => 'Gaming PC Dell Quad Core i5-2400',
                'price' => 349.95,
                'featured' => 1
            ],
            [
                'name' => 'Dell OptiPlex 7010 SFF 3rd Gen Quad Core',
                'price' => 181.95,
                'featured' => 0
            ],
            [
                'name' => 'HP 24fh Ultra-Slim IPS Monitor',
                'price' => 149.99,
                'featured' => 0
            ],
            [
                'name' => 'Microsoft Surface Pro 6 12.3-Inch Tablet',
                'price' => 679.99,
                'featured' => 1
            ],
            [
                'name' => 'Lenovo IdeaPad 320 15.6" HD Notebook',
                'price' => 299.99,
                'featured' => 0
            ],
           ]);

           
            //    $grouped = $collection->groupBy('featured');

           // Here, true is preserve key, 

           $grouped = $collection->groupBy('featured', true);

           $grouped->dump();
     }     


     // groupby multiple columns


     public function groupby_multiple()
     {
        $collection = collect([
            ['id'=>1, 'name'=>'Hardik', 'city' => 'Mumbai', 'country' => 'India'],
            ['id'=>2, 'name'=>'Vimal', 'city' => 'New York', 'country' => 'US'],
            ['id'=>3, 'name'=>'Harshad', 'city' => 'Gujarat', 'country' => 'India'],
            ['id'=>4, 'name'=>'Harsukh', 'city' => 'New York', 'country' => 'US'],
        ]);

        $grouped = $collection->groupBy(function($item, $key){
                return $item['country']." ".$item['city'];
        });

        $grouped->dump();
     }


     // groupBy date

     public function groupby_date()
     {
        $collection = collect([
            ['id'=>1, 'name'=>'Hardik', 'created_at' => '2020-03-10 10:10:00'],
            ['id'=>2, 'name'=>'Vimal', 'created_at' => '2020-03-10 10:14:00'],
            ['id'=>3, 'name'=>'Harshad', 'created_at' => '2020-03-11 10:12:00'],
            ['id'=>4, 'name'=>'Harsukh', 'created_at' => '2020-03-12 10:12:00'],
        ]);

        $grouped = $collection->groupBy(function($item, $key){
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('m/d/Y');
        });

        $grouped->dump();
     }

     // groupby with sum

     public function groupby_sum()
     {
        $collection = collect([
            ['id'=>1, 'name'=>'Hardik', 'city' => 'Mumbai', 'country' => 'India', 'amount' => 2000],
            ['id'=>2, 'name'=>'Vimal', 'city' => 'New York', 'country' => 'US', 'amount' => 1000],
            ['id'=>3, 'name'=>'Harshad', 'city' => 'Gujarat', 'country' => 'India', 'amount' => 3000],
            ['id'=>4, 'name'=>'Harsukh', 'city' => 'New York', 'country' => 'US', 'amount' => 2000],
        ]);

        $grouped = $collection->groupBy('country')->map(function($row){
                   return $row->sum('amount');
        });

        $grouped->dump();
     }

     /*
            Tap
            -------------

            a) tap method on collections which allow you to “tap” into the 
               collection at a specific point and do something with the results 
               while not affecting the main collection.
     */

     public function tap_basic()
     {
        $items = [
            ['name' => 'David Charleston', 'member' => 1, 'active' => 1],
            ['name' => 'Blain Charleston', 'member' => 0, 'active' => 0],
            ['name' => 'Megan Tarash', 'member' => 1, 'active' => 1],
            ['name' => 'Jonathan Phaedrus', 'member' => 1, 'active' => 1],
            ['name' => 'Paul Jackson', 'member' => 0, 'active' => 1]
        ];

        return collect($items)
                        ->where('member', 0)
                        ->tap(function($collection){
                                return var_dump($collection->pluck('name'));
                        })
                        ->where('active', 0)
                        ->tap(function($collection){
                            return var_dump($collection->pluck('name'));
                        });
        
        dd($items);
     }

     /*
     
     */

    public function each_basic()
    {
        $collection = collect([1, 2, 3, 4, 5]);
        // $collection->transform(function ($item, $key) {
        //     return $item * 2;
        // });

        $maped = $collection->map(function ($item, $key) {
            return $item * 3;
        }); // $maped will be changed


        dd($maped);

    }


    /*
    
    */


    public function each_two()
    {
        $collection = collect([2,3,4,5]);
           $result = $collection->each(function($item){    
                   if($item>3){
                       return false;
                   }
                   echo(($item*3)."\n");
           }); // 6,9

        
        /////// using transform

        $result2 = $collection->transform(function($item, $key){
                   if($item>3){
                        return $item*5;
                   }
        }); // [null, null, 20, 25]

        ////// using map

        $result3 = $collection->map(function($item, $key){
                   if($item>3){
                       return $item*7;
                   }
        }); // [null, null, 140, 175]

        dd($result3);
    }

}
