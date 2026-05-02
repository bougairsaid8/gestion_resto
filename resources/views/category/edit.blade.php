@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Category</h1>
            <p class="mt-1 text-sm text-gray-500">Update the selected category details.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100" placeholder="Category name">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100" placeholder="category-slug">
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700" for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100" placeholder="Optional description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    @if($category->image)
                        <p class="mt-3 text-sm text-gray-500">Current image:</p>
                        <img src="{{ asset('storage/'.$category->image) }}" alt="Category image" class="mt-2 h-24 w-24 rounded-xl object-cover border border-gray-200">
                    @endif
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="status">Status</label>
                    <select name="status" id="status" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                        <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('category.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
