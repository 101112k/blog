@extends('layouts.admin')

@section('title', 'Новая статья')
@section('content')

<form method="POST" action="{{ url('admin/articles/'.$article->id) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Заголовок</label>
    <div class="col-sm-9">
      <input type="text" name="title" class="form-control" placeholder="Заголовок" value="{{ old('title', $article->title) }}">
    </div>
  </div>
	<div class="form-group row">
	  <label class="col-sm-3 col-form-label">Подзаголовок</label>
	  <div class="col-sm-9">
	    <input type="text" name="subtitle" class="form-control" placeholder="Подзаголовок" value="{{ old('subtitle', $article->subtitle) }}">
	  </div>
	</div>
	<div class="form-group row">
	  <label class="col-sm-3 col-form-label">Вступительный текст</label>
	  <div class="col-sm-9">
	  	<textarea class="form-control" name="intro" placeholder="Вступительный текст">{{ old('intro', $article->intro) }}</textarea>
	  </div>
	</div>
	<div class="form-group row">
	  <label class="col-sm-3 col-form-label">Контент</label>
	  <div class="col-sm-9">
	  	<textarea class="form-control" name="content" placeholder="Контент">{{ old('content', $article->content) }}</textarea>
	  </div>
	</div>
	@if(!empty($article->image))
	<div class="form-group row">
      <label class="col-sm-3 col-form-label"></label>
      <div class="col-sm-9">
          <img src="{{ url('storage/blog/'.$article->image) }}" style="max-width: 300px" />
      </div>
    </div>
    @endif
	<div class="form-group row">
	  <label class="col-sm-3 col-form-label">Изображение</label>
	  <div class="col-sm-9">
	  	<input type="file" name="image">
	  </div>
	</div>
  <div class="form-group row">
    <div class="col-sm-3">Опубликовано</div>
    <div class="col-sm-9">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked="checked"' : '' }}>
        <label class="form-check-label" for="gridCheck1">
          Да
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Сохранить</button>
      <a class="btn btn-secondary" href="{{ url('admin/articles') }}">Отмена</a>
    </div>
  </div>
</form>

@endsection