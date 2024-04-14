@extends('admin.admin')

@section('content')
<!--table css links-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />

  <script src="https://cdn.tailwindcss.com"></script>

<div class="mt-4">
<div class="container table-responsive" style="width: 100%">
  <table style="margin: auto;" id="example" class="ui celled table">
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
    </script>
@endsection
