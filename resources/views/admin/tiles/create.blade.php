@extends('admin.layout')
@section('title')
    @lang('headers.add')
@endsection
@section('content')
    {{ Form::open([
        'route' => 'tiles.store',
        ]) }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">
            <label for="title" class="col-sm-3 text-right control-label col-form-label">
                @lang('messages.title')
            </label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control form-group" id="tile" placeholder="введите название" name="name" value="{{old('tile')}}">
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
@endsection
@section('script')

@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->