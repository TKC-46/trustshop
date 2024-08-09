<x-layout title="商品詳細">
    <div>
        <h1>{{ $item->name }}</h1>
    </div>
    <div>
        <p>説明: {{ $item->description }}</p>
    </div>
    <div>
        <p>価格: {{ $item->price }}円</p>
    </div>
    <div>
        <p>在庫数: {{ $item->stock }}</p>
    </div>
    @if (Auth::user()->id === $shop->user_id)
        <div>
            <a href="{{ route('items.edit', $item) }}">商品編集</a>
        </div>
    @endif
    @if (Auth::user()->id !== $shop->user_id)
        @if ($item->stock > 0)
            <form action="{{ route('items.purchase', $item) }}" method="POST">
                @csrf
                <button type="submit">購入</button>
            </form>
        @else
            <div>
                <p>SOLD OUT</p>
            </div>
        @endif
    @endif
    <div>
        <a href="{{ route('shops.show', $shop) }}">商品一覧に戻る</a>
    </div>
</x-layout>