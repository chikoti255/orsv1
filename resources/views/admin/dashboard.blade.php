@extends('admin.admin')


@section('content')
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" />
<script src="{{ asset('js/admin_dashboard.js') }}"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>



<div class="overview">
    <div class="title">
        <i class="uil uil-tachometer-fast-alt"></i>
        <span class="text">Dashboard</span>
    </div>

    <div class="boxes">
        <div class="box box1">
                <div class="lord-icon">
                    <lord-icon
                        src="https://cdn.lordicon.com/bgebyztw.json"

                        trigger="loop">
                    </lord-icon>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center;">
                      <span class="text">Registered</span>
                      <span class="number">{{ $registered_attendee }}</span>
                </div>
        </div>
        <div class="box box2">
                <div class="lord-icon">
                  <lord-icon
                    src="https://cdn.lordicon.com/cgzlioyf.json"
                    trigger="loop"
                    >
                  </lord-icon>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center;">
                      <span class="text">Checked-in</span>
                      <span class="number">{{ $checked_in_attendee }}</span>
                </div>
        </div>
        <div class="box box3">
                <div class="lord-icon">
                  <lord-icon
                      src="https://cdn.lordicon.com/usownftb.json"
                      trigger="loop"
                      >
                      </lord-icon>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center;">
                      <span class="text">Absent</span>
                      <span class="number">{{ $absent_attendee }}</span>
                </div>
        </div>
    </div>
</div>

<div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Recent Activity</span>
    </div>

    <div class="activity-data">
        <div class="data names">
            <span class="data-title">Name</span>
            <span class="data-list">Prem Shahi</span>
            <span class="data-list">Deepa Chand</span>
            <span class="data-list">Manisha Chand</span>
            <span class="data-list">Pratima Shahi</span>
            <span class="data-list">Man Shahi</span>
            <span class="data-list">Ganesh Chand</span>
            <span class="data-list">Bikash Chand</span>
        </div>
        <div class="data email">
            <span class="data-title">Email</span>
            <span class="data-list">premshahi@gmail.com</span>
            <span class="data-list">deepachand@gmail.com</span>
            <span class="data-list">prakashhai@gmail.com</span>
            <span class="data-list">manishachand@gmail.com</span>
            <span class="data-list">pratimashhai@gmail.com</span>
            <span class="data-list">manshahi@gmail.com</span>
            <span class="data-list">ganeshchand@gmail.com</span>
        </div>
        <div class="data joined">
            <span class="data-title">Joined</span>
            <span class="data-list">2022-02-12</span>
            <span class="data-list">2022-02-12</span>
            <span class="data-list">2022-02-13</span>
            <span class="data-list">2022-02-13</span>
            <span class="data-list">2022-02-14</span>
            <span class="data-list">2022-02-14</span>
            <span class="data-list">2022-02-15</span>
        </div>
        <div class="data type">
            <span class="data-title">Type</span>
            <span class="data-list">New</span>
            <span class="data-list">Member</span>
            <span class="data-list">Member</span>
            <span class="data-list">New</span>
            <span class="data-list">Member</span>
            <span class="data-list">New</span>
            <span class="data-list">Member</span>
        </div>
        <div class="data status">
            <span class="data-title">Status</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
            <span class="data-list">Liked</span>
        </div>
    </div>
</div>



@endsection
