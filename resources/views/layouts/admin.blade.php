

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AmarPanel">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="{{ asset('dashboard') }}/img/icons/icon-48x48.png" />

	<link rel="canonical" href="index-2.html" />

	<title>{{ env('APP_NAME') }} || @yield('title')</title>

	<link href="{{ asset('dashboard') }}/css/app.css" rel="stylesheet">
	{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
	{{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet"> --}}
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script> --}}
	<!-- BEGIN SETTINGS -->
	<script src="{{ asset('dashboard') }}/js/settings.js"></script>
	<!-- END SETTINGS -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script> --}}
    {{-- <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
    </script> --}}
	<style>
		
		.side-box {
			background: #fff;
		display: flex;
		margin-bottom: 15px;
		border-radius: 10px;
		box-shadow: 1px 4px 2px -2px rgb(16 1 56 / 9%);
		padding: 20px 30px;
		flex-direction: column;
		justify-content: center;
		width: 100%;
	}
	.media-left, .media > .pull-left {
    padding-right: 10px;
}
.media-left, .media-right, .media-body {
    display: table-cell;
    vertical-align: top;
}
.side-box h4 {
    font-size: 18px;
    margin-bottom: 0;
    font-weight: 500;
}
.side-box h5 {
    font-size: 14px;
    font-weight: 300;
    margin-bottom: 0;
}
.triket_message {
            font-size: 16px;
        }

        .triket_button {
            width: 100%;
            float: left;
            color: #fff;
            border: none;
            padding: 15px 30px;
            background-color: #6fbf4c;
            border-radius: 4px;
            -moz-border-radius: 4px;
            font-weight: 600;
            font-size: 16px;
        }
	</style>
	@yield('style')
</head>

<body data-theme="default" data-layout="fluid" data-sidebar="left">
	<div class="wrapper">
        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
            
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('home') }}">
					<span class="align-middle">{{ env('APP_NAME') }}</span>
				</a>

				<ul class="sidebar-nav">

					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item @yield('home')">
						<a class="sidebar-link" href="{{ route('home') }}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
						</a>
						
					</li>
					<li class="sidebar-item @yield('admin_order')">
						<a class="sidebar-link" href="{{ route('order.control') }}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Order</span>
							<span class="sidebar-badge badge bg-primary">{{ total_order() }}</span>
							
						</a>
						
					</li>
					<li class="sidebar-item @yield('fund')">
						<a class="sidebar-link" href="{{ route('admin.customer.fund') }}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Fund</span>
							<span class="sidebar-badge badge bg-primary">{{ fund_pending_cound() }}</span>
						</a>
						
					</li>
					<li class="sidebar-item @yield('category')">
						<a class="sidebar-link" href="{{ route('category.index') }}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Category</span>
						</a>
					</li>
					<li class="sidebar-item @yield('service')">
						<a class="sidebar-link" href="{{ route('service.index') }}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Services</span>
						</a>
					</li>
					<li class="sidebar-item @yield('triket')">
						<a class="sidebar-link" href="{{ route('admin.triket') }}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Triket</span>
							<span class="sidebar-badge badge bg-primary">{{ all_triket_count() }}</span>
						</a>
					</li>

					<li class="sidebar-item  @yield('pagesetup')">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout align-middle"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg> <span class="align-middle">Page Setup</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('page.setup') }}">Welcome Page</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-projects.html">Projects <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-clients.html">Clients <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-pricing.html">Pricing <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-chat.html">Chat <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-blank.html">Blank Page</a></li>
						</ul>
					</li>
					

				</ul>

				
			</div>
		</nav>
        @endif

        @if (Auth::user()->role == 3)
            
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('customer') }}">
					<span class="align-middle">{{ env('APP_NAME') }}</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header slide">
						<div class="side-box">
							<div class="media">
							  <div class="media-left">
								<img class="media-object" src="{{  asset('dashboard/logo/order.png') }}">
							  </div>
							  <div class="media-body">
								<h4 class="media-heading">33036958</h4>
								<h5>Total Orders</h5>
							  </div>
							</div>
						</div>
						
					</li>
					<li class="sidebar-header pt-0">
						<div class="side-box">
							<div class="media">
							  <div class="media-left">
								<img class="media-object" src="{{ asset('dashboard/logo/dolllar.png') }}">
							  </div>
							  <div class="media-body">
								  @if (fund())
									  
								  <h4 class="media-heading"> ${{ fund()->fund }}</h4>
								  @else
								  <h4 class="media-heading"> $0</h4>
								  @endif
								<h5>Current Balance</h5>
							  </div>
							</div>
						</div>
						
					</li>
					<li class="sidebar-item @yield('home')">
						<a class="sidebar-link" href="{{ route('home') }}" style="color: #fff">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">New Order</span>
						</a>
						
					</li>
					<li class="sidebar-item @yield('order')">
						<a class="sidebar-link" href="{{ route('customer.order') }}" style="color: #fff">
							<i class="fa fa-dollar-sign" data-feather="dollar-sign"></i> <span class="align-middle">Orders History</span>
						</a>
						
					</li>
					<li class="sidebar-item @yield('add_fund')">
						<a class="sidebar-link" href="{{ route('customer.addfund') }}" style="color: #fff">
							<i class="fa fa-dollar-sign" data-feather="dollar-sign"></i> <span class="align-middle">Add Fund</span>
						</a>
						
					</li>
					<li class="sidebar-item @yield('triket')">
						<a class="sidebar-link" href="{{ route('customer.triket') }}" style="color: #fff">
							<i class="fa fa-dollar-sign" data-feather="dollar-sign"></i> <span class="align-middle">Tickets</span>
						</a>
						
					</li>

				</ul>

				
			</div>
		</nav>
        @endif

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">{{ all_triket_count() }}</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									{{ all_triket_count() }} New Notifications
								</div>
								<div class="list-group">
									@foreach (all_triket() as $item)
										
									<a href="{{ route('admin.triket_view',$item->id) }}" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('user_img/'.$item->user_name->img) }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
												
											</div>
											<div class="col-10">
												<div class="text-dark"> {{ $item->subject }}</div>
												<div class="text-muted small mt-1">{{ $item->user_name->name }}</div>
												<div class="text-muted small mt-1">{{ $item->created_at->diffForHumans() }}</div>
											</div>
										</div>
									</a>
									@endforeach
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{ route('admin.triket') }}" class="text-muted">Show all Message</a>
								</div>
							</div>
						</li>

                        @else
                        <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">{{ all_replay_count() }}</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									{{ all_replay_count() }} New Notifications
								</div>
								<div class="list-group">
									@foreach (all_replay_triket() as $item)
										
									<a href="{{ route('triket_view',$item->id) }}" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('user_img/'.$item->user_name->img) }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
												
											</div>
											<div class="col-10">
												<div class="text-dark">{{ $item->subject }}</div>
												{{-- <div class="text-muted small mt-1">{{ $item->user_name->name }}</div> --}}
												<div class="text-muted small mt-1">{{ $item->created_at->diffForHumans() }}</div>
											</div>
										</div>
									</a>
									@endforeach
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{ route('customer.triket') }}" class="text-muted">Show all Message</a>
								</div>
							</div>
						</li>
                        @endif
						
						
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								@if (Auth::user()->role == 1)
								<img src="{{ asset('user_img/'.Auth::user()->img) }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
								@else
								<img src="{{ asset('user_img/user_img.png') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />

								@endif
								 <span class="text-dark">{{ Auth::user()->name }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('account.setting') }}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
									Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item"href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

                    @yield('admin')

               </div>
            </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="index.html" class="text-muted"><strong>Amarpanel</strong></a> &copy; {{ date('Y') }}
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
{{-- @include('sweetalert::alert') --}}
<script src="{{ asset('dashboard') }}/js/app.js"></script>
<script src="{{ asset('dashboard') }}/js/datatables.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Datatables Responsive
		$("#datatables-reponsive").DataTable({
			responsive: true
		});
	});
</script>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var markers = [{
                coords: [31.230391, 121.473701],
                name: "Shanghai"
            },
            {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }
        ];
        var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    strokeWidth: 7,
                    stokeOpacity: .4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
            nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
        });
    });
</script>

<script>
	document.addEventListener("DOMContentLoaded", function(event) { 
	setTimeout(function(){
	if(localStorage.getItem('popState') !== 'shown'){
		window.notyf.open({
		type: "success",
		message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
		duration: 10000,
		ripple: true,
		dismissible: false,
		position: {
			x: "left",
			y: "bottom"
		}
		});

		localStorage.setItem('popState','shown');
	}
	}, 15000);
	});
</script> --}}

@yield('script')
</body>


<!-- Mirrored from demo.adminkit.io/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:08:26 GMT -->
</html>