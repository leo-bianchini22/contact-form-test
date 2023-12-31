@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('login')
<form class="header__logout" action="/login" method="post">
    <a class="header-logout__button">logout</a>
</form>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__ttl">
        Admin
    </div>
    <form class="form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
            <button class="search-form__button-submit" type="submit">検索</button>
            <select class="search-form__item-select" name="gender">
                <option value="" hidden selected>性別</option>
                <option value="">全て</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>
            <select class="search-form__item-select" name="category_id">
                <option value="" selected>お問い合わせ内容の種類</option>
                @foreach ($categories as $category)
                <option id="category_id" value="{{ $category['content'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input type="date" class="search-form__item-date">
        </div>
        <div class="admin-table__header">
            <a href="">エクスポート</a>
            <div class="page">ページネーション</div>
        </div>
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row__ttl">
                    <td>お名前</td>
                    <td>性別</td>
                    <td>メールアドレス</td>
                    <td>お問い合わせの種類</td>
                    <td></td>
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td>{{ $contact['first_name'] }} {{ $contact ['last_name'] }}</td>
                    <td>{{ $contact['gender'] }}</td>
                    <td>{{ $contact['email'] }}</td>
                    <td>{{ $category['content'] }}</td>
                    <td><button class="detail-button">詳細</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
</div>
@endsection