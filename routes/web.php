<?php

use FrittenKeeZ\Vouchers\Facades\Vouchers;
use Illuminate\Support\Facades\Route;

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
    $user = \App\Models\User::find(1);
    $user2 = \App\Models\User::find(2);
    $user3 = \App\Models\User::find(3);


    $success = Vouchers::redeem('USR-VG7C-8DZF', $user2, ['foo' => 'bar']);
dd($success);

    $voucher1 = Vouchers::withExpireTime(now()->addHours(12))
                        ->withEntities($user, $user2)
                        ->withPrefix('USR')
                        ->create();

//    $success = Vouchers::redeem('4ZEE4WEG', $user, ['foo' => 'bar']);
    dd($voucher1);




    $voucher = $user->redeemCode('4GP233EP');
//    dd($voucher);
    $article = \App\Models\Article::find(2);
    $voucher = $article->createVouchers(1, [], today()->addDays(7));
//    dd($voucher);
//    for ($i = 0; $i < 10; $i++){
//
//        $voucher = $article->createVouchers(1, [], today()->addDays(7));
//        $user->redeemVoucher($voucher);
//    }
//    $vouchers = $article->createVouchers(2, [
//        'from' => 'Marcel',
//        'message' => 'This one is for you. I hope you like it'
//    ]);
//    $user->redeemCode('PKVW-2KVZ');
//dd(324234);
//    return $user->redeem('ABC-DEFss');

});
