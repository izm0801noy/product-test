@extends('layouts.app')

@section('title', '商品登録')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form form--create">
        @csrf
        <div class="form__group">
            <label for="name" class="form__label">商品名</label>
            <input type="text" name="name" id="name" class="form__input" value="{{ old('name') }}">
            @error('name') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="price" class="form__label">価格</label>
            <input type="number" name="price" id="price" class="form__input" value="{{ old('price') }}">
            @error('price') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="description" class="form__label">商品説明</label>
            <textarea name="description" id="description" class="form__textarea">{{ old('description') }}</textarea>
            @error('description') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="image" class="form__label">商品画像</label>
            <input type="file" name="image" id="image" class="form__input">
            @error('image') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="button button--primary">登録する</button>
    </form>
@endsection
