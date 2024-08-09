<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- コンポーネントのスロットでタイトルを指定 -->
    <title>ネットショップ開設システム - {{ $title ?? 'ホーム' }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width">

    <!-- CSS読み込み -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- フォント読み込み -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">

</head>
<body>
<div class="main">
    <div class="contents">
        <div class="row">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success mt-5" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <!-- エラー表示 -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-5" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
</div>

<div class="logout-button">
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>

<!-- JS読み込み -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
