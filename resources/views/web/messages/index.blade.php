@extends('web.layout')

@section('slider')

<div class="row row-fluid">
    <div class="nocontainer">
        <div class="col-sm-12">
            <div class="cover_image">
                <img src="{{ getFullImageUrl(auth()->user()->cover, 'cover')}}">
            </div>
            <div class="container profile_details">
                <div class="row">
                    <div class="col-md-10">                        
                        <div class="profile_pic"><img src="{{ getFullImageUrl(auth()->user()->image, 'avatar')}}" width="180" height="180"></div>
                        <div class="profile_name">{{ auth()->user()->name }}, {{ auth()->user()->location }}</div>
                    </div>
                    <!-- <div class="col-md-2">
                        <a href="#" class="btn_getintouch"> <i class="fa fa-envelope-o"></i>Get in Touch </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('breadcrumb')    
    <span>Messages</span>
@stop

@section('content')

<div class="post_container">    
    <h2>Messages</h2>

    <div class="message_wrapper">  
        <div class="row">
            <div class="col-md-4"> 
                <ul class="messages_tabs tabs-left" id="messages_tabs">
                    @foreach($inbox as $ug => $chat)
                    <li class="@if( !$ug ) active @endif" @if(!$ug) id="message_tab_id" @endif>
                        <a href="#message_{{ $chat->id }}" data-toggle="tab" data-message-id = "{{$chat->id}}">
                            <div class="img_tab"><img src="{{ $chat->user_one != auth()->user()->id ? getFullImageUrl($chat->sender->avatar, 'avatar') : getFullImageUrl($chat->receiver->avatar, 'avatar')  }}"></div>
                            <div class="message_tab_name">
                                {{ $chat->user_one != auth()->user()->id ? $chat->sender->name : $chat->receiver->name  }}
                                <div class="message_time"><i class="fa fa-calendar"></i> 
                                    {{ $chat->updated_at->diffForHumans()}}    
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach                
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    @foreach($inbox as $k => $chat)
                        <div class="tab-pane @if(!$k) active @endif" id="message_{{ $chat->id }}">
                            <div class="message_content">
                                <div class="message_content_wrapper"> 
                                    <center>
                                        <button type="button" class="load-previous btn btn-link btn-sm" data-page="2" onclick="Message.loadPrevious($(this), {{$chat->id}}, event)">Load Previous</button>
                                        <span id="load_previous_loader_{{$chat->id}}" style="display: none">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </span>
                                    </center>
                                    <div class="clearfix"></div>
                                    <div class="message_box" id="message_box_{{$chat->id}}" >
                            @foreach($chat->messages()->with('user')->latest()->take(15)->get()->reverse() as $message)
                                <div class="message">
                                    <div class="img_tab">
                                        <img src="{{ $message->user_id == $chat->user_one ? getFullImageUrl($chat->sender->avatar, 'avatar') : getFullImageUrl($chat->receiver->avatar, 'avatar')  }}">
                                    </div>
                                    <div class="message_body">
                                        <div class="message_name">
                                        <a href="{{ route('web.profile.public', $message->user->username) }}">{{ $message->user->name }} </a>
                                        </div>
                                        <div class="message_destime">{{ $message->created_at->diffForHumans()}}</div>
                                        <div class="message_desc">{{ $message->message }}</div>
                                    </div>
                                </div>
                            @endforeach
                                    </div>
                                </div>
                            <div class="reply_message" id="reply_message_{{ $chat->id }}">
                                <form>
                                <textarea class="write_messagereply" placeholder="Write a reply ..." rows="4" name="message"></textarea>
                                <input type="hidden" name="user_id" value="{{ $chat->user_one == auth()->user()->id ? $chat->user_two : $chat->user_one }}">
                                <div class="reply">
                                    <button type="button" onclick="Message.sendMessage($(this), event)" class="btn_posts btn_rply">Send <i class="fa fa-arrow-right"></i></button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('after-js')
    
    <script type="text/javascript">
        $(document).ready(function(){

            Message.readMessage($('#message_tab_id a').data('message-id'));

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                console.log($(e.target).data('message-id'));
                Message.readMessage($(e.target).data('message-id'));

            });
        });
    </script>
@stop

