@extends('admin.layout')
@section('title')
    Рабочий стол
@endsection
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Последние добавленные</h4>
            </div>
            <div class="comment-widgets scrollable">
                <!-- Comment Row -->
                @foreach ($lasttiles as $last)
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="comment-text w-100">
                        <h6 class="font-medium">{{$last->name}}</h6>
                          <div class="comment-footer">
                            <span class="text-muted float-right">{{$last->updated_at}}</span>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{route('tiles.edit',$last->id)}}" class="m-b-0 font-medium p-0"
                                       title="edit">
                                        <button type="button" class="btn btn-cyan btn-sm">Редактировать</button>
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    {{Form::open([
                                   'route'=>['tiles.destroy',
                                       $last->id],
                                    'method'=>'delete'
                                    ])}}
                                    <button type="submit" onclick="return confirm('удалить?')" class="btn btn-danger btn-sm">Удалить</button>
                                    {{Form::close()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Card -->
    </div>
</div>

<!-- BEGIN MODAL -->

<!-- Modal Add Category -->

<!-- END MODAL -->
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->