@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Category Details</h1>
                <p class="mt-1 text-sm text-gray-500">Review the information for this category.</p>
            </div>
            <a href="{{ route('category.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Back to categories</a>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div class="space-y-4">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Name</h2>
                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $category->name }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Slug</h2>
                    <p class="mt-1 text-lg text-gray-900">{{ $category->slug }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Status</h2>
                    <p class="mt-1 text-sm text-gray-900">{{ $category->status ? 'Active' : 'Inactive' }}</p>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Description</h2>
                    <p class="mt-1 whitespace-pre-line text-gray-900">{{ $category->description ?: 'No description provided.' }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Created</h2>
                    <p class="mt-1 text-gray-900">{{ $category->created_at->format('F j, Y') }}</p>
                </div>
            </div>
        </div>

        @if($category->image)
            <div class="mt-6">
                <h2 class="text-sm font-medium text-gray-500">Image</h2>
                <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" class="mt-3 max-h-72 w-full rounded-2xl object-cover border border-gray-200">
            </div>
        @endif
    </div>
</div>
@endsection
