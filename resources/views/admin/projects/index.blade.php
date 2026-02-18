@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-black text-white">Projects</h1>
        <p class="text-gray-400 text-sm mt-1">Manage your portfolio projects</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary text-sm px-5 py-2.5">
        + Add Project
    </a>
</div>

<div class="glass-card rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-800">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Project</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden sm:table-cell">Category</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden md:table-cell">Tech Stack</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/60">
                @forelse($projects as $project)
                    <tr class="hover:bg-gray-800/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-cyan-500/20 to-blue-600/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium text-sm">{{ $project->title }}</p>
                                    @if($project->is_featured)
                                        <span class="text-xs text-amber-400">⭐ Featured</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            <span class="text-xs text-gray-400 bg-gray-800 px-2.5 py-1 rounded-lg capitalize">{{ $project->category }}</span>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="text-xs text-gray-500 bg-gray-800/60 px-2 py-0.5 rounded">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full {{ $project->is_active ? 'text-green-400 bg-green-400/10' : 'text-gray-500 bg-gray-800' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $project->is_active ? 'bg-green-400' : 'bg-gray-600' }}"></span>
                                {{ $project->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="text-xs text-cyan-400 hover:text-cyan-300 bg-cyan-400/10 hover:bg-cyan-400/20 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1.5 rounded-lg transition-colors">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-cyan-400 hover:underline">Add one</a>.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
        <div class="px-6 py-4 border-t border-gray-800">{{ $projects->links() }}</div>
    @endif
</div>
@endsection
