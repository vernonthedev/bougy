@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" alt="" class="rounded-circle w-100"  >
        </div>
        <div class="col-9 pt-5">
            <div class="font-weight-bold d-flex justify-content-between align-items-baseline" style="font-family: Quicksand;"><h1>{{ $user->username }}</h1>

                @can('update', $user->profile)
                    <a href="/p/create" class="btn btn-outline-info">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan



            <div class="d-flex">
                <div style="padding-right: 7px;"><strong>{{$user->posts->count() }}</strong> posts</div>
                <div style="padding-right: 7px;"><strong>23k</strong> followers</div>
                <div style="padding-right: 7px;"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold" style="font-family: Quicksand;"><h1>{{$user->profile->title}}</h1></div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>

        <div class="row pt-5">
            @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
            </div>
            @endforeach

        </div>

    </div>
</div>
@endsection
