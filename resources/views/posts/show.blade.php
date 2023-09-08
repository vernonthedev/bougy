@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-2">
                    <img src="/storage/{{ $post->user->profile->image }}" alt="" class="w-50 rounded-circle" style="max-width: 100px;">
                </div>
                <div>
                    <div class="font-weight-bold">{{ $post->user->username }}</h5>
                </div>
            </div>

            <p>{{$post->caption}}</p>
        </div>
    </div>
</div>
@endsection
