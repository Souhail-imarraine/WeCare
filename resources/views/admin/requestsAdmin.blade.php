@extends('layouts.admin')

@section('title', 'Doctor Requests Management')

@section('content')
    <div class="space-y-6">
        <!-- Session Messages -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-emerald-500 mr-2"></i>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-rose-500 mr-2"></i>
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Header Section -->
        <div class="bg-white shadow-sm rounded-lg p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Doctor Registration Requests</h2>
                    <p class="mt-1 text-sm text-gray-500">Review and manage doctor registration requests</p>
                </div>
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center justify-center px-4 py-2 border border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div class="bg-white shadow-sm rounded-lg p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-cyan-100 rounded-lg p-3">
                        <i class="fas fa-users text-cyan-600 text-xl"></i>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-500">Total Requests</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $requests->total() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-500">Pending Requests</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $requests->where('status', 'pending')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requests Table -->
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Doctor
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contact Information
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($requests as $request)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $request->user->first_name }} {{ $request->user->last_name }}
                                            </div>
                                            <div class="text-sm text-gray-500">{{ $request->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $request->phone_number }}</div>
                                    <div class="text-sm text-gray-500">{{ $request->city }}</div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($request->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($request->status == 'approved') bg-emerald-100 text-emerald-800
                                        @else bg-rose-100 text-rose-800 @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-3">
                                        <form action="{{ route('admin.requests.approve', $request->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-white bg-emerald-500 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors duration-200"
                                                title="Approve Request">
                                                <i class="fas fa-check mr-1"></i>
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.requests.reject', $request->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-white bg-rose-500 hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors duration-200"
                                                title="Reject Request">
                                                <i class="fas fa-times mr-1"></i>
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 sm:px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-user-md text-gray-400 text-4xl mb-3"></i>
                                        <p class="text-sm font-medium text-gray-900">No requests found</p>
                                        <p class="mt-1 text-sm text-gray-500">There are no pending doctor registration requests.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $requests->links() }}
            </div>
        </div>
    </div>
@endsection
