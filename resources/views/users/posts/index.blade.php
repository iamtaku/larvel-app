@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name}}</h1>
                <p>Posted {{ $posts->count()}}</p>
                <p>Recived {{ $user->recievedLikes()->count() }} likes</p>
            </div>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <h2>User does not have any posts</h2>
            @endif
        </div>
    </div>
@endsection
