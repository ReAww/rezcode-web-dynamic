@extends('layouts.admin')

@section('pageTitle', 'Manage Users')
@section('pageSubtitle', 'All registered users')

@section('content')

    <div class="admin-card">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-base font-semibold text-white">Users ({{ $users->total() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">User</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Email</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Role</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Joined</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-800/30 transition-colors">
                        <td class="py-4 pr-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-white">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="py-4 pr-4 text-sm text-gray-400">{{ $user->email }}</td>
                        <td class="py-4 pr-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $user->role === 'admin' ? 'bg-cyan-500/20 text-cyan-400 border border-cyan-500/30' : 'bg-gray-700/60 text-gray-400' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="py-4 pr-4 text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="py-4">
                            @if($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                  onsubmit="return confirm('Delete {{ $user->name }}? This cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-400 hover:text-red-300 hover:bg-red-900/20 px-3 py-1.5 rounded-lg transition-colors">
                                    Delete
                                </button>
                            </form>
                            @else
                            <span class="text-xs text-gray-600">You</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-500 text-sm">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="mt-6 pt-4 border-t border-gray-800">
            {{ $users->links() }}
        </div>
        @endif
    </div>

@endsection
