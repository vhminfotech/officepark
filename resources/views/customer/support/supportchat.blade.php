@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="c-stage__header-title o-media__body">
                                        <h6 class="u-mb-zero"><b>Topic :</b> {{ $support_message[$supportArr[0]['support_id']]}}</h6>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="c-stage__header-title o-media__body">
                                        <h6 class="u-mb-zero"><b>Message : </b> {{ $supportArr[0]['note'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="c-chat-dialogue__messages">
                    @for($i=0;$i < count($chatlist);$i++)
                        @if($chatlist[$i]['type'] == 'ADMIN')
                            <div class="c-chat-dialogue__message">
                                <div class="c-chat-dialogue__message-content">
                                    {{ $chatlist[$i]['user_msg'] }}
                                </div>
                            </div>
                        @else
                            <div class="c-chat-dialogue__message c-chat-dialogue__message--self">
                                <div class="c-chat-dialogue__message-content">
                                    {{ $chatlist[$i]['user_msg'] }}
                                </div>
                            </div>
                        @endif
                         
                    @endfor
                    
                    @if($supportArr[0]['close_chat'] == '0')
                        <div class="c-chat-dialogue__footer">
                    
                        <form class="addSupportschat" action="{{ route('support-chat',$supportArr[0]['id']) }}" method="post" id="addSupportschat">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                            <input class="c-input" id="input-chat" type="text" name="chatmsg" placeholder="Begin Chat.." required>
                                        </div>

                                     <div class="col-2">
                                         <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                                             <input class="c-btn c-btn--info " value="Send" type="submit">
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                </div>
            </article>
            
        </div>
    </div>

<div class="c-modal c-modal--huge modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page putHtml">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    /*    a.c-board__btn.c-tooltip.c-tooltip--top {
            position: absolute;
            margin-left: 743px;
            margin-bottom: 41px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    */    .left {
        float: right;
    }

    .c-table__title .c-tooltip{
        position: absolute;
    }
    .c-chat-dialogue__messages {
    height: 460px;}

</style>
@endsection
