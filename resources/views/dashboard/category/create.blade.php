@extends('dashboard.layouts.main')

@section('container')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Category</h1>
        </div>
        
        <div class="col-lg-6">
            <form action="/dashboard/categories" method="post" class="mb-5" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autofocus value="{{ old('name') }}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slugCategory" readonly value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    


@endsection