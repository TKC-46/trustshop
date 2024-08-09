<x-layout>
    <div>
        <h1>ショップ一覧</h1>
    </div>
    <div>
        <a href="{{ route('shops.create') }}">ショップ登録</a>
    </div>
    <div>
        <a href="{{ route('shops.owner.index') }}">オーナーのショップ一覧</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ユーザーID</th>
                <th>ユーザー名</th>
                <th>ショップ名</th>
                <th>ショップ説明</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    <td>{{ $shop->user_id ?? '不明'}}</td>
                    <td>{{ $shop->user->name ?? '不明' }}</td>
                    <td>
                        <a href="{{ route('shops.show', $shop) }}">{{ $shop->name }}</a>
                    </td>
                    <td>{{ $shop->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>