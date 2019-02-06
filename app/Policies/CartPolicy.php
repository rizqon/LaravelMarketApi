<?php

namespace App\Policies;

use App\Model\User\User;
use App\Model\User\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cart.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Model\User\Cart  $cart
     * @return mixed
     */
    public function view(User $user, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can create carts.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cart.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Model\User\Cart  $cart
     * @return mixed
     */
    public function update(User $user, Cart $cart)
    {
        return $user->id === $cart->user_id;
    }

    /**
     * Determine whether the user can delete the cart.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Model\User\Cart  $cart
     * @return mixed
     */
    public function delete(User $user, Cart $cart)
    {
        return $user->id === $cart->user_id;
    }

    /**
     * Determine whether the user can restore the cart.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Model\User\Cart  $cart
     * @return mixed
     */
    public function restore(User $user, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cart.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Model\User\Cart  $cart
     * @return mixed
     */
    public function forceDelete(User $user, Cart $cart)
    {
        //
    }
}
