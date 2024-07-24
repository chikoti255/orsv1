<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!--===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" />
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>orsv1</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Orsv1</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="{{ route('admin.dashboard') }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>

                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="{{ route('attendee.registered') }}">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Registered</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-user-check"></i>
                    <span class="link-name">Checked-in</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-user-times"></i>
                    <span class="link-name">Absent</span>
                </a></li>
                <li><a href="{{ route('scanContainer') }}">
                    <i class="bi bi-qr-code-scan"></i>
                    <span class="link-name">Scanner</span>
                </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>


    <section class="dashboard">
          <div class="top">
              <i class="uil uil-bars sidebar-toggle"></i>

              <!--<div class="search-box">
                  <i class="uil uil-search"></i>
                  <input type="text" placeholder="Search here...">
              </div> -->

              <!--<img src="images/profile.jpg" alt="">-->
          </div>

          <div class="dash-content">
                  @yield('content')
          </div>
    </section>


    <script src="{{ asset('js/admin_dashboard.js') }}"></script>
</body>
</html>
