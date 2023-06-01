@extends('layout.layout')

@section('content')
<h2>Informasi Akun</h2>
<div class="row mt-2 align-items-center g-2">
    <div class="col-lg-6 col-12">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="userId" class="form-label">User id</label>
                        <input type="text" class="form-control" id="userId">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="jml" class="form-label">Saldo</label>
                        <input type="text" class="form-control" id="jml" style="text-align: right;" onchange="onlyNumberAmount(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        GetInfo();
    });

    function GetInfo() {
        var akun = jQuery.parseJSON(localStorage.getItem('akun'));
        $.get($("#hdnUrl").val() + "/api/akun/" + akun.userid,
            function(res, status) {
                if (res.error === '') {
                    console.log(res.data);
                    $('#userId').val(res.data.userid);
                    $('#nama').val(res.data.nama);
                    $('#jml').val(res.data.saldo.substr(0, res.data.saldo.length - 3)).trigger('change');
                } else {
                    $('#alert').html(GenerateAlert(res.error));
                }
            });
    }

    function onlyNumberAmount(input) {
        let v = input.value.replace(/\D+/g, '');
        if (v.length > 14) v = v.slice(0, 14);
        input.value =
            v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }
</script>
@endpush