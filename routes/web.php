<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Collections\CollectionsMethodControllerOne;
use App\Http\Controllers\Collections\CollectionsMethodControllerTwo;
use App\Http\Controllers\Collections\CollectionsMethodControllerThree;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Selected\MostImpCollectionMethodsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// All Collection Methods

Route::get('all', [CollectionsMethodControllerOne::class, 'all'])->name('all');
Route::get('average', [CollectionsMethodControllerOne::class, 'average'])->name('average');
Route::get('chunk', [CollectionsMethodControllerOne::class, 'chunk'])->name('chunk');
Route::get('chunk-while', [CollectionsMethodControllerOne::class, 'chunkwhile'])->name('chunk-while');
Route::get('collapse', [CollectionsMethodControllerOne::class, 'collapse'])->name('collapse');
Route::get('combine', [CollectionsMethodControllerOne::class, 'combine'])->name('combine');
Route::get('concat', [CollectionsMethodControllerOne::class, 'concat'])->name('concat');
Route::get('contains', [CollectionsMethodControllerOne::class, 'contains'])->name('contains');
Route::get('count', [CollectionsMethodControllerOne::class, 'count'])->name('count');
Route::get('countby', [CollectionsMethodControllerOne::class, 'countby'])->name('countby');
Route::get('cross-join', [CollectionsMethodControllerOne::class, 'crossjoin'])->name('cross-join');
Route::get('diff', [CollectionsMethodControllerOne::class, 'diff'])->name('diff');
Route::get('diff-assoc', [CollectionsMethodControllerOne::class, 'diffassoc'])->name('diff-assoc');
Route::get('diff-keys', [CollectionsMethodControllerOne::class, 'diffkeys'])->name('diff-keys');
Route::get('duplicates', [CollectionsMethodControllerOne::class, 'duplicates'])->name('duplicates');
Route::get('each', [CollectionsMethodControllerOne::class, 'each'])->name('each');
Route::get('every', [CollectionsMethodControllerOne::class, 'every'])->name('every');
Route::get('except', [CollectionsMethodControllerOne::class, 'except'])->name('except');
Route::get('filter', [CollectionsMethodControllerOne::class, 'filter'])->name('filter'); // **

/////////

Route::get('first', [CollectionsMethodControllerTwo::class, 'first'])->name('first');
Route::get('firstwhere', [CollectionsMethodControllerTwo::class, 'firstwhere'])->name('firstwhere');
Route::get('flatmap', [CollectionsMethodControllerTwo::class, 'flatmap'])->name('flatmap');
Route::get('flatten', [CollectionsMethodControllerTwo::class, 'flatten'])->name('flatten');
Route::get('flip', [CollectionsMethodControllerTwo::class, 'flip'])->name('flip');
Route::get('forget', [CollectionsMethodControllerTwo::class, 'forget'])->name('forget');
Route::get('forpage', [CollectionsMethodControllerTwo::class, 'forpage'])->name('forpage');
Route::get('get', [CollectionsMethodControllerTwo::class, 'get'])->name('get');
Route::get('groupby', [CollectionsMethodControllerTwo::class, 'groupby'])->name('groupby');
Route::get('has', [CollectionsMethodControllerTwo::class, 'has'])->name('has');
Route::get('implode', [CollectionsMethodControllerTwo::class, 'implode'])->name('implode');
Route::get('intersect', [CollectionsMethodControllerTwo::class, 'intersect'])->name('intersect');
Route::get('intersectbyKeys', [CollectionsMethodControllerTwo::class, 'intersectbyKeys'])->name('intersectbyKeys');
Route::get('join', [CollectionsMethodControllerTwo::class, 'join'])->name('join');
Route::get('keys', [CollectionsMethodControllerTwo::class, 'keys'])->name('keys');
Route::get('map', [CollectionsMethodControllerTwo::class, 'map'])->name('map');
Route::get('maptogroup', [CollectionsMethodControllerTwo::class, 'maptoGroup'])->name('maptogroup');
Route::get('max', [CollectionsMethodControllerTwo::class, 'max'])->name('max');
Route::get('merge', [CollectionsMethodControllerTwo::class, 'merge'])->name('merge');
Route::get('only', [CollectionsMethodControllerTwo::class, 'only'])->name('only');
Route::get('pad', [CollectionsMethodControllerTwo::class, 'pad'])->name('pad');
Route::get('pluck', [CollectionsMethodControllerTwo::class, 'pluck'])->name('pluck');
Route::get('pop', [CollectionsMethodControllerTwo::class, 'pop'])->name('pop');
Route::get('prepend', [CollectionsMethodControllerTwo::class, 'prepend'])->name('prepend');
Route::get('pull', [CollectionsMethodControllerTwo::class, 'pull'])->name('pull');
Route::get('put', [CollectionsMethodControllerTwo::class, 'put'])->name('put');
Route::get('range', [CollectionsMethodControllerTwo::class, 'range'])->name('range');
Route::get('reduce', [CollectionsMethodControllerTwo::class, 'reduce'])->name('reduce');
Route::get('reject', [CollectionsMethodControllerTwo::class, 'reject'])->name('reject');
Route::get('search', [CollectionsMethodControllerTwo::class, 'search'])->name('search');
Route::get('shift', [CollectionsMethodControllerTwo::class, 'shift'])->name('shift');
Route::get('sliding', [CollectionsMethodControllerTwo::class, 'sliding'])->name('sliding');
Route::get('skip', [CollectionsMethodControllerTwo::class, 'skip'])->name('skip');
Route::get('skipuntil', [CollectionsMethodControllerTwo::class, 'skipuntil'])->name('skipuntil');
Route::get('skipwhile', [CollectionsMethodControllerTwo::class, 'skipwhile'])->name('skipwhile');
Route::get('slice', [CollectionsMethodControllerTwo::class, 'slice'])->name('slice');

/////////////

Route::get('sort', [CollectionsMethodControllerThree::class, 'sort'])->name('sort');
Route::get('sortby', [CollectionsMethodControllerThree::class, 'sortby'])->name('sortby');
Route::get('sortkeys', [CollectionsMethodControllerThree::class, 'sortkeys'])->name('sortkeys');
Route::get('splice', [CollectionsMethodControllerThree::class, 'splice'])->name('splice');
Route::get('split', [CollectionsMethodControllerThree::class, 'split'])->name('split');
Route::get('take', [CollectionsMethodControllerThree::class, 'take'])->name('take');
Route::get('takewhile', [CollectionsMethodControllerThree::class, 'takewhile'])->name('takewhile');
Route::get('transform', [CollectionsMethodControllerThree::class, 'transform'])->name('transform');
Route::get('undot', [CollectionsMethodControllerThree::class, 'undot'])->name('undot');
Route::get('union', [CollectionsMethodControllerThree::class, 'union'])->name('union');
Route::get('unique', [CollectionsMethodControllerThree::class, 'unique'])->name('unique');
Route::get('values', [CollectionsMethodControllerThree::class, 'values'])->name('values');

Route::get('when', [CollectionsMethodControllerThree::class, 'when'])->name('when');
Route::get('whenempty', [CollectionsMethodControllerThree::class, 'whenempty'])->name('whenempty');
Route::get('where', [CollectionsMethodControllerThree::class, 'where'])->name('where');
Route::get('wherebetween', [CollectionsMethodControllerThree::class, 'wherebetween'])->name('wherebetween');

Route::get('wherenotnull', [CollectionsMethodControllerThree::class, 'wherenotnull'])->name('wherenotnull');
Route::get('wherenull', [CollectionsMethodControllerThree::class, 'wherenull'])->name('wherenull');
Route::get('zip', [CollectionsMethodControllerThree::class, 'zip'])->name('zip');

////
Route::get('test1', [TestController::class, 'test1'])->name('test1');
Route::get('test2', [TestController::class, 'test2'])->name('test2');


//// Most Imp. Collection Methods..

Route::get('filter-basic', [MostImpCollectionMethodsController::class, 'filter_basic'])->name('filter-basic');
Route::get('filter-two', [MostImpCollectionMethodsController::class, 'filter_two'])->name('filter-two');
Route::get('filter-three', [MostImpCollectionMethodsController::class, 'filter_three'])->name('filter-three');
Route::get('search-basic', [MostImpCollectionMethodsController::class, 'search_basic'])->name('search-basic');
Route::get('map-basic', [MostImpCollectionMethodsController::class, 'map_basic'])->name('map-basic');
Route::get('reduce-basic', [MostImpCollectionMethodsController::class, 'reduce_basic'])->name('reduce-basic');
Route::get('each-basic', [MostImpCollectionMethodsController::class, 'each_basic'])->name('each-basic');

/////

Route::get('groupby-basic', [MostImpCollectionMethodsController::class, 'groupby_basic'])->name('groupby-basic');
Route::get('groupby-multiple', [MostImpCollectionMethodsController::class, 'groupby_multiple'])->name('groupby-multiple');
Route::get('groupby-date', [MostImpCollectionMethodsController::class, 'groupby_date'])->name('groupby-date');
Route::get('groupby-with-sum', [MostImpCollectionMethodsController::class, 'groupby_sum'])->name('groupby-with-sum');

///

Route::get('tap-basic', [MostImpCollectionMethodsController::class, 'tap_basic'])->name('tap-basic');

Route::get('each-two', [MostImpCollectionMethodsController::class, 'each_two'])->name('each-two');
