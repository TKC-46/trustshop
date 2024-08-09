<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Shop;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ItemController extends Controller
{

    /**
     * 商品登録フォーム
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shop $shop)
    {
        $this->authorize('create', $shop);
        return view('items.create', compact('shop'));
    }

    /**
     * 商品登録処理
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request, Shop $shop)
    {
        $this->authorize('store', $shop);

        $validated = $request->validated();

        Item::create([
            'shop_id' => $shop->id,
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);

        return redirect()->route('shops.show', $shop)->with('success', '商品を登録しました');
    }

    /**
     * 商品詳細
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $shop = $item->shop;
        return view('items.show', compact('item', 'shop'));
    }

    /**
     * 商品更新フォーム
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $this->authorize('edit', $item);

        return view('items.edit', compact('item'));
    }

    /**
     * 商品更新
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $this->authorize('update', $item);

        $item->update($request->validated());
        return redirect()->route('items.show', $item)->with('success', '商品を更新しました');
    }

    /**
     * 商品削除処理
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        $shop = $item->shop;
        $item->delete();
        return redirect()->route('shops.show', $shop)->with('success', '商品を削除しました');
    }

    // 商品購入処理
    public function purchase(Item $item)
    {
        if ($item->stock > 0) {
            $item->stock--;
            $item->save();
        }

        return redirect()->route('items.show', $item)->with('success', "{$item->name}を一つ購入しました");
    }

    // 商品一覧CSV出力
    public function exportCsv(Shop $shop)
    {
        $this->authorize('export', $shop);

        $csvHeader = ['id', 'shop_id', 'name', 'description', 'price', 'stock', 'created_at', 'updated_at'];
        $items = $shop->items;
        $csvData = $items->toArray();


        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200 ,[
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=items.csv',
        ]);

        return $response;
    }
}
