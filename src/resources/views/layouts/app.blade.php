<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '商品管理システム')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @stack('styles')
</head>
<body class="layout">
    <header class="layout__header">
        <nav class="layout__nav">
            <div class="layout__nav-container">
                <a href="{{ route('products.index') }}" class="layout__link">商品一覧</a>
                <a href="{{ route('products.create') }}" class="layout__link">商品登録</a>
            </div>
        </nav>
    </header>

    <div class="layout__container">
        @yield('content')
    </div>

    <footer class="layout__footer">
        <p>&copy; 2024 商品管理システム</p>
    </footer>
</body>
</html>
