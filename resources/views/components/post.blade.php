@props(['post' => $post])
<a href="{{ route('posts.show', $post->id) }}">
    <div class="mb-4">
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
        <span class="text-gray-600 text-sm">{{ $post->created_at }}</span>
        <p class="mb-2">{{ $post->body }}</p>
        <div class="flex items-center">
            @auth
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('likes', $post->id) }}" method="post" class="mr-1">
                        @csrf
                        <button class="text-blue-500" type=>Like</button>
                    </form>
                @else
                    <form action="{{ route('likes', $post->id) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="text-blue-500" type=>Unlike</button>
                    </form>
                @endif
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-blue-500">Delete</button>
                    </form>
                @endcan
            @endauth
            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
        </div>
    </div>
</a>
