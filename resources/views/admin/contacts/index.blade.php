@extends('layouts.admin')

@section('pageTitle', 'Contact Messages')
@section('pageSubtitle', 'All contact form submissions')

@section('content')

    <div class="admin-card">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-base font-semibold text-white">Messages ({{ $contacts->total() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Sender</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Subject</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Status</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3 pr-4">Date</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-800/30 transition-colors {{ !$contact->is_read ? 'bg-cyan-500/5' : '' }}">
                        <td class="py-4 pr-4">
                            <p class="text-sm font-medium text-white">{{ $contact->name }}</p>
                            <p class="text-xs text-gray-500">{{ $contact->email }}</p>
                        </td>
                        <td class="py-4 pr-4 text-sm text-gray-300 max-w-xs truncate">{{ $contact->subject }}</td>
                        <td class="py-4 pr-4">
                            @if(!$contact->is_read)
                                <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-full bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 font-medium">
                                    <div class="w-1.5 h-1.5 rounded-full bg-cyan-400"></div>
                                    New
                                </span>
                            @else
                                <span class="text-xs px-2.5 py-1 rounded-full bg-gray-700/60 text-gray-500">Read</span>
                            @endif
                        </td>
                        <td class="py-4 pr-4 text-sm text-gray-500">{{ $contact->created_at->format('M d, Y') }}</td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="text-xs text-cyan-400 hover:text-cyan-300 hover:bg-cyan-900/20 px-3 py-1.5 rounded-lg transition-colors">
                                    View
                                </a>
                                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}"
                                      onsubmit="return confirm('Delete this message?')">
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
                        <td colspan="5" class="py-12 text-center text-gray-500 text-sm">No messages yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contacts->hasPages())
        <div class="mt-6 pt-4 border-t border-gray-800">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>

@endsection
