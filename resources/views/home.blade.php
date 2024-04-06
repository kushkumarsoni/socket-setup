@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <p>Private Channel Data : <span id="private-channel"></span></p> --}}

                    <div id="connect">
                        <form id="lets-connect">
                            <input type="text" name="name" id="name" placeholder="Enter your name.." required />
                            <input type="submit" value="let's connect">
                        </form>
                    </div>

                    <div id="start-chat">
                        <form id="lets-chat">
                            @csrf
                            <input type="hidden" name="username" id="username" placeholder="Enter your name.." />
                            <input type="text" name="message" id="message" placeholder="Enter message here.." required />
                            <input type="submit" value="send">
                        </form>
                    </div>

                    <div id="chatlist"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        // setTimeout(() => {
        //     window.Echo.channel('trades')
        //     .listen('.tradesSocket',(data)=>{
        //         document.getElementById("private-channel").innerHTML = JSON.stringify(data.data);
        //         console.log(data);
        //     });
        // }, 200);

        // setTimeout(() => {
        //     Echo.private('myPrivateChannel.user.{{ Auth::id() }}')
        //     .listen('.privateMessage',(data)=>{
        //         document.getElementById("private-channel").innerHTML = JSON.stringify(data.data);
        //         console.log(data);
        //     });
        // }, 200);

        // setTimeout(() => {
        //     window.Echo.join('track-message-channel')
        //     .here((users)=>{
        //         console.log(users);
        //     }) // it will check how many users are connected
        //     .joining((user)=>{
        //         console.log('New user : '+user.name);
        //     }) //get new user joined
        //     .leaving((user)=>{
        //         console.log('User leave : '+user.name);
        //     }) //get which user has been leaving
        //     // .listen('PresenceMessageEvent',(data)=>{
        //     //     document.getElementById("private-channel").innerHTML = JSON.stringify(data.message);
        //     //     console.log(data);
        //     // });
        //     .listen('.trackMessageSocket',(data)=>{
        //         document.getElementById("private-channel").innerHTML = JSON.stringify(data.message);
        //         console.log(data);
        //     });
        // }, 200);


        $("#start-chat").hide();

        $("#lets-connect").submit(function(e){
            $("#username").val($('#name').val());
            e.preventDefault();
            $("#connect").hide();
            $("#start-chat").show();
        });

        $("#lets-chat").submit(function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $("#message").val('');
            $.ajax({
                url: "{{ route('sendMessage') }}",
                type: "POST",
                data:formData,
                success:function(response){
                    console.log(response);
                }
            });
        });

        // window.Echo.channel('message').listen('SendMessageEvent',function(data){
        //     let allChats = `<br/> <b>${data.username}</b> : ${data.message}`
        //     $("#chatlist").append(allChats);
        // });

        setTimeout(() => {
            window.Echo.channel('message')
            .listen('SendMessageEvent',(data)=>{
                let allChats = `<br/> <b>${data.username}</b> : ${data.message}`
                $("#chatlist").append(allChats);
            });
        }, 200);
    </script>
@endpush
@endsection
