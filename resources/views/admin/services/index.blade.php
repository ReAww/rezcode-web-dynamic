@extends('layouts.admin')

@section('pageTitle', 'Manage Services')
@section('pageSubtitle', 'All services offered by Rezcode')

@section('content')

    <div class="admin-card">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-base font-semibold text-white">Services ({{ $services->total() }})</h3>
            <a href="{{ route('admin.services.create') }}" class="btn-primary text-sm px-4 py-2">
                + Add Service
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Service</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Icon</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Status</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Order</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60">
                    @forelse($services as $service)
                    <tr class="hover:bg-gray-800/30 transition-colors">
                        <td class="py-4 pr-4">
                            <p class="text-sm font-medium text-white">{{ $service->title }}</p>
                            <p class="text-xs text-gray-500 mt-0.5 max-w-xs truncate">{{ $service->description }}</p>
                        </td>
                        <td class="py-4 pr-4">
                            <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded-lg font-mono">{{ $service->icon }}</span>
                        </td>
                        <td class="py-4 pr-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $service->is_active ? 'bg-green-500/20 text-green-400' : 'bg-gray-700/60 text-gray-500' }}">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="py-4 pr-4 text-sm text-gray-400">{{ $service->sort_order }}</td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.services.edit', $service) }}"
                                   class="text-xs text-cyan-400 hover:text-cyan-300 hover:bg-cyan-900/20 px-3 py-1.5 rounded-lg transition-colors">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                                      onsubmit="return confirm('Delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-400 hover:text-red-300 hover:bg-red-900/20 px-3 py-1.5 rounded-lg transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-500 text-sm">No services yet. <a href="{{ route('admin.services.create') }}" class="text-cyan-400 hover:underline">Add one.</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
        <div class="mt-6 pt-4 border-t border-gray-800">
            {{ $services->links() }}
        </div>
        @endif
    </div>

@endsection
