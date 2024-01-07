@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Hero Section</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Hero Section</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hero Section</h2>
            <p class="section-lead">
                On this page you can update post.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Hero Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $hero->title }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="sub_title" id="" class="form-control" style="height: 100px">{{ $hero->sub_title }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="btn_text" class="form-control"
                                            value="{{ $hero->btn_text }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Url</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="btn_url" class="form-control"
                                            value="{{ $hero->btn_url }}">
                                    </div>
                                </div>

                                @if ($hero->image)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                            Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img class="w-25" src="{{ asset($hero->image) }}" alt="">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background
                                        Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
