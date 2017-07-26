<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
	<script src="poster.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Hunter's Hub
                </div>
        <div style="padding: 5px 0 0 5px; height: 140px; width: 150px;position:fixed;left:0;top:0">
            <form id='postForm' action='newpost' method='post'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="thread" value="0" />
                <input type="hidden" name="replyee" value="0" />
                <textarea name='content' id='postContentEditor'></textarea><br>
                <input type='button' onclick='newpost()' value='new post'/>
            </form>
        </div>
	
        @foreach($threads as $thread)	
            <div>
                <h3>{{$thread->poster_name}} said</h3>
                <p><textarea readonly>{{$thread->post_content}}</textarea></p>
                <p>at {{$thread->created_at}}<input type='submit' value='reply' onclick='newreply({{$thread->id}}, {{$thread->user_id}})'/></p>
                <div align='right'>
                    @foreach($thread->replies as $reply)
                        <p>{{$reply->poster_name}} @ {{$reply->replyee_name}}</p>
                        <p><textarea readonly>{{$reply->post_content}}</textarea></p>
                        <p>at {{$thread->created_at}}<input type='submit' value='reply' onclick='newreply({{$thread->id}}, {{$reply->user_id}})'/></p>
                    @endforeach
                </div>
            </div>
        @endforeach

                <div class="links">
                    <a href="/">Home</a>
                </div>
            </div>
        </div>
    </body>
</html>
