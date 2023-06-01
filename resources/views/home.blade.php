@extends('layout.layout')
@section('content')

<h2>Riwayat Transaksi</h2>
<div class="table-responsive small overflow-auto">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Transaksi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>
            </tr>
        </thead>
        <tbody id="listTrans"></tbody>
    </table>
</div>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        GetListTrans();
    });

    function GetListTrans() {
        var akun = jQuery.parseJSON(localStorage.getItem('akun'));
        $.get($("#hdnUrl").val() + "/api/trans/" + akun.userid,
            function(res, status) {
                if (res.error === '') {
                    if (res.data) {
                        var htmlItem = "";
                        res.data.forEach(item => {
                            var tr = "";
                            var min = "";
                            if (item.tipe == "TT") {
                                tr = "Tarik Tunai";
                                min = "-";
                            } else if (item.tipe == "TR") {
                                if (Number(item.jml) < 0) {
                                    tr = "Debet";
                                    min = "-";
                                } else {
                                    tr = "Kredit";
                                }
                            } else {
                                tr = "Setor Tunai";
                            }

                            htmlItem += "<tr>";
                            htmlItem += "<td>" + tr + "</td>";
                            htmlItem += "<td>Rp. " + min + FormatNumber(item.jml.substr(0, item.jml.length - 3)) + "</td>";
                            htmlItem += "<td>" + FormatDate(item.created_at) + "</td>";
                            htmlItem += "<td>" + item.created_at.substr(11, 8) + "</td>";
                            htmlItem += "</tr>\n";
                        });

                        $('#listTrans').html(htmlItem);
                    }
                } else {
                    $('#alert').html(GenerateAlert(res.error));
                }
            });
    }

    function FormatNumber(number) {
        var res = "0";
        let v = number.replace(/\D+/g, '');
        if (v.length > 14) v = v.slice(0, 14);
        res = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
        return res;
    }

    function FormatDate(date) {
        var res = date.substr(8, 2) + "/" + date.substr(5, 2) + "/" + date.substr(0, 4);
        return res;
    }
</script>
@endpush