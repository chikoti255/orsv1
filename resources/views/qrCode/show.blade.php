@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    $user= Auth::user();
@endphp

<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <div class="container mt-2 mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-4">Identification Card</h2>
                <div class="flex items-center justify-center mb-8">
                    <div class="border border-gray-300 rounded-lg p-6">
                        <div class="text-center mb-4">
                            <h2 class="text-lg font-bold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                        </div>

                        @if($user->qrCode && $user->qrCode->qr_code_path)
                            <div class="mb-4">
                              <!--  <img src="{{ Storage::url($user->qrCode->qr_code_path) }}" alt="QR Code" class="mx-auto" /> -->
                                <img src="{{ asset('storage/'. $qrCode->qr_code_path) }}" alt="QR Code" />
                            </div>
                        @else

                            </p>QR code not generated yet.</p>
                       @endif

                      <div class="flex items-center mt-8">
                          <form action="{{ route('qr-code.generateQrCode', ['id' => $user->id]) }}" method="POST">
                              @csrf
                                <button type="submit" class="btn px-2 py-1 bg-blue-500 focus:outline-none rounded-md text-white hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                    Generate qr code<br/> <i class="bi bi-qr-code"></i>
                                </button>
                          </form>
                      </div>


                      

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
