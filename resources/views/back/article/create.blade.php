@extends('back.app')

@section('title', 'Dashboard - Page ajout d\'article')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">@if(isset($article)) Modifier @else Ajouter @endif un article</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ isset($article) ? route('article.update', $article) : route('article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($article))
                    @method('PUT')
                @endif
                <div class="formtype">

                    @if(isset($article))
                        <div class="col-12 mb-4">
                            <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" class="img-fluid" style="border-radius: 8px;">
                        </div>
                    @endif

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="title">Titre de l'article</label>
                            <input
                                class="form-control"
                                type="text"
                                name="title"
                                id="title"
                                value="{{ isset($article) ? old('title', $article->title) : old('title') }}"
                            />
                            @if($errors->has('title'))
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="category_id">Categorie</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    <option @if(isset($article)) @selected($article->category_id == $category->id) @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control"
                            rows="5"
                            id="description"
                            name="description">{{ isset($article) ? old('description', $article->description) : old('description') }}</textarea>
                        @if($errors->has('description'))
                            <div class="text-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="col-12 mb-4">
                        <label for="tags">Tags</label>
                        <input class="form-control" type="text" data-role="tagsinput" name="tags" id="tags" value="{{ old('tags', isset($article) ? implode(',', $article->tags->pluck('name')->toArray()) : '') }}">
                        @if($errors->has('tags'))
                            <div class="text-danger">{{ $errors->first('tags') }}</div>
                        @endif
                <button type="submit" class="btn btn-primary mt-3">Enregistrer l'article</button>

                    </div>
                               <!-- Submit Button -->
                </div>
 
        </div>

        <div class="col-lg-4">
            <!-- Card for Image Upload -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Uploader une image</h5>
                    <div class="custom-file mb-3">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="customFile"
                            name="image"
                        />
                        <label class="custom-file-label" for="customFile">Choisir une image</label>
                    </div>
                    @if($errors->has('image'))
                        <div class="text-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>

            <!-- Card for Radio Buttons: Publication -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Publication</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isActive == 1) @else checked @endif id="article_active" name="isActive" value="1">
                        <label class="form-check-label" for="article_active">Publier</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isActive == 0) @endif id="article_inactive" name="isActive" value="0">
                        <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                    </div>
                </div>
            </div>

            <!-- Card for Radio Buttons: Shareable -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Partages</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isSharable == 1) @else checked @endif id="article_share_active" name="isSharable" value="1">
                        <label class="form-check-label" for="article_share_active">Partageable</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isSharable == 0) @endif id="article_share_inactive" name="isSharable" value="0">
                        <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                    </div>
                </div>
            </div>

            <!-- Card for Radio Buttons: Comments -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Commentaires</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="article_comment_active" @if(isset($article)) @checked($article->isComment == 1) @else checked @endif name="isComment" value="1" >
                        <label class="form-check-label" for="article_comment_active">Autorise</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="article_comment_inactive" @if(isset($article)) @checked($article->isComment == 0) @endif name="isComment" value="0">
                        <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script>
    $('#description').summernote({
        placeholder: 'Écrivez ici...',
        tabsize: 2,
        height: 200,
        lang: 'fr-FR'
    });
</script>
@endsection
