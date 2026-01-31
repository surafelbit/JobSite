
<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
// Route::get('/posts', function(){
//     return response()->json([
//         'posts'=>[['title'=>"fanum"]]
//     ]);
// });
//