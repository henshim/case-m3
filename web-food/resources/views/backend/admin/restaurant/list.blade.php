@extends('layout.master')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 style="text-align: center">Restaurant List</h6>
                        {{--
                                                <a href="{{ route('admin.food.create') }}" class="btn btn-success">Add Food</a>
                        --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ten Bep Tren May</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dien thoai lien he & Dia chi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trang thai quan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trang thai hoat dong </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cam </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vai tro </th>
                                    <th class="text-secondary opacity-7">Cam hoat dong</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($restaurants as $key=>$restaurant)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{asset(''.$restaurant->image)}}" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$restaurant->restaurant}}</h6>
                                                    <p class="text-xs text-secondary mb-0">Chu quan ly: {{$restaurant->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$restaurant->phone}} </p>
                                            <p class="text-xs text-secondary mb-0">{{$restaurant->address}} </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{$restaurant->email}} </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$restaurant->status}} </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm bg-gradient-dark"> @if($restaurant->status_action == 0) Hoat dong binh thuong @else Tam thoi ngung hoat dong @endif</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm bg-gradient-dark">@if($restaurant->status_ban == 0) Khong vi pham quy che @else Bep nay da bi cam @endif</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Cong tac vien Bep tren may</span>
                                        </td>
                                        <td class="align-middle  text-center">
                                            <a href="{{}}" class="text-secondary font-weight-bold text-xs btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
                                                                X
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>No food</tr>
                                @endforelse
                                </tbody>
                            </table>
{{--
                            {{$restaurants->links()}}
--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
