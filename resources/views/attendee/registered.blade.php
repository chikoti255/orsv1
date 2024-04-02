@extends('attendee.attendee')

@section('content')

  <style>
      .all {
        border-bottom: 1px solid #555d50;
        padding: 8px;
        font-family: sans-serif;
        line-height: 1.5em;

      }
      #last-check-in {
        color: #36454f;
        padding-left: 1.5em;
      }
      #email-organization {
        color: #5dbb63;
      }
      h3 {
        font-weight: bold;
      }
      #id-name {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1em;
      }
    @media (min-width: 714px) {
        .all {
          display: flex;
          justify-content: space-between;
          flex-direction: row;
        }

    }
  </style>

<div class="mt-4">
      @foreach($users as $user)
    <div class="all">
          <div id="id-name">
                  <div class="font-semibold">{{$user->id}}</div>
                  <div>
                    <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                        <p id="email-organization">{{$user->email}} / {{$user->organization}}</p>
                  </div>
          </div>
              <div>
                  <p id="last-check-in">Last check-in: {{$user->created_at->diffForHumans()}}
              </div>
    </div>
      @endforeach

</div>

@endsection
