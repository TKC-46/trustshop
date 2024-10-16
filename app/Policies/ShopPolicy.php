<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    /**
     * 登録フォーム権限
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function store(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }

    /**
     * 更新フォーム権限
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }

    /**
     * csv出力権限
     */
    public function export(User $user, Shop $shop)
    {
        return $user->id === $shop->user_id;
    }
}
