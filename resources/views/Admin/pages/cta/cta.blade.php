@extends('Admin.layout.master')
@section('content')
    <style>
        /* Match Select2 with Bootstrap's form-select */
        .select2-container .select2-selection--multiple {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            height: auto;
            background-color: #fff;
        }

        .select2-container .select2-selection--multiple .select2-selection__choice {
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            margin-right: 0.25rem;
        }

        .select2-container .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 0.25rem;
            cursor: pointer;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
            background-color: #0056b3;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>

    <div class="container-fluid">
        <span class="mt-2 mb-4"><span class="text-danger">Note:</span> (<span class="text-danger">*</span>) symbol represents that the field is required</span>

        <div class="card p-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            @endif

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">CTA Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id=""
                            class="form-control @error('title') is-invalid @enderror" placeholder=""
                            value="{{ $cta->title ?? '' }}" aria-describedby="helpId" />
                        @error('title')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">CTA Description</label>
                        <textarea class="form-control" name="description" id="" rows="3">{{ $cta->description ?? '' }}</textarea>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="" class="form-label">CTA Image</label>
                        <input type="file" name="image" id=""
                            class="form-control @error('image') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" />
                        @error('image')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror

                        @isset($cta->image)
                            <div>
                                <img src="/storage/{{ $cta->image }}" alt="" width="100" height="100">
                            </div>
                        @endisset
                    </div>
                </div>

                <button class="btn btn-success mt-3 mb-3">Submit</button>
            </form>
        </div>
    </div>
@endsection
