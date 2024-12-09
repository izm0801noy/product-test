@extends('layouts.app')

@section('title', '商品検索')

@section('content')
    <div class="search-page">
        <h1 class="search-page__title">商品検索</h1>

        <form action="{{ route('products.search') }}" method="GET" class="search-page__form">
            @csrf
            <div class="search-page__form-group">
                <label for="keyword" class="search-page__label">キーワード</label>
                <input type="text" name="keyword" id="keyword" class="search-page__input" value="{{ request('keyword') }}">
            </div>

            <button type="submit" class="search-page__button search-page__button--primary">検索</button>
        </form>

        @if(isset($products) && $products->count() > 0)
            <div class="search-page__results">
                <h2 class="search-page__results-title">検索結果</h2>
                @foreach ($products as $product)
                    <div class="search-page__item">
                        <h3 class="search-page__item-title">{{ $product->name }}</h3>
                        <p class="search-page__item-price">価格: {{ $product->price }}円</p>
                        <p class="search-page__item-description">{{ $product->description }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="search-page__item-link">詳細を見る</a>
                    </div>
                @endforeach
            </div>

            <div class="search-page__pagination">
                {{ $products->links() }}
            </div>
        @else
            <p class="search-page__no-results">検索結果が見つかりませんでした。</p>
        @endif
    </div>
@endsection
