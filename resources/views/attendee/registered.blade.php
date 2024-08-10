@extends('admin.admin')

@section('content')
<!--table css links-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />
<!--tailwind css -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script src="https://cdn.tailwindcss.com"></script> <!--for not using it in production -->


<div class="mt-4">
<div class="container table-responsive" style="width: 100%">


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
                    <div class="bg-white p-8 rounded-lg w-full max-w-3xl">

  <form action="#" method="POST" class="space-y-6">
      <!-- Full Name and Email -->
      <div class="flex gap-4">
          <div class="flex-1">
              <label for="full-name" class="block text-sm font-medium text-gray-700">Full Name</label>
              <input type="text" id="full-name" name="full-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" required>
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
              <input type="tel" id="mobile-no" name="mobile-no" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" required>
          </div>
          <div class="flex-1">
              <label for="organization" class="block text-sm font-medium text-gray-700">Organization</label>
              <input type="text" id="organization" name="organization" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
          </div>
      </div>

      <!-- Memberships and Title -->
      <div class="flex gap-4">
          <div class="flex-1">
              <label for="memberships" class="block text-sm font-medium text-gray-700">Memberships</label>
              <input type="text" id="memberships" name="memberships" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
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
              <select id="payment-made" name="payment-made" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
              </select>
          </div>
          <div class="flex-1">
              <label for="payment-receipt" class="block text-sm font-medium text-gray-700">Upload Payment Receipt</label>
              <input type="file" id="payment-receipt" name="payment-receipt" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>
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
                      <button id="accept" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </div>
              </form>
              </div>
          </div>

          <!--End modal -->

  <table style="margin: auto; width: 100%;" id="example" class="ui celled table">


    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Country</th>
            <th>Status</th>
            <th>Register date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
            <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name}} {{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->organization }}</td>
                  <td>{{ $user->country }}</td>
                  <td>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                        {{ $user->status }}
                    </span>
                  </td>
                  <td>{{ $user->created_at->format('d M Y') }}</td>
                  <td style="display: flex; flex-direction: row; justify-content: space-between;">
                      <p><i style="font-size: 17px; color: blue;" class="uil uil-eye"></i></p>
                      <p><i style="font-size: 17px" class="uil uil-edit"></i></p>
                      <p><i style="font-size: 17px; color: red;" class="uil uil-trash-alt"></i></p>
                  </td>
              </tr>
          @endforeach
    </tbody>
    <tfoot>
        <tr>
          <th>Id</th>
          <th>Username</th>
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
