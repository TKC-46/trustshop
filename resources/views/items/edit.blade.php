<x-layout title="商品更新">
    <div>
        <h1>商品更新</h1>
    </div>
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div>
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}" placeholder="商品名を入れてください" required>
        </div>
        <div>
            <label for="description">説明</label>
            <textarea name="description" id="description"  placeholder="説明を入れてください">{{ $item->description }}</textarea>
        </div>
        <div>
            <label for="price">価格</label>
            <input type="number" name="price" id="price" value="{{ $item->price }}" placeholder="価格を入れてください" required>
        </div>
        <div>
            <label for="stock">在庫数</label>
            <input type="number" name="stock" id="stock" value="{{ $item->stock }}" placeholder="在庫数を入れてください" required>
        </div>
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
    <form action="{{ route('items.destroy', $item) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
    </form>
    <div>
        <a href="{{ route('items.show', $item) }}">一覧に戻る</a>
    </div>
</x-layout>