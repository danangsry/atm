@extends('layout.layout')

@section('content')
<h2>Transaksi</h2>
<div class="row mt-2 align-items-center g-2">
    <div class="col-lg-6 col-12">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="mb-3">
                    <label for="trans" class="form-label">Jenis Transaksi</label>
                    <select class="form-select" name="" id="trans" onchange="TransChange()">
                        <option value="TT" selected>Tarik Tunai</option>
                        <option value="ST">Setor Tunai</option>
                        <option value="TR">Transfer</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-12" id="tujuan">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="toUserId" class="form-label">Akun Tujuan</label>
                        <input type="text" class="form-control" id="toUserId">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="jml" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jml" style="text-align: right;" onkeyup="onlyNumberAmount(this)" maxlength="18">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6 col-12">
                <input id="btnConfirm" class="btn btn-success" type="button" value="Konfirmasi" onclick="Transaksi()">
                <input id="btnCancel" class="btn btn-warning" type="button" value="Ulangi" onclick="Reset()">
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="alert">
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tujuan').hide();
        var akun = jQuery.parseJSON(localStorage.getItem('akun'));
        if (!akun) {
            window.location.href = $("#hdnUrl").val();
        }
    });

    function TransChange() {
        if ($('#trans').val() == "TR") {
            $('#tujuan').show();
        } else {
            $('#tujuan').hide();
        }
        $('#toUserId').val('');
        $('#jml').val('');
    }

    function onlyNumberAmount(input) {
        let v = input.value.replace(/\D+/g, '');
        if (v.length > 14) v = v.slice(0, 14);
        input.value =
            v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }

    function Reset() {
        $('#trans').val('TT').trigger('change');
        $('#toUserId').val('');
        $('#jml').val('');
        $('#alert').html('');
    }

    function Transaksi() {
        var akun = jQuery.parseJSON(localStorage.getItem('akun'));
        var data = {};
        data.tipe = $('#trans').val();

        data.from = {};
        data.from.userid = akun.userid;
        data.from.jml = (Number($('#jml').val().replace(/[^0-9,-]+/g, "")) * -1);
        if (data.tipe == "ST") {
            data.from.jml *= -1;
        }

        data.to = {};
        data.to.userid = $('#toUserId').val();
        data.to.jml = Number($('#jml').val().replace(/[^0-9,-]+/g, ""));

        if (data.from.userid.toUpperCase() == data.to.userid.toUpperCase()) {
            $('#alert').html(GenerateAlert("Anda tidak dapat transfer ke akun anda sendiri."));
        } else {
            $.post($("#hdnUrl").val() + "/api/trans/transaksi", data,
                function(res, status) {
                    console.log(res, status);
                    if (res.error !== '') {
                        $('#alert').html(GenerateAlert(res.error));
                    } else {
                        alert(res.msg);
                        Reset();
                    }
                });
        }
    }
</script>
@endpush