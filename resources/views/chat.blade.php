@extends('layouts.app')

@section('content')

<div class="container">
    <div id= "app" class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :user="{{ Auth::user() }}" :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                    <p v-show="typing" class="help-block" style="font-style: italic;">
                        @{{ user.name }} is typing...
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection