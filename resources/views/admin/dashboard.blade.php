@extends('layouts.admin')

@section('title', 'Welcome, ' . auth()->user()->name)

@section('content')

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        <!-- Total Users -->
        <div class="stat-card group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-cyan-500/20 flex items-center justify-center group-hover:bg-cyan-500/30 transition-colors">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-green-400 bg-green-400/10 px-2 py-1 rounded-full font-medium">+12%</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $stats['total_users'] }}</p>
            <p class="text-sm text-gray-400">Total Users</p>
        </div>

        <!-- Total Services -->
        <div class="stat-card group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-blue-400 bg-blue-400/10 px-2 py-1 rounded-full font-medium">Active</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $stats['total_services'] }}</p>
            <p class="text-sm text-gray-400">Total Services</p>
        </div>

        <!-- Revenue -->
        <div class="stat-card group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-green-500/20 flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-green-400 bg-green-400/10 px-2 py-1 rounded-full font-medium">+8.2%</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">${{ $stats['revenue'] }}</p>
            <p class="text-sm text-gray-400">Revenue (USD)</p>
        </div>

        <!-- Unread Contacts -->
        <div class="stat-card group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                @if($stats['unread_contacts'] > 0)
                    <span class="text-xs text-orange-400 bg-orange-400/10 px-2 py-1 rounded-full font-medium">{{ $stats['unread_contacts'] }} New</span>
                @else
                    <span class="text-xs text-gray-500 bg-gray-700/50 px-2 py-1 rounded-full font-medium">All Read</span>
                @endif
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $stats['unread_contacts'] }}</p>
            <p class="text-sm text-gray-400">Unread Messages</p>
        </div>
    </div>

    <!-- Bottom Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Recent Users -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-base font-semibold text-white">Recent Users</h3>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-cyan-400 hover:text-cyan-300 transition-colors">View all →</a>
            </div>
            <div class="space-y-3">
                @forelse($recent_users as $user)
                <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-800/50 transition-colors">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ $user->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full {{ $user->role === 'admin' ? 'bg-cyan-500/20 text-cyan-400' : 'bg-gray-700 text-gray-400' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-4">No users yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Contacts -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-base font-semibold text-white">Recent Messages</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-cyan-400 hover:text-cyan-300 transition-colors">View all →</a>
            </div>
            <div class="space-y-3">
                @forelse($recent_contacts as $contact)
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-gray-800/50 transition-colors {{ !$contact->is_read ? 'border border-cyan-500/20' : '' }}">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="text-sm font-medium text-white truncate">{{ $contact->name }}</p>
                            @if(!$contact->is_read)
                                <div class="w-2 h-2 rounded-full bg-cyan-400 flex-shrink-0"></div>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 truncate">{{ $contact->subject }}</p>
                    </div>
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-xs text-cyan-400 hover:text-cyan-300 transition-colors flex-shrink-0">View</a>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-4">No messages yet.</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
