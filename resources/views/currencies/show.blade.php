@extends('layout')

@section('title', "Currency - {$currency['title']}")

@section('header')
    @component('components.headerLink', [
        'link' => route('currencies.index')
    ])
        <i class="fas fa-dollar-sign"></i> Currencies
    @endcomponent
    @component('components.headerLink', [
        'link' => route('currencies.add')
    ])
        <i class="fas fa-plus"></i> Add
    @endcomponent
@endsection

@section('content')
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">Logo</th>
            <td><img src="{{ $currency['logo_url'] }}" alt=""></td>
        </tr>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $currency['title'] }}</td>
        </tr>
        <tr>
            <th scope="row">Short name</th>
            <td>{{ $currency['short_name'] }}</td>
        </tr>
        <tr>
            <th scope="row">Short name</th>
            <td>{{ $currency['price'] }}</td>
        </tr>
        </tbody>
    </table>
    <div class="float-right row">
        <a href="{{ route('currencies.edit', $currency['id']) }}" class="btn btn-primary edit-button"><i class="fas fa-edit"></i> Edit</a>
        <form method="post" action="{{ route('currencies.destroy', $currency['id']) }}">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" title="Delete" class="btn btn-danger ml-2 delete-button"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
    </div>
@endsection