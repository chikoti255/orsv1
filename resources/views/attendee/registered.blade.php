@extends('admin.admin')

@section('content')
<!--table css links-->

@php
use Illuminate\Support\Facades\Storage;

@endphp


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />
<!--tailwind css -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<link rel="stylesheet" href="{{ asset('css/showAttendee.css') }}" />
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script src="https://cdn.tailwindcss.com"></script> <!--for not using it in production -->
  <script src="{{ asset('/js/showAttendee.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<div class="mt-4">
<div class="container table-responsive" style="width: 100%; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">


      <div style="display: flex; justify-content: flex-end; margin: 0 0 10px 0">
        <a href="#" id="open-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

              <div class="flex flex-row items-center space-x-2">
                        <i class="bi bi-plus-circle-fill"></i>
                      <p>Add Attendee</p>
              </div>
        </a>
      </div>

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

  <form action="{{ route('attendee.register') }}" method="POST" class="space-y-6">
    @csrf
      <!-- Full Name and Email -->
      <div class="flex gap-4">
          <div class="flex-1">
              <label for="full-name" class="block text-sm font-medium text-gray-700">Full Name</label>
              <input type="text" id="full-name" name="full_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" required>
          </div>
          <div class="flex-1">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" required>
          </div>
      </div>

      <!-- Mobile No and Organization -->
      <div class="flex gap-4">
          <div class="flex-1">
              <label for="mobile-no" class="block text-sm font-medium text-gray-700">Mobile No</label>
              <input type="tel" id="mobile-no" name="mobile_no" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" required>
          </div>
          <div class="flex-1">
              <label for="organization" class="block text-sm font-medium text-gray-700">Organization</label>
              <input type="text" id="organization" name="organization" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
          </div>
      </div>

      <!-- Memberships and Title -->
      <div class="flex gap-4">
          <div class="flex-1">
              <label for="membership" class="block text-sm font-medium text-gray-700">Membership</label>
              <select id="membership" name="membership" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                  <option value=""></option>
                  <option value="EACA Member">EACA Member</option>
                  <option value="Non-EACA Member">Non-EACA Member</option>
                  <option value="Student">Student</option>
              </select>
          </div>
          <div class="flex-1">
              <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
              <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
          </div>
      </div>

      <!-- Payment Made and Upload Receipt -->
      <div class="flex gap-4 items-center">
          <div class="flex-1">
              <label for="payment-made" class="block text-sm font-medium text-gray-700">Payment Made</label>
              <select id="payment-made" name="confirm_payment" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                  <option value=""></option>
                  <option value="Yes, I Complete my payment">Yes, I Complete my payment</option>
                  <option value="No, I will pay on arrival">No, I will pay on arrival</option>
              </select>
          </div>
          <div class="flex-1">
              <label for="payment_slip" class="block text-sm font-medium text-gray-700">Upload Payment Slip</label>
              <input type="file" id="payment_slip" name="payment_slip" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>
      </div>

        <!-- country -->
        <div class="flex-1">
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <input type="input" id="country" name="country" class="p-2 mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

      <!-- Comments -->
      <div>
          <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
          <textarea id="comments" name="comments" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"></textarea>
      </div>



</div>
                  </div>
                  <!-- end modal body -->
                  <!-- Modal footer -->
                  <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </div>
              </form>
              </div>
          </div>

          <!--End modal -->

  <table style="margin: auto; width: 100%;" id="example" class="ui celled table">


    <thead>
        <tr>
            <th>Id</th>
            <th>Attendee name</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Country</th>
            <th>Status</th>
            <th>Register date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attendees as $attendee)
              <tr>
                      <td>{{ $attendee->id }}</td>
                      <td>{{ $attendee->full_name}}</td>
                      <td>{{ $attendee->email }}</td>
                      <td>{{ $attendee->organization }}</td>
                      <td>{{ $attendee->country }}</td>
                      <td>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                            {{ $attendee->status }}
                        </span>
                      </td>
                      <td>{{ $attendee->created_at->format('d M Y') }}</td>
                      <td style="display: flex; flex-direction: row; justify-content: space-between; gap: 5px;">
                          <p>
                                <button onClick="viewUserDetails({{ $attendee->id }})">
                                    <i style="font-size: 17px; color: blue;" class="uil uil-eye"></i>
                                </button>
                            </p>
                          <p>

                                    <i style="font-size: 17px" class="uil uil-edit"></i>
                          </p>
                          <p>
                              <button onClick="deleteAttendee()">
                                  <i style="font-size: 17px; color: red;" class="uil uil-trash-alt"></i>
                              </button>
                          </p>
                      </td>
                </tr>
          @endforeach
    </tbody>
    <tfoot>
        <tr>
          <th>Id</th>
          <th>attendeename</th>
          <th>Email</th>
          <th>Organization</th>
          <th>Country</th>
          <th>Status</th>
          <th>Register date</th>
          <th>Action</th>
        </tr>
    </tfoot>
</table>

</div>

        <!-- Show modal -->
        <div id="userModal" class="modal">
            <div class="modal-content">
                  <span class="close" onclick="closeModal()">&times</span>

                  <div id="modal-body">Modal</div>

                        <div id="qrCodeContainer"></div>

                        <div class="qrCodeButton">
                              <button class="btn btn-primary" onClick="generateQrCode()">
                                    Generate Qr Code
                              </button>
                        </div>
            </div>
        </div>


</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.semanticui.js"></script>

    <script>
    $(document).ready(function() {
 $('#example').DataTable();
});

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
