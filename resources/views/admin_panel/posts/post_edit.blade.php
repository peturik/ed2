@extends('admin_panel.layouts.app')

@section('title', 'Post: Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @include('admin_panel.layouts.menu')
                    <h2 class="pb-4 mb-4 mt-4 fst-italic border-bottom text-center">

                        Edit Post: <a href="{{ route('post', ['slug' => $post->slug]) }}"><strong>{{ $post->title }}</strong></a>
                    </h2>

                    <article class="blog-post">

                        <form action="{{ route('post.update', ['post' => $post->id]) }} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group m-2">
                                <label for="title">Title</label>
                                <input id="title"
                                       type="text"
                                       name="title"
                                       placeholder="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $post->title) }}">

                                @error('title')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror

                            </div>

                            <div class="form-group m-2">
                                <label for="category">Category</label>
                                <select required name="category" id="category" class="form-select">

                                    @if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    @endif

                                </select>

                                @error('category')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group m-2">
                                {{--<div class="mt-1 w-1/4">
                                    @isset($post->image)
                                        <img src="/storage/{{ $post->image }}" alt="">
                                    @endisset
                                </div>--}}
                                {{--                                @livewire('image-post-admin')--}}
                                <livewire:image-post-admin></livewire:image-post-admin>

                            </div>

                            <div class="form-group m-2">
                                <label>
                                <textarea id="body"
                                          name="body"
                                          rows="10"
                                          cols="45"
                                          {{--                                          contenteditable="true"--}}
                                          placeholder="Body"
                                          class="form-control w-full @error('body') is-invalid @enderror">

                                    {!! old('body',$post->body) !!}
                                </textarea>
                                </label>
                                @error('body')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <input class="" type="submit">
                        </form>
                        @if ($errors->any())
                            <div class="errors">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </article>
                </div>

            </div>

            {{--            @include('layouts.sidebar')--}}

        </div>
    </div>
@endsection

