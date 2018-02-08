@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog
      <small>Display All blog post</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
      <li>
        <a href="{{route('backend.blog.index')}}">Blog</a>
      </li>
      <li class="active">All Post</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-header clearfix">
              <div class="pull-left">
                <a href="{{ route('backend.blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
              </div>
            </div>            
            <div class="box-body ">
              @if (!$posts->count())
                <div class="alert alert-danger">
                  <strong>No record found</strong>
                </div>
              @endif
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
                        <a href="{{ route('backend.blog.edit', $post->slug) }}" class="btn btn-xs btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('backend.blog.destroy', $post->slug )}}" class="btn btn-xs btn-danger">
                          <i class="fa fa-times"></i>
                        </a>
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
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-left">
                {{ $posts->render() }}
              </div>
              <div class="pull-right">
                <small>{{$postCount}} {{str_plural('Item', $postCount)}}</small>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>

@endsection

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@endsection