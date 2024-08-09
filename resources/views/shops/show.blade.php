<x-layout title="ショップ詳細">
    <div>
        <h1>{{ $shop->name }}</h1>
    </div>
    <div>
        <p>説明: {{ $shop->description }}</p>
    </div>
    <div>
        <a href="{{ route('items.create', $shop) }}">商品登録</a>
    </div>
    <div>
        <a href="{{ route('shops.edit', $shop)}}">ショップ編集</a>
    </div>
    <form action="{{ route('shops.destroy', $shop) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">ショップ削除</button>
    </form>
    <div>
        <h2>商品一覧</h2>
        @foreach ($shop->items as $item)
            <div>
                <a href="{{ route('items.show', $item) }}">{{ $item->name }}</a>
            </div>
        @endforeach
    </div>
    <div>
        <h2>商品一覧CSV出力</h2>
        <form action="{{ route('items.exportCsv', $shop) }}" method="GET">
            <button type="submit">CSV出力</button>
        </form>
    </div>
    <div>
        <a href="{{ route('shops.index') }}">一覧に戻る</a>
    </div>
</x-layout>