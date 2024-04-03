@extends('attendee.attendee')

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <style>
      .all {
        border-bottom: 1px solid #ddd;
        padding: 8px;
        font-family: sans-serif;
        line-height: 1.5em;
        background-color: #fff;
      }
      #last-check-in {
        color: #666;
        margin-top: 5px;
      }
      .all:nth-child(even) {
    background-color: #f8f8f8;  /* Alternate background color */
    }
      #email-organization {
        color: #3399cc;
      }
      h3 {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
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
    @media (max-width: 714px) {
      .all {
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
      }
    }

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}

  </style>

<div class="mt-4">
      @foreach($users as $user)
    <div class="all">
          <div id="id-name">
                  <span style="border: 1px solid black; padding: 6px; border-radius: 7px;" class="material-symbols-outlined">
                    person
                    </span>

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
