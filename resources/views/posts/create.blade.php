@extends('layouts.public')

@section('title', '- Create new Post')

@section('content')
    <section class="section">
        <div class="container">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="columns is-centered">
                    <div class="column is-6">
                        <div class="columns is-multiline is-vcentered">
                            <div class="column is-12">
                                <h2 class="title is-2">Create New post</h2>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">English Title</label>
                                    <div class="control">
                                        <input class="input @error('title_en') is-danger @enderror" name="title_en"
                                            type="text" placeholder="Post Title" value="{{ old('title_en') }}">
                                    </div>
                                    @error('title_en')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Arabic Title</label>
                                    <div class="control">
                                        <input class="input @error('title_ar') is-danger @enderror" name="title_ar"
                                            type="text" placeholder="Post Title" value="{{ old('title_ar') }}">
                                    </div>
                                    @error('title_ar')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">English Content</label>
                                    <div class="control">
                                        <textarea class="textarea @error('content_en') is-danger @enderror"
                                            placeholder="This is an example for post content_en" name="content_en" cols="30"
                                            rows="10">{{ old('content_en') }}</textarea>
                                    </div>
                                    @error('content_en')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Arabic Content</label>
                                    <div class="control">
                                        <textarea class="textarea @error('content_ar') is-danger @enderror"
                                            placeholder="This is an example for post content_ar" name="content_ar" cols="30"
                                            rows="10">{{ old('content_ar') }}</textarea>
                                    </div>
                                    @error('content_ar')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12">
                                <label class="label">Featured Image</label>
                                <div id="file-js-example" class="file has-name">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="featured_image">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Choose a file…
                                            </span>
                                        </span>
                                        <span class="file-name">
                                            No file uploaded
                                        </span>
                                    </label>
                                </div>

                                <script>
                                    const fileInput = document.querySelector('#file-js-example input[type=file]');
                                    fileInput.onchange = () => {
                                        if (fileInput.files.length > 0) {
                                            const fileName = document.querySelector('#file-js-example .file-name');
                                            fileName.textContent = fileInput.files[0].name;
                                        }
                                    }
                                </script>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Category</label>
                                    <div class="control">
                                        <div class="select is-fullwidth @error('category_id') is-danger @enderror">
                                            <select name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('category_id')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Tags</label>
                                    <div class="control">
                                        <div class="select is-multiple is-fullwidth  @error('tags') is-danger @enderror">
                                            <select name="tags[]" multiple>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, old('tags[]') ?? []) ? 'selected' : '' }}>
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('tags')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                    @error('tags.*')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column is-12"><input type="submit"
                                    class="button is-primary is-outlined is-fullwidth" value="Add new Post">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
