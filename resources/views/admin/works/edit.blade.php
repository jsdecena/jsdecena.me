@extends('admin.template.main')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">User details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @include('messages')
                    {!!Form::open(['url' => route('admin.work.update', $data->id), 'role' => 'form', 'method' => 'put'])!!}
                        <!-- text input -->
                        <div class="form-group">
                          <label>Company <span class="text-danger">*</span></label>
                          <input name="company" type="text" class="form-control" placeholder="Company name" value="{{$data->company}}">
                        </div>
                        <div class="form-group">
                          <label>Designation <span class="text-danger">*</span></label>
                          <input name="designation" type="text" class="form-control" placeholder="Designation" value="{{$data->designation}}">
                        </div>
                        <div class="form-group">
                            <label for="from">From <span class="text-danger">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control datepicker" id="from" name="from" data-date-format="dd M yyyy" value="{{date('d M Y', strtotime($data->from))}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="to">To <span class="text-danger">*</span></label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control datepicker" id="to" name="to" data-date-format="dd M yyyy" value="{{date('d M Y', strtotime($data->to))}}" />
                            </div>
                        </div>                        
                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" id="description" rows="7" class="textarea form-control">{{$data->description}}</textarea>
                        </div>

                        <a href="{{route('admin.work.index')}}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
                    {!!Form::close()!!}
                </div><!-- /.box-body -->
              </div><!-- /.box -->                
             </div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
@endsection