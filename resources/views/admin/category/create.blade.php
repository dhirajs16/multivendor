@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Add New Category') }}</h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                                        <i class="bi bi-arrow-left"></i> {{ __('Back to list') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Category Creation Form --}}
                                <form action="{{ route('admin.categories.store') }}" method="POST"
                                    enctype="multipart/form-data" id="categoryCreateForm">
                                    @csrf

                                    {{-- avatar field --}}
                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar">
                                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                                    </div>

                                    {{-- name field --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter category name" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </div>

                                    {{-- slug field --}}
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">{{ __('Slug') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Enter slug" required>
                                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />

                                        <small class="form-text text-muted">URL friendly and unique identifier</small>
                                    </div>

                                    {{-- description textarea --}}
                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                                    </div>

                                    {{-- is active checkbox --}}
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                                        <label class="form-check-label" for="is_active">{{ __('Active') }}</label>
                                    </div>

                                </form>
                            </div>

                            {{-- submit button --}}
                            <div class="card-footer">
                                <button onclick="$('#categoryCreateForm').submit()" type="submit"
                                    class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
