@extends('attendee.registered')

@section('content')
<!--table css links-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />
<!--tailwind css -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script src="https://cdn.tailwindcss.com"></script> <!--for not using it in production -->




          <!-- Model --->
          <div style="z-index: 10;" id="default-modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="relative bg-white rounded-lg shadow w-full max-w-3xl">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                              <h3 class="text-xl font-semibold text-gray-900">
                                  Registration form
                              </h3>
                              <button id="close-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                  </svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                          </div>
                          <!-- Modal body -->
                          <div class="p-4 space-y-4">
                                  <div class="bg-white p-4 rounded-lg w-full max-w-3xl">
                                      {{ $attendee->id }}
                                      {{ $attendee->full_name }}

                                  </div>
                        </div>
            </div>
      </div>

          <!--End modal -->



<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>


    <script>

// Get modal and buttons
const modal = document.getElementById('default-modal');
const openModalBtn = document.getElementById('open-modal');
const closeModalBtn = document.getElementById('close-modal');
const acceptBtn = document.getElementById('accept');
const declineBtn = document.getElementById('decline');

// Open modal
openModalBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Close modal
closeModalBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
});

acceptBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
});

declineBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
});
    </script>
@endsection
