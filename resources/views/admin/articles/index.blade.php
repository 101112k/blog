@extends('layouts.admin')

@section('title', 'Статьи')
@section('content')

<div class="text-right mb-3">
<a href="{{ url('admin/articles/create') }}"
class="btn btn-primary btn-sm">Новая статья</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Заголовок</th>
      <th scope="col">Опубликовано</th>
      <th scope="col">Дата создания</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($articles as $article)
    <tr>
      <td>{{ $article->id }}</td>
      <td>{{ $article->title }}</td>
      <td>
      @if($article->is_published)
      <span class="badge badge-success">Да</span>
      @else
      <span class="badge badge-secondary">Нет</span>
      @endif
      </td>
      <td>{{ $article->created_at }}</td>
      <td class="text-right">
      <a href="{{ url('admin/articles/'.$article->id.'/edit') }}" class="btn btn-secondary btn-sm">Изменить</a>
      <a href="{{ url('admin/articles/'.$article->id.'/delete') }}" class="btn btn-danger btn-sm">Удалить</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $articles->links() }}



@endsection