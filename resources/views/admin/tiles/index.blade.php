@extends('admin.layout')
@section('title')
    {{ __('headers.tiles') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">
                        @lang('headers.list_tiles'):

                    </h4>
                    <div class="table-responsive">

                            <table  class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tiles as $tile)
                                    <tr>
                                        <td>
                                            <a href="{{route('tiles.edit',$tile->id)}}" class="m-b-0 font-medium p-0" title="@lang('headers.edit')">{{$tile->name}}</a>
                                        </td>
                                        <td>{{$tile->created_at}}</td>
                                        <td>
                                            {{Form::open([
                                            'route'=>['tiles.destroy', $tile->id],
                                             'method'=>'delete'
                                             ])}}
                                            <button class="btn btn-link btn-sm"
                                                    title="@lang('messages.delete')"
                                                onclick="return confirm('удалить?')"
                                                    type="submit">
                                                <i class="mdi mdi-delete fa-2x "></i>
                                            </button>
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                    <div class="m-3">
                           <a href="{{route('tiles.create')}}" class="btn btn-sm btn-info")>
                               @lang('messages.add')
                           </a>
                    </div>

                    {{$tiles->links()}}
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    @parent
    <
    <script>
       $('#zero_config').DataTable();
    </script>
@endsection
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->