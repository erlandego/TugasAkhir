{{-- @dd($users) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RakitPC | List User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="text/css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" type="text/css">
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet" type="text/css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">
</head>
<body>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/listuser" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="request" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($users as $item)
        Nama : <a href="/listuser/{{ $item->slug }}"> {{ $item->name }}</a><br>
        Email : {{ $item->email }} <br>
        <br> <br>
    @endforeach

    {{ $users->links() }}
</body>
</html>
