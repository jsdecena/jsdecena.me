@extends('admin.template.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Working Experiences</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            @if(!$works->isEmpty())
                                <table class="table">
                                    <tr>
                                      <th class="col-md-1">#</th>
                                      <th class="col-md-2">Company</th>
                                      <th class="col-md-2">Designation</th>
                                      <th class="col-md-2">Duration</th>
                                      <th class="col-md-2">Actions</th>
                                    </tr>
                                    @foreach($works as $work)
                                        <tr>
                                          <td>{{$work->id}}</td>
                                          <td><a href="{{route('admin.work.edit', $work->id)}}">{{$work->company}}</a></td>
                                          <td>{{$work->designation}}</td>
                                          <td>{{date('d M Y', strtotime($work->from))}} - @if(is_null($work->to)) present @else {{date('d M Y', strtotime($work->to))}} @endif </td>
                                          <td>
                                                {!!Form::open(['url' => route('admin.work.destroy', $work->id), 'method' => 'delete' ])!!}
                                                    <a href="{{route('admin.work.edit', $work->id)}}" class="btn btn-sml btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                    <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-timex"></i> Delete</button>
                                                {!!Form::close()!!}
                                          </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <div class="col-md-12"><p class="alert alert-warning">No works to show</p></div>
                            @endif
                        </div><!-- /.box-body -->
                        @include('admin.template.pagination', ['pages' => $works])                        
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection