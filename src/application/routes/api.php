<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => ['api']
    ], function() {
    // 認証系（A）
    // 登録系（C）
    // 参照系（R）
    Route::post('/example', 'ExampleController@read');
    // 更新系（U）
});