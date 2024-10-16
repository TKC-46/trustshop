<x-layout title="オーナーショップ">
    <div>
        <h1>{{ $user->name }} ショップ一覧</h1>
    </div>
    <div>
        <h3>ユーザーID: {{ $user->id }}</h3>
    </div>
    <div>
        <a href="{{ route('shops.create') }}">ショップ登録</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ショップ名</th>
                <th>ショップ説明</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    <td>
                        <a href="{{ route('shops.show', $shop) }}">{{ $shop->name }}</a>
                    </td>
                    <td>{{ $shop->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('shops.index') }}">ホームへ戻る</a>
    </div>
</x-layout>