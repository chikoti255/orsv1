@php
    use Illuminate\Support\Facades\Auth;
    $user= Auth::user();
@endphp
<x-app-layout>
    <div class="container mt-2 mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-4">Identification Card</h2>
                <div class="flex items-center justify-center mb-8">
                    <div class="border border-gray-300 rounded-lg p-6">
                        <div class="text-center mb-4">
                            <h3 class="text-lg font-semibold">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p class="text-gray-600">{{ $user->email }}</p>
                        </div>
                        <div class="mb-4">
                            <img src="{{ route('qr-code.show', ['id' => $user->id]) }}" alt="QR Code" class="mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
