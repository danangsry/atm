@include('layout.header')

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/home">ATM Mini</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <a class="nav-link px-3 text-white" href="#" role="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/home">
                                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    Riwayat Transaksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/akun">
                                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    Informasi Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/trans">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                    Transaksi
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="logout();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
                <div class="card px-md-3 py-md-3" id="cardContain">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <input type="hidden" id="hdnUrl" value="{{url('')}}">
</body>

@include('layout.footer')

<script type="text/javascript">
    $(document).ready(function() {
        $('#cardContain').css('height', $(window).height() - 60);
        var akun = jQuery.parseJSON(localStorage.getItem('akun'));
        if (akun) {
            $('#nav').show();
        } else {
            window.location.href = $("#hdnUrl").val() + "/";
        }
    });

    function logout() {
        localStorage.removeItem("akun");
        window.location.href = $("#hdnUrl").val() + "/";
    }

    function GenerateAlert(msg) {
        var alert = " <div class='alert alert-danger' role='alert'>" + msg + "</div>";
        return alert;
    }
</script>
@stack('js')

</html>