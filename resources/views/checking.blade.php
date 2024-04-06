<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Websoket</title>
</head>
<body>
    @vite('resources/js/app.js')
    <script>
        // setTimeout(() => {
        //     window.Echo.channel('trades')
        //     .listen('.tradesSocket',(e)=>{
        //         console.log(e);
        //     });
        // }, 200);

        setTimeout(() => {
            window.Echo.private('myPrivateChannel.user.{{ Auth::id() }}')
            .listen('.privateMessage',(e)=>{
                console.log(e);
            });
        }, 200);
    </script>
</body>
</html>
