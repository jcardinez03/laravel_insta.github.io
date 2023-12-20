@extends('layouts.app')

@section('title', 'Show Post')
    
@section('content')

<div class="row border shadow">
    <div class="col p-0 border-end">
        <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
    </div>

    <div class="col-4 px-0 bg-white">
        <div class="card border-0">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('profile.show', $post->user->id) }}">
                            @if ($post->user->avatar)
                                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            @endif
                        </a>
                    </div>
        
                    <div class="col ps-0">
                        <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
                    </div>
            
                    <div class="col-auto">
                        @if (Auth::user()->id === $post->user->id)
                            <div class="dropdown">
                                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                
                                {{-- if the logged in user is the owner of the post, show EDIT and DELETE buttons --}}
                
                            
                                <div class="dropdown-menu">
                                    <a href="{{ route('post.edit', $post->id) }}" class="dropdown-item">
                                        <i class="fa-regular fa-pen-to-square"></i> Edit
                                    </a>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}">
                                        <i class="fa-regular fa-trash-can"></i> Delete
                                    </button>
                                </div>
                                {{-- include modal here --}}
                                @include('users.posts.contents.modals.delete')
                            </div>
                        @else
                            {{-- if logged in user is not the owner of the post, show an unfollow button. To be discussed soon. --}}
                            {{-- show follow button for now --}}
                            @if ($post->user->isFollowed())
                                <form action="{{ route('follow.destroy', $post->user->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="border-0 bg-transparent p-0 text-secondary">Following</button>
                                </form>
                            @else
                                <form action="{{ route('follow.store', $post->user->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body w-100">
                <div class="row align-items-center">
                    <div class="col-auto">
                        @if ($post->isLiked())
                            <form action="{{ route('like.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-solid fa-heart text-danger"></i></button>
                            </form>
                        @else
                            <form action="{{ route('like.store', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-heart"></i></button>
                            </form>
                        @endif
                    </div>
        
                    <div class="col-auto px-0">
                        <span>{{ $post->likes->count() }}</span>
                    </div>
        
                    <div class="col text-end">
                        @forelse ($post->categoryPost as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                {{ $category_post->category->name }}
                            </div>
                        @empty
                            <div class="badge bg-dark text-wrap">Uncategorized</div>
                        @endforelse
                    </div>
                </div>
        
                {{-- owner + description --}}
                <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                &nbsp;
                <p class="d-inline fw-light">{{ $post->description }}</p>
                <p class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($post->created_at)) }}</p>
        
                {{-- include comments --}}
                @include('users.posts.contents.comments')
            </div>
        </div>
    </div>
</div>

@endsection