@extends('layout.master')
@section('title','Add new food')
@section('content')

    <form class="needs-validation" method="post" action="{{ route('admin.food.store') }}" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">Food Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" required>
                {{--                <div class="valid-feedback">--}}
                {{--                    Looks good!--}}
                {{--                </div>--}}
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom02">Price</label>
                <input type="number" class="form-control" id="validationCustom02" name="price"
                       required>
                {{--                <div class="valid-feedback">--}}
                {{--                    Looks good!--}}
                {{--                </div>--}}
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustomUsername">Discount</label>
                <div class="input-group">
                    {{--                    <div class="input-group-prepend">--}}
                    {{--                        <span class="input-group-text" id="inputGroupPrepend">@</span>--}}
                    {{--                    </div>--}}
                    <input type="number" class="form-control" id="validationCustomUsername" name="discount"
                           aria-describedby="inputGroupPrepend" required>
                    {{--                    <div class="invalid-feedback">--}}
                    {{--                        Please choose a username.--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Service charge</label>
                <input type="number" class="form-control" id="validationCustom03" name="service_charge" required>
                {{--                <div class="invalid-feedback">--}}
                {{--                    Please provide a valid city.--}}
                {{--                </div>--}}
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Preparation time</label>
                <input type="number" class="form-control" id="validationCustom04" name="preparation_time" required>
                {{--                <div class="invalid-feedback">--}}
                {{--                    Please provide a valid state.--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Category</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Tag</label>
                <select name="tag" class="form-control">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="validationCustom06">Chose a picture</label>
            <input class="form-control-file" type="file" name="img" id="invalidCheck" required>
        </div>
        <div class="form-row">
            <div class="col-mb-3 mb-3">
                <label for="validationCustom07">Description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
