<x-layout title="商品登録">
    <div>
        <h1>商品登録</h1>
    </div>
    <form action="{{ route('items.store', $shop) }}" method="POST">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <div>
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" placeholder="商品名を入れてください" required>
        </div>
        <div>
            <label for="description">説明</label>
            <textarea name="description" id="description" placeholder="説明を入れてください"></textarea>
        </div>
        <div>
            <label for="price">価格</label>
            <input type="number" name="price" id="price" placeholder="価格を入れてください" required>
        </div>
        <div>
            <label for="stock">在庫数</label>
            <input type="number" name="stock" id="stock" placeholder="在庫数を入れてください" required>
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <div>
        <a href="{{ route('shops.index') }}">一覧に戻る</a>
    </div>
</x-layout>