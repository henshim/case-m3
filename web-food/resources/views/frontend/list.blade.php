@extends('layout.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        {{--                        <h6 style="text-align: center">Food table</h6>--}}
                        {{--
                                                <a href="{{ route('admin.food.create') }}" class="btn btn-success">Add Food</a>
                        --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <article class="col-12 col-sm-9 mt2">
                            <div class="col-12 col-sm-12 row mb-2">
                                @forelse($foods as $key=>$food)
                                    <div class="col-sm-4">
                                        <div>
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <img src="{{asset('storage/images'.$food->image)}}"
                                                         class="avatar avatar-sm me-3"
                                                         alt="user1">
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$food->name}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{$food->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-xs font-weight-bold mb-0">{{number_format($food->price)}}
                                                        Dong</p>
                                                    <p class="text-xs text-secondary mb-0">{{number_format($food->discount)}}
                                                        Dong</p>
                                                </div>
                                                <div class="card-body">
                                                    <span class="text-secondary text-xs font-weight-bold">{{$food->service_charge}} Dong</span>
                                                    {{--                                                    <span class="text-secondary text-xs font-weight-bold">{{$food->preparation_time}} Phut</span>--}}
                                                    {{--                                                    <span--}}
                                                    {{--                                                        class="badge badge-sm bg-gradient-dark">{{$food->tag_name}}</span>--}}
                                                </div>
                                                <div class="card-body">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{$food->restaurant}}</span>
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{route('admin.food.show',$food->id)}}" class="text-secondary font-weight-bold text-xs btn bg-gradient-warning" data-toggle="tooltip" data-original-title="Edit user">
                                                        Details
                                                    </a>
                                                    <a href="" class="btn btn-success">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>No food</tr>
                                @endforelse
                            </div>
                        </article>
                        {{$foods->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
