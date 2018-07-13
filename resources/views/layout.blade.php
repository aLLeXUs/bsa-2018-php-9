
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="#">Currency market</a>
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            <ul class="navbar-nav mr-auto">
                @section('header')
                    @component('components.headerLink', [
                        'link' => route('currencies.index'),
                        'active' => true
                    ])
                        <i class="fas fa-dollar-sign"></i> Currencies
                    @endcomponent
                    @component('components.headerLink', [
                        'link' => route('currencies.add')
                    ])
                        <i class="fas fa-plus"></i> Add
                    @endcomponent
                @show
            </ul>
        {{--</div>--}}
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
