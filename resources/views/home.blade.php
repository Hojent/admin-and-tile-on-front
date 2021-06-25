@extends('layout')

@section('content')

        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-6 col-md-6 d-flex align-items-end">
                    <div class="text">
                        <h1 class="mb-4">Тестовое <span> задание</span></h1>
                        <p style="font-size: 18px;">Создание CRUD для сущности tile.</p>
                    </div>
                </div>
            </div>
        </div>

    <section class="section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center mb-5">
                    <h2 class="mb-2">Заголовок</h2>
                </div>
            </div>
            <div class="row tile-list">
               @if(count($tiles)>0)
                   @foreach($tiles as $tile)
                       <div class="col-md-6 tile-box">
                             <div class="card card-body shadow ">
                                 <h4>{{$tile->name}}</h4>
                             </div>
                        </div>
                   @endforeach
               @endif
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    @if(count($tiles)>0)
                        <p class="text-center mt-4 mb-5"><button class="load-more btn btn-dark" data-totalResult="{{ \App\Tile::count() }}">Загрузить еще</button></p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
@section ('script')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var main_site="{{ url('/') }}";
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".load-more").on('click',function(){
                var _totalCurrentResult=$(".tile-box").length;
                // Ajax Reuqest
                $.ajax({
                    url:main_site+'/load-more-data',
                    type:'get',
                    dataType:'json',
                    data:{
                        skip:_totalCurrentResult
                    },
                    beforeSend:function(){
                        $(".load-more").html('Loading...');
                    },
                    success:function(response){
                        var _html=''; console.log('000000000');
                        var image='uploads/';
                        $.each(response,function(index,value){
                            _html+='<div class="col-md-6 tile-box mt-4">';
                            _html+='<div class="card card-body shadow">';
                           _html+='<h4>'+value.name+'</h4>';
                            _html+='</div>';
                            _html+='</div>';
                        });
                        console.log(_html);
                        $(".tile-list").append(_html);
                        // Change Load More When No Further result
                        var _totalCurrentResult=$(".tile-box").length;
                        var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                        console.log(_totalCurrentResult);
                        console.log(_totalResult);
                        if(_totalCurrentResult==_totalResult){
                            $(".load-more").remove();
                        }else{
                            $(".load-more").html('Загрузить еще');
                        }
                    }
                });
            });
        });
    </script>
    {{-- Ajax Script End --}}
@endsection