@extends('layouts.app')

@section('title', '商品編集')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="form form--edit">
        @csrf
        @method('PUT')

        <div class="form__group">
            <label for="name" class="form__label">商品名</label>
            <input type="text" name="name" id="name" class="form__input" value="{{ old('name', $product->name) }}">
            @error('name') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="price" class="form__label">価格</label>
            <input type="number" name="price" id="price" class="form__input" value="{{ old('price', $product->price) }}">
            @error('price') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="description" class="form__label">商品説明</label>
            <textarea name="description" id="description" class="form__textarea">{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <div class="form__group">
            <label for="image" class="form__label">商品画像</label>
            <input type="file" name="image" id="image" class="form__input">
            <img src="{{ asset('images/' . $product->image) }}" alt="現在の画像" class="form__image">
            @error('image') <p class="form__error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="button button--primary">保存する</button>
    </form>
@endsection
