@include('layout.header')
<div class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="h3 mb-3 fw-normal">Please log in</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="userid" placeholder="User Id">
                    <label for="floatingInput">User Id</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="PIN">
                    <label for="floatingPassword">PIN</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="button" onclick="Login()">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="alert">
            </div>
        </div>
        <input type="hidden" id="hdnUrl" value="{{url('')}}">
    </main>
</div>
@include('layout.footer')

<script type="text/javascript">
    $(document).ready(function() {

    });

    function GenerateAlert(msg) {
        var alert = " <div class='alert alert-danger' role='alert'>" + msg + "</div>";
        return alert;
    }

    function Login() {
        var data = {};
        data.userid = $('#userid').val();
        data.password = $('#password').val();
        $.post($("#hdnUrl").val() + "/api/akun/login", data,
            function(res, status) {
                if (res.error === '') {
                    localStorage.setItem('akun', JSON.stringify(res.data));
                    window.location.href = $("#hdnUrl").val() + "/home";
                } else {
                    $('#alert').html(GenerateAlert(res.error));
                }
            });
    }
</script>