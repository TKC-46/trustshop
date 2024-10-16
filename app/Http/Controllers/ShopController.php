<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * ショップ一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::with('user')->withoutTrashed()->orderBy('user_id', 'ASC')->get();
        return view('shops.index', compact('shops'));
    }

    /**
     * ショップ登録フォーム
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * ショップ登録処理
     *
     * @param  \App\Http\Requests\StoreShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        $shop = Auth::user()->shops()->create($request->validated());
        return redirect()->route('shops.show', $shop)->with('success', 'ショップを登録しました');
    }

    /**
     * ショップ詳細
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shops.show', compact('shop'));
    }

    /**
     * ショップ更新フォーム
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $this->authorize('view', $shop);

        return view('shops.edit', compact('shop'));
    }

    /**
     * ショップ更新処理
     *
     * @param  \App\Http\Requests\UpdateShopRequest  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $this->authorize('update', $shop);

        $shop->update($request->validated());
        return redirect()->route('shops.show', $shop)->with('success', 'ショップを更新しました');
    }

    /**
     * ショップ削除処理
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $this->authorize('delete', $shop);

        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'ショップを削除しました');
    }

    //オーナーのショップ一覧
    public function ownerShops()
    {
        $user = Auth::user();
        $shops = Shop::with('user')->where('user_id', $user->id)->orderBy('id', 'ASC')->get();
        return view('shops.owner_index', compact('shops', 'user'));
    }
}
