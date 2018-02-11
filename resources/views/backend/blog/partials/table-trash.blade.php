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
          {!! Form::open(['style' =>'display:inline-block',  'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]])!!}
            <button title="Restore" type="submit" class="btn btn-xs btn-default">
              <i class="fa fa-refresh"></i>
            </a>
            {!! Form::close() !!}
            {!! Form::open(['style' =>'display:inline-block',  'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]])!!}
            <button title="Delete Permanent" type="submit" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" class="btn btn-xs btn-danger">
              <i class="fa fa-times"></i>
            </button>
          {!! Form::close() !!}
        </td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->author->name }}</td>
        <td>{{ $post->category->title }}</td>
        <td>
          <abbr title="{{ $post->dateFormatted(true) }}">{{  $post->dateFormatted() }}</abbr>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
