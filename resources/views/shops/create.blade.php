<x-layout title="ショップ登録">
    <div>
        <h1>ショップ登録</h1>
    </div>
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">ショップ名</label>
            <input type="text" name="name" id="name" placeholder="ショップ名を入れてください" required>
        </div>
        <div>
            <label for="description">説明</label>
            <textarea name="description" id="description" placeholder="説明を入れてください"></textarea>
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <div>
        <a href="{{ route('shops.index') }}">一覧に戻る</a>
    </div>
</x-layout>