<table class="table table-bordered table-responsive">
  <thead>
    <tr>
      <td width="8%">Action</td>
      <td>Title</td>
      <td width="12%">Author</td>
      <td width="12%">Category</td>
      <td width="15%">Date</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>
          {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]])!!}
            <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
              <i class="fa fa-edit"></i>
            </a>
            <button type="submit" class="btn btn-xs btn-danger">
              <i class="fa fa-times"></i>
            </button>
          {!! Form::close() !!}
        </td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->author->name }}</td>
        <td>{{ $post->category->title }}</td>
        <td>
          <abbr title="{{ $post->dateFormatted(true) }}">{{  $post->dateFormatted() }}</abbr> |
          {!! $post->publicationLabel() !!}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
