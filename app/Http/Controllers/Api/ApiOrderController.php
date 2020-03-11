<?php

namespace App\Http\Controllers\Api;

use App\Models\Basket;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiOrderController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $basket = Basket::where('user_id', User::current())->whereNull('order_id')->get();;
        $user_data = $request->only('name', 'email', 'phone');

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $password = 'password';
            $user = User::create(array_merge($user_data, [
                'password' => bcrypt($password),
            ]));

            Auth::login($user);
        }

        if ($user) {
            $user_data = ['user_id' => $user->id];
        }

        $order = Order::create(array_merge($user_data,
            $request->only('message', 'delivery', 'country', 'state', 'city', 'address')));

        $basket->each(function (Basket $item) use ($order) {
            $item->update([
                'order_id' => $order->id,
                'user_id' => User::current(),
            ]);
        });

        return  $this->index();
    }













}
