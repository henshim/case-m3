@extends('layout.user.main')

@section('content')
    @forelse($foods as $key=>$food)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('storage/images'.$food->image)}}">
                        <h2>{{$food->name}}</h2>
                        <p>{{number_format($food->price)}} VND</p>
                        <p>{{number_format($food->discount)}} %</p>
                        <p>{{number_format(($food->discount * $food->price)/100)}} VND</p>
                        <p>{{$food->restaurant}}</p>
                        <a href="{{route('admin.food.show',$food->id)}}"
                           class="btn btn-success" data-toggle="tooltip"
                           data-original-title="Edit user">
                            Details
                        </a><br>
                        <a href="" class="btn btn-default add-to-cart">Add to cart</a>
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
