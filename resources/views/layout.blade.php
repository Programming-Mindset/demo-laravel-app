<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pusher Notification</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('css')
</head>
<body>

@yield('content')

<script src="{{ mix('js/app.js') }}"></script>
<script>


    Echo.channel('user-notification')
        .listen('.notification', (e) => {
            console.log('listening event', e);
        });
</script>

@stack('script')
</body>
</html>
