@extends('admin.layout')
@section('title')
    @lang('headers.edit')
@endsection
@section('content')

    {{ Form::open([
     'route' => ['tiles.update', $tile->id],
     'method' => 'put',
     ]) }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="title" class="col-sm-3 text-right control-label col-form-label">
                    @lang('messages.title')
                </label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="введите заголовок" name="name" value="{{$tile->name}}">
            </div>
        </div>

        <div>
            <a class="btn btn-info" href="{{ route('tiles.index') }}">@lang('messages.back')</a>
            <button class="btn btn-success pull-right">
                @lang('messages.save')
            </button>
        </div>

    </div>
    {!! Form::close() !!}

    <!-- BEGIN MODAL -->

    <!-- Modal Add Category -->

    <!-- END MODAL -->
@endsection

@section('script')

@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->