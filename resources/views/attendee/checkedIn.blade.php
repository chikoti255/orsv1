@extends('admin.admin')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.semanticui.css" />

<table style="margin: auto; width: 100%;" id="example" class="ui celled table">


  <thead>
      <tr>
          <th>Id</th>
          <th>Attendee name</th>
          <th>Email</th>
          <th>Organization</th>
          <th>Country</th>
          <th>Status</th>
          <th>Checked-In date</th>
          <th>Action</th>
      </tr>
    </thead>

          <tbody>
              @foreach($scanned_attendees as $scanned_attendee)
                  <tr>
                        <td>{{ $scanned_attendee->id }}</td>
                        <td>{{ $scanned_attendee->attendee->full_name }}</td>
                        <td>{{ $scanned_attendee->attendee->email }}</td>
                        <td>{{ $scanned_attendee->attendee->organization }}</td>
                        <td>{{ $scanned_attendee->attendee->country }}</td>
                        <td>
                             <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                                  {{ $scanned_attendee->status }}
                             </span>
                        </td>
                        <td>
                            {{ $scanned_attendee->created_at->format('d M Y') }}
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
        <th>Register date</th>
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
