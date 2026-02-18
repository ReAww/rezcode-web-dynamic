@extends('layouts.admin')

@section('pageTitle', 'View Message')
@section('pageSubtitle', 'From: ' . $contact->name)

@section('content')

    <div class="max-w-2xl">
        <div class="admin-card">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $contact->subject }}</h3>
                    <p class="text-sm text-gray-400 mt-1">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
                <span class="text-xs px-2.5 py-1 rounded-full {{ $contact->is_read ? 'bg-gray-700/60 text-gray-500' : 'bg-cyan-500/20 text-cyan-400' }}">
                    {{ $contact->is_read ? 'Read' : 'New' }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-gray-800/40 rounded-2xl">
                <div>
                    <p class="text-xs text-gray-500 mb-1">From</p>
                    <p class="text-sm font-medium text-white">{{ $contact->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 mb-1">Email</p>
                    <a href="mailto:{{ $contact->email }}" class="text-sm text-cyan-400 hover:text-cyan-300 transition-colors">{{ $contact->email }}</a>
                </div>
            </div>

            <div class="p-4 bg-gray-800/40 rounded-2xl">
                <p class="text-xs text-gray-500 mb-3">Message</p>
                <p class="text-sm text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-800">
                <a href="{{ route('admin.contacts.index') }}" class="btn-secondary text-sm px-4 py-2">
                    ← Back to Messages
                </a>
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn-primary text-sm px-4 py-2">
                    Reply via Email
                </a>
                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}"
                      onsubmit="return confirm('Delete this message?')" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs text-red-400 hover:text-red-300 hover:bg-red-900/20 px-3 py-1.5 rounded-lg transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
