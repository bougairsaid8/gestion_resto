@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<style>
    .categories-container {
        max-width: 100%;
        padding: 24px;
    }

    .page-header {
        margin-bottom: 32px;
    }

    .page-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #1f2937;
        margin: 0 0 8px 0;
    }

    .page-header p {
        font-size: 15px;
        color: #6b7280;
        margin: 0;
    }

    .toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 16px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        flex: 1;
        min-width: 280px;
        max-width: 450px;
    }

    .search-box input {
        width: 100%;
        padding: 10px 16px 10px 40px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        background: #f9fafb;
    }

    .search-box input::placeholder {
        color: #9ca3af;
    }

    .search-box input:focus {
        outline: none;
        background: white;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        width: 18px;
        height: 18px;
    }

    .toolbar-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn-filter {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: white;
        color: #374151;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-filter:hover {
        background: #f9fafb;
        border-color: #d1d5db;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 8px;
        background: #dc2626;
        color: white;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
    }

    .btn-add:hover {
        background: #b91c1c;
    }

    .table-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
    }

    .table-scroll {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    thead {
        background: #f9fafb;
        border-bottom: 1px dashed #d1d5db;
    }

    th {
        padding: 16px;
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tbody tr {
        border-bottom: 1px dashed #e5e7eb;
        transition: background 0.15s;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    td {
        padding: 16px;
        font-size: 14px;
    }

    .category-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .category-image {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e5e7eb;
    }

    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-icon {
        width: 20px;
        height: 20px;
        color: #d1d5db;
    }

    .category-name {
        font-weight: 600;
        color: #1f2937;
    }

    .description-cell {
        color: #6b7280;
        font-size: 13px;
        max-width: 280px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .count-cell {
        color: #1f2937;
        font-weight: 500;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .status-active {
        background: #ecfdf5;
        color: #059669;
    }

    .status-inactive {
        background: #fef3c7;
        color: #d97706;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-active {
        background: #10b981;
    }

    .dot-inactive {
        background: #f59e0b;
    }

    .actions-cell {
        text-align: right;
    }

    .actions-menu {
        display: inline-flex;
        gap: 8px;
    }

    .btn-action-icon {
        width: 20px;
        height: 20px;
        color: #6b7280;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .footer-info {
        padding: 16px;
        border-top: 1px dashed #d1d5db;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #6b7280;
    }

    .pagination {
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .pagination-btn {
        width: 28px;
        height: 28px;
        border: 1px solid #e5e7eb;
        background: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .pagination-btn:hover:not(:disabled) {
        border-color: #d1d5db;
        background: #f9fafb;
    }

    .pagination-btn.active {
        background: #dc2626;
        color: white;
        border-color: #dc2626;
    }

    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
        color: #6b7280;
        font-size: 14px;
    }

    .empty-state a {
        color: #dc2626;
        text-decoration: none;
        font-weight: 600;
    }

    .empty-state a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            max-width: 100%;
        }

        .toolbar-actions {
            flex-direction: column;
        }

        .btn-add {
            justify-content: center;
        }

        table {
            font-size: 12px;
        }

        td, th {
            padding: 12px;
        }

        .description-cell {
            max-width: 200px;
        }

        .footer-info {
            flex-direction: column;
            gap: 12px;
            text-align: center;
        }
    }
</style>

<div class="categories-container">
    <div class="page-header">
        <h1>Categories Management</h1>
        <p>Organize your menu into categories to improve customer ordering flow.</p>
    </div>

    <div class="toolbar">
        <div class="search-box">
            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" placeholder="Search categories by name...">
        </div>
        <div class="toolbar-actions">
            <button class="btn-filter">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                Filter
            </button>
            <a href="{{ route('category.create') }}" class="btn-add">
                <span>+</span> Add New Category
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px; padding: 12px 16px; margin-bottom: 20px; color: #166534; font-size: 14px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>CATEGORY</th>
                        <th>DESCRIPTION</th>
                        <th style="text-align: center; width: 100px;">ITEMS COUNT</th>
                        <th style="text-align: center; width: 100px;">STATUS</th>
                        <th style="text-align: right; width: 80px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                <div class="category-cell">
                                    <div class="category-image">
                                        @if($category->image)
                                            <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}">
                                        @else
                                            <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <span class="category-name">{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="description-cell">{{ $category->description ?: 'No description' }}</td>
                            <td style="text-align: center;">
                                <span class="count-cell">{{ $category->products->count() }}</span>
                            </td>
                            <td style="text-align: center;">
                                @if($category->status)
                                    <span class="status-badge status-active">
                                        <span class="status-dot dot-active"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        <span class="status-dot dot-inactive"></span>
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <div class="actions-menu">
                                        <a href="{{ route('category.edit', $category) }}" title="Edit">
                                            <svg class="btn-action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('category.destroy', $category) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete" style="background: none; border: none; padding: 0; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this category?')">
                                                <svg class="btn-action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">No categories found. <a href="{{ route('category.create') }}">Create one now</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="footer-info">
           {{$categories->links()}}
            <span>Total: {{ $categories->total() }} categories</span>
        </div>
    </div>
</div>
@endsection
