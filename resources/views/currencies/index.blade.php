@extends('layout')

@section('title', 'Currency market')

@section('content')
    @empty($currencies)
        <p>No currencies</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Short name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td><img src="{{ $currency['logo_url'] }}" height="24" width="24" alt=""> <a
                                href="{{ route('currencies.show', $currency['id']) }}">{{ $currency['title'] }}</a></td>
                    <td>{{ $currency['short_name'] }}</td>
                    <td>{{ $currency['price'] }}</td>
                    <td class="form-inline">
                        <a href="{{ route('currencies.edit', $currency['id']) }}" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form method="post" action="{{ route('currencies.destroy', $currency['id']) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" title="Delete" class="btn btn-link"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
@endsection