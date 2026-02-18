@extends('layouts.admin')

@section('pageTitle', 'Edit Service')
@section('pageSubtitle', 'Update service: ' . $service->title)

@section('content')

    <div class="max-w-2xl">
        <div class="admin-card">
            <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Service Title</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="form-input">
                    @error('title') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4" required class="form-input resize-none">{{ old('description', $service->description) }}</textarea>
                    @error('description') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Icon Name</label>
                        <select name="icon" class="form-input">
                            @foreach(['globe', 'cpu', 'settings', 'building', 'code', 'chart', 'shield', 'lightning'] as $icon)
                                <option value="{{ $icon }}" {{ old('icon', $service->icon) === $icon ? 'selected' : '' }}>{{ ucfirst($icon) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0" class="form-input">
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-cyan-500 focus:ring-cyan-500">
                    <label for="is_active" class="text-sm text-gray-300">Active (visible on landing page)</label>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="btn-primary px-6 py-2.5">Update Service</button>
                    <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
