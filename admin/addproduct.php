<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="shortcut icon" type="image/png" href="#">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-slider.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
  </head>
  <body>
    <div class="overlay-background"></div>

    <div class="theme-setting-wrapper">
        <button type="button" id="settings-trigger" class="btn btn-primary waves-effect waves-primary">
			<i class="la la-cog"></i>
		</button>
        <div class="theme-setting-sidebar">
            <div class="h-100">
                <div class="mt-4 d-flex align-items-center flex-wrap px-4">
                    <h4 class="font-weight-bold">THEME CUSTOMIZER</h4>
                    <small>Customize &amp; Preview in Real Time</small>
                </div>
                <hr>
                <div class="theme-setting-sidebar-scroll">
                    <div class="px-4">
                        <div>
                            <h5 class="mb-2">Modes</h5>
                            <div class="d-flex align-items-center">
                                <div class="radio theme-radio mr-4">
                                    <input type="radio" id="light" name="light" value="theme-light">
                                    <label for="light">Light</label>
                                </div>
                                <div class="radio theme-radio mr-4">
                                    <input type="radio" id="dark" name="light" value="theme-dark">
                                    <label for="dark">Dark</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>



    <header class="header fixed-top d-flex align-items-center">
        <!-- ########## START: HEAD PANEL ########## -->
        <a href="index.php"><img src="assets/image/logo.png" alt="MS Admin Panel" width="80" /></a>
        <div class="br-header d-flex w-100">

            <div class="br-header-left">
                <a href="javascript:;" class="searchbar-toggle la la-search d-flex d-md-none"></a>
                <form class="searchbar d-flex align-items-center pl-3">
                    <i class="la la-search"></i>
                    <input class="form-control border-0 pl-2" type="search" placeholder="Search...">
                </form>

            </div>
            <!-- br-header-left -->
            <div class="br-header-right ml-auto">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link position-relative dropdown-toggle waves-effect waves-primary" id="dropdownMSG" data-toggle="dropdown">
                            <i class="la la-envelope-o"></i>
                            <span class="badge badge-accent">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header py-0" aria-labelledby="dropdownMSG">
                            <div class="dropdown-menu-label">
                                <label class="mb-0">Messages</label>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-primary">View
                                        all</button>
                            </div>
                            <!-- d-flex -->
                            <div class="dropdown-divider my-0"></div>
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link position-relative dropdown-toggle waves-effect waves-primary" id="dropdownNOTY" data-toggle="dropdown">
                            <i class="la la-bell"></i>
                            <span class="badge badge-accent ">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header py-0" aria-labelledby="dropdownNOTY">
                            <div class="dropdown-menu-label">
                                <label class="mb-0">NOTIFICATIONS </label>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">View
                                        all</button>
                            </div>
                            <!-- d-flex -->
                            <div class="dropdown-divider my-0"></div>
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Donna Seay</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of </p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Jaymin Modi</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Zahir Patel</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link-profile d-flex dropdown-toggle" data-toggle="dropdown" id="dropdownprofile">
                            <img src="assets/image/img3.jpg" class="rounded" alt="" width="50">
                            <span class="logged-name px-3">Zahir Patel <br><small class="pt-3">Founder</small></span>
                            <i class="profile-dropdown la la-caret-square-o-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header dropdown-menu-user" aria-labelledby="dropdownprofile">
                            <div class="text-center">
                                <a href=""><img src="assets/image/img3.jpg" width="80" class="rounded-circle" alt=""></a>
                                <h6 class="logged-fullname font-weight-bold mt-2">Zahir Patel</h6>
                                <p class="my-0">youremail@domain.com</p>
                            </div>
                            <hr>
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-user"></i>
                                            Edit Profile</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-cog"></i>
                                            Settings</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i
                                                class="la la-download"></i> Downloads</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i
                                                class="la la-star-o"></i> Favorites</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-file"></i>
                                            Collections</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i
                                                class="la la-power-off"></i> Sign Out</a></li>
                            </ul>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                </nav>
            </div>
            <!-- br-header-right -->
        </div>
        <!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->

    </header>
    <section style="padding-top:120px;" class="container">
      <div class="input-center">
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Name">
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Price">
          <textarea class="form-control border-light" rows="3" spellcheck="true" placeholder="Description"></textarea>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
            </button>
            <div id="dropdown-menucat" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" href="#">Electronics</a>
              <a class="dropdown-item" href="#">Clothing</a>
              <a class="dropdown-item" href="#">Mobiles</a>
            </div>
          </div><br><br>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                SubCategory
            </button>
            <div id="dropdown-menusubcat"  class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <a class="dropdown-item" href="#">Smartwatch</a>
              <a class="dropdown-item" href="#">Refrigerator</a>
              <a class="dropdown-item" href="#">Tv</a>
            </div>
          </div><br><br>
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Units">
          <input type="file" class="form-control bg-secondary input-h-42" placeholder="Image">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Status
            </button>
            <div id="dropdown-menustat" class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
              <a class="dropdown-item" href="#">In stock</a>
              <a class="dropdown-item" href="#">Pending</a>
              <a class="dropdown-item" href="#">Disabled</a>
            </div>
          </div><br><br>
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Size">
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Colour">
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Discount">
          <input type="text" class="form-control bg-secondary input-h-42" placeholder="Location">
          <div class="button-flex">
            <button type="button" class="btn btn-success waves-effect waves-green">Add</button>
            <button type="button" class="btn btn-danger waves-effect waves-red">Cancel</button>
          </div><br><br>
    </section>


    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/popper.min.js"></script>
    <script src="assets/scripts/bootstrap-slider.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <script src="assets/scripts/bootstrap.bundle.min.js"></script>
    <script src="assets/scripts/bootstrap-select.min.js"></script>
    <script src="assets/scripts/bootstrap-tooltip-custom-class.js"></script>
    <script src="assets/scripts/jquery.mCustomScrollbar.js"></script>
    <script src="assets/scripts/datatables.min.js"></script>
    <script src="assets/scripts/ripple.min.js"></script>
    <script src="assets/scripts/custome.js"></script>
  </body>
</html>