@extends('layouts.app')

@section('pagetitle')
    Crea Post
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            <div class="form-group mb-4">
                <label for="title">Titolo</label>
                <input type="text" class="form-control mb-2" id="title" name="title" placeholder="Titolo"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mb-2" id="slug" name="slug" placeholder="Slug"
                    value="{{ old('slug') }}">
                <input type="button" value="Generate slug" id="btn-slugger" class="btn btn-primary mb-2">
                @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="input-group mb-3">
                <select class="custom-select input-group-text w-100 text-start mb-2" id="category_id" name="category_id">
                    <option selected>Scegli una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <fieldset>
                    <legend>Tags</legend>
                    <div class="d-flex gap-5">
                        @foreach ($tags as $tag)
                            <div>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    id="tag-{{ $tag->id }}" @if (in_array($tag->id, old('tags', []))) checked @endif>
                                <label class="mr-3" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>


            <div class="form-group mb-4">
                <label for="content">Content</label>
                <textarea class="form-control mb-2" id="content" name="content" placeholder="Content"
                    rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">CREA NUOVO POST</button>
        </form>
    </div>
@endsection
