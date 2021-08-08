@extends('layout.master')
@section('content')



    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 style="text-align: center">Food table</h6>
                        <a href="{{ route('admin.food.create') }}" class="btn btn-success">Add Food</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ten Do An</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gia Ban & Gia sale</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phi dich vu</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thoi gian chuan bi </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tag </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">The loai </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nha Hang </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($foods as $key=>$food)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{asset(''.$food->image)}}" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$food->name}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{$food->description}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$food->price}} Dong</p>
                                            <p class="text-xs text-secondary mb-0">{{$food->price_after_sale}} Dong</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{$food->service_charge}} Dong</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$food->preparation_time}} Phut</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm bg-gradient-dark">{{$food->tag_name}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm bg-gradient-dark">{{$food->category_name}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$food->restaurant}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{route('admin.food.update',$food->id)}}" class="text-secondary font-weight-bold text-xs btn bg-gradient-warning" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>No food</tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
