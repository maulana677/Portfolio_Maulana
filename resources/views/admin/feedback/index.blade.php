@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Feedback Section</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Feedback Section</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Feedback Section</h2>
            <p class="section-lead">
                On this page you can create a new post and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Feedbacks</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.feedback.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                #
                                            </th>
                                            <th>Title</th>
                                            <th>Percent</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedback as $item)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td style="width: 600px">{!! $item->description !!}</td>
                                                <td>
                                                    <a href="{{ route('admin.feedback.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.feedback.destroy', $item->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
