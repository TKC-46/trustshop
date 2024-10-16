<x-layout title="ショップ更新">
    <div>
        <h1>ショップ更新</h1>
    </div>
    <form action="{{ route('shops.update', $shop) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <div>
            <label for="name">ショップ名</label>
            <input type="text" name="name" id="name" value="{{ $shop->name }}" placeholder="ショップ名を入れてください" required>
        </div>
        <div>
            <label for="description">説明</label>
            <textarea name="description" id="description" placeholder="説明を入れてください">{{ $shop->description }}</textarea>
        </div>
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
    <div>
        <a href="{{ route('shops.show', $shop) }}">詳細に戻る</a>
    </div>
</x-layout>