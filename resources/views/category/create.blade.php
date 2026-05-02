@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<style>
    .create-container {
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

    .form-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 32px;
        max-width: 900px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .input-wrapper {
        position: relative;
    }

    input[type="text"],
    input[type="email"],
    textarea,
    select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        background: white;
        color: #1f2937;
        transition: all 0.2s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    textarea::placeholder {
        color: #9ca3af;
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    .upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 6px;
        padding: 40px 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #f9fafb;
    }

    .upload-area:hover {
        border-color: #9ca3af;
        background: #f3f4f6;
    }

    .upload-area.drag-over {
        border-color: #3b82f6;
        background: #eff6ff;
    }

    .upload-icon {
        width: 44px;
        height: 44px;
        margin: 0 auto 12px;
        color: #ef4444;
    }

    .upload-text {
        font-size: 14px;
        margin: 0;
    }

    .upload-text strong {
        color: #ef4444;
        font-weight: 600;
    }

    .upload-hint {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 6px;
    }

    input[type="file"] {
        display: none;
    }

    .image-preview {
        margin-top: 12px;
        display: none;
    }

    .image-preview.show {
        display: block;
    }

    .preview-img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
    }

    .toggle-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px;
        background: #f9fafb;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
    }

    .toggle-label {
        margin: 0;
        font-weight: 600;
        color: #374151;
    }

    .toggle-description {
        display: block;
        font-size: 13px;
        color: #6b7280;
        font-weight: 400;
        margin-top: 4px;
    }

    .toggle-switch {
        position: relative;
        width: 48px;
        height: 28px;
        background: #d1d5db;
        border-radius: 9999px;
        cursor: pointer;
        transition: background 0.3s;
        border: none;
        padding: 0;
        flex-shrink: 0;
        margin-left: 16px;
    }

    .toggle-switch.active {
        background: #dc2626;
    }

    .toggle-switch::before {
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: white;
        top: 2px;
        left: 2px;
        transition: left 0.3s;
    }

    .toggle-switch.active::before {
        left: 22px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid #e5e7eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid;
        cursor: pointer;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .btn-cancel {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
    }

    .btn-save {
        background: #dc2626;
        color: white;
        border-color: #dc2626;
    }

    .btn-save:hover {
        background: #b91c1c;
        border-color: #b91c1c;
    }

    .error-alert {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 6px;
        padding: 12px 16px;
        margin-bottom: 20px;
        color: #b91c1c;
        font-size: 14px;
    }

    .error-alert ul {
        margin: 0;
        padding-left: 20px;
    }

    .error-alert li {
        margin: 4px 0;
    }

    @media (max-width: 768px) {
        .form-card {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

        .toggle-wrapper {
            flex-direction: column;
            text-align: left;
        }

        .toggle-switch {
            margin-left: 0;
            margin-top: 12px;
        }
    }
</style>

<div class="create-container">
    <div class="page-header">
        <h1>Add New Category</h1>
        <p>Organize your menu by creating a new distinct section for your items.</p>
    </div>

    <div class="form-card">
        @if($errors->any())
            <div class="error-alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g., Drinks" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g., drinks" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Tell us more about the product features...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Category Image</label>
                <div class="upload-area" id="uploadArea" onclick="document.getElementById('image').click()">
                    <svg class="upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="upload-text"><strong>Upload a file</strong> or drag and drop</p>
                    <p class="upload-hint">PNG, JPG, GIF up to 2MB</p>
                </div>
                <input type="file" name="image" id="image" accept="image/*" onchange="handleFileSelect(event)">
                <div class="image-preview" id="imagePreview">
                    <img id="previewImg" class="preview-img" alt="Preview">
                </div>
            </div>

            <div class="form-group">
                <label class="toggle-wrapper">
                    <div>
                        <div class="toggle-label">Category Visibility</div>
                        <span class="toggle-description">Control if this category is visible on the public menu.</span>
                    </div>
                    <input type="hidden" name="status" value="Hidden">
                    <button type="button" class="toggle-switch" id="statusToggle" onclick="toggleStatus()"></button>
                </label>
            </div>

            <div class="form-actions">
                <a href="{{ route('category.index') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-save">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('image');
    const statusToggle = document.getElementById('statusToggle');

    // Initialize status toggle
    const initialStatus = '{{ old('status', 'Active') }}';
    if (initialStatus === 'Active') {
        statusToggle.classList.add('active');
    }

    // Drag and drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('drag-over');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            imageInput.files = e.dataTransfer.files;
            handleFileSelect({target: imageInput});
        }
    });

    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.add('show');
            };
            reader.readAsDataURL(file);
        }
    }

    function toggleStatus() {
        const toggle = document.getElementById('statusToggle');
        const statusInput = document.querySelector('input[name="status"]');
        toggle.classList.toggle('active');
        statusInput.value = toggle.classList.contains('active') ? 'Active' : 'Hidden';
    }
</script>
@endsection
