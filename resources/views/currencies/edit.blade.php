@extends('layout')

@section('title', 'Add currency')

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
    <form method="post" action="{{ route('currencies.update', $currency['id']) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ? old('title') : $currency['title'] }}" placeholder="Name">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Short name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('short_name') ? ' is-invalid' : '' }}" name="short_name" value="{{ old('short_name') ? old('short_name') : $currency['short_name'] }}" placeholder="Short name">
                @if ($errors->has('short_name'))
                    <div class="invalid-feedback">{{ $errors->first('short_name') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Logo url</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('logo_url') ? ' is-invalid' : '' }}" name="logo_url" value="{{ old('logo_url') ? old('logo_url') : $currency['logo_url'] }}" placeholder="Logo url">
                @if ($errors->has('logo_url'))
                    <div class="invalid-feedback">{{ $errors->first('logo_url') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') ? old('price') : $currency['price'] }}" placeholder="Price">
                @if ($errors->has('price'))
                    <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group float-right row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection