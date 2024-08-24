@extends('admin.admin')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />

  <h2 class="text-center">EACA Absent Attendees</h2>

<table style="margin: auto; width: 100%;" id="example" class="ui celled table">


  <thead>
      <tr>
          <th>Id</th>
          <th>Attendee name</th>
          <th>Email</th>
          <th>Organization</th>
          <th>Country</th>
          <th>Status</th>
          <th>Action</th>
      </tr>
    </thead>

          <tbody>
              @foreach($absent_attendees as $attendee)
                  <tr>
                        <td>{{ $attendee->id }}</td>
                        <td>{{ $attendee->full_name }}</td>
                        <td>{{ $attendee->email }}</td>
                        <td>{{ $attendee->organization }}</td>
                        <td>{{ $attendee->country }}</td>
                        <td>
                             <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">
                                  absent
                             </span>
                        </td>

                        <td>Action</td>
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

        <th>Action</th>
      </tr>
  </tfoot>
</table>


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
