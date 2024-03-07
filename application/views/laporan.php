<div class="properties-area" style="padding: 30px 10px 17px;">
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert" id="warning-ekspor" style="display: none">
                        <i class="fa fa-warning" style="padding-right: 5px;font-size: 20px;vertical-align: middle;"></i> <span id="text-warning"></span>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group btn-group-info">
                            <button class="btn btn-default btn-aksi-footer btn-ekspor" onclick="konfirmasiEkspor('semua')" style="width: 195px;padding: 8px 17px;"><strong><i class="fa fa-upload"></i> EKSPOR SEMUA DATA</strong></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 15px;">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rincian-bahan">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rincian-bahan" aria-expanded="false" aria-controls="rincian-bahan">
                                        Rincian Bahan
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rincian-bahan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rincian-bahan">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rincian-bahan_processing {
                                            top: 56%;
                                            left: 54%;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rincian-bahan" style="width: 138px;" onclick="konfirmasiEkspor('rincian_bahan')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rincian-bahan"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rincian-bahan" width="100%" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th>Kategori</th>
                                                <th>ID</th>
                                                <th width="25%">Uraian Bahan</th>
                                                <th width="7%">Satuan</th>
                                                <th width="12%">Harga Dasar</th>
                                                <th width="11%">Merk</th>
                                                <th width="16%">Spesifikasi</th>
                                                <th>Sumber</th>
                                                <th width="16%">Sumber</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <script>
                                        function reloadRincianBahan() {
                                            tabel_rincian_bahan.ajax.reload();
                                        }

                                        var tabel_rincian_bahan;

                                        function loadTabelRincianBahan() {
                                            tabel_rincian_bahan = $("#tabel-rincian-bahan").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRincianBahan",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                        data.pengguna = id_pengguna;
                                                    }
                                                },
                                                "columnDefs": [{
                                                        "targets": [1, 2, 8],
                                                        "visible": false,
                                                        "searchable": false
                                                    },
                                                    {
                                                        "targets": [0, 10],
                                                        "searchable": false,
                                                        "orderable": false
                                                    }
                                                ],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [3, 'asc'],
                                                    [4, 'asc'],
                                                    [6, 'asc'],
                                                    [7, 'asc'],
                                                    [9, 'asc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);

                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(2),td:eq(7)', row).prop("align", "center");
                                                    $('td:eq(3)', row).prop("align", "right").css("padding-right", "12px");
                                                    if (data[4] == "%" && data[5] == "Rp 0,00") $('td:eq(3)', row).html('');
                                                    if (data[4] != "%" && data[5] == "Rp 0,00")
                                                        if ($('#btn-ekspor-rincian-bahan').prop('disabled', false)) $('#btn-ekspor-rincian-bahan').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rincian-bahan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rincian-bahan.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rincian-bahan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });

                                            $('#tabel-rincian-bahan tbody').on('dblclick', 'td', function() {
                                                var data = tabel_rincian_bahan.row(this).data();
                                                var rowIndex = $(this).parent().index();

                                                $('#tabel-rincian-bahan tbody tr').eq(rowIndex).find('#ubah_rincian').click();
                                            });

                                            //lihat produk
                                            $('#tabel-rincian-bahan tbody').on('click', 'td .lihat_produk', function() {
                                                var data = tabel_rincian_bahan.row($(this).parents('tr')).data();
                                                $('#ModalLihatProduk').on('shown.bs.modal', function(e) {
                                                    $('.flexbox').css('overflow-y', 'hidden');

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "https://estimator.id/server/api/getProdukByIDBahan",
                                                        data: {
                                                            'id_bahan': data[2],
                                                            'nama_produk': data[3],
                                                            'spesifikasi': data[7]
                                                        },
                                                        dataType: "JSON",
                                                        success: function(resp) {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "https://estimator.id/server/api/getFotoProduk/" + resp.id_produk,
                                                                dataType: "JSON",
                                                                success: function(resp_foto) {
                                                                    var list_foto = [];
                                                                    if (resp_foto != '') {
                                                                        for (var i = 0; i < resp_foto.length; i++) {
                                                                            list_foto.push("https://estimator.id/assets/foto/produk/" + resp_foto[i].foto);
                                                                        }
                                                                    } else list_foto.push("https://estimator.id/assets/foto/produk/" + resp.foto);

                                                                    var options = {
                                                                        // thumbLeft:true,
                                                                        // thumbRight:true,
                                                                        // thumbHide:true,
                                                                        width: 345,
                                                                        height: 270,
                                                                    };

                                                                    $('#lihat_foto_produk').zoomy(list_foto, options);
                                                                },
                                                                error: function(jqXHR, textStatus, errorThrown) {
                                                                    toastr.error('Terjadi masalah saat pengambilan data.', 'Kesalahan', opsi_toastr);
                                                                }
                                                            });

                                                            $.ajax({
                                                                type: 'get',
                                                                url: "https://estimator.id/server/api/getWilayahKriteria/id_wilayah/" + wilayah,
                                                                dataType: "JSON",
                                                                success: function(resp_wilayah) {
                                                                    $('#lihat_wilayah').html(resp_wilayah[0].wilayah);
                                                                }
                                                            });

                                                            $('#lihat_nama_produk').html(resp.nama_produk);
                                                            $('#lihat_harga').html('Rp' + number_format(resp.harga_dasar, 0, ',', '.'));
                                                            $('#lihat_deskripsi').html(resp.deskripsi);
                                                            $('#lihat_merk').html(resp.merk);
                                                            $('#lihat_spesifikasi').html(resp.spesifikasi);
                                                            $('#lihat_satuan').html(' / ' + resp.satuan);
                                                            $('#lihat_tgl_update').html('Update: ' + resp.tgl_update);
                                                            $('#lihat_logo_suplier').prop('src', 'https://estimator.id/assets/foto/pengguna/' + resp.foto_suplier);
                                                            $('#lihat_nama_suplier').html(resp.nama_suplier);
                                                            $('#lihat_profil_suplier').html(resp.profil);
                                                            $('#btn-pilih-produk').hide();
                                                            $('#btn-tutup-lihat-produk').css('border-radius', '25px');
                                                        },
                                                        error: function(jqXHR, textStatus, errorThrown) {
                                                            toastr.error('Terjadi masalah saat pengambilan data.', 'Kesalahan', opsi_toastr);
                                                        }
                                                    });

                                                    $(this).off('shown.bs.modal');
                                                }).modal('show');
                                            });

                                            //ubah rincian
                                            $('#tabel-rincian-bahan tbody').on('click', 'td .ubah_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_bahan.row(tr);
                                                var data = row.data();

                                                row.child(formatUbahRincian(data)).show();
                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);

                                                $('#ubah-rincian-harga_dasar').inputmask('decimal', {
                                                    'alias': 'numeric',
                                                    'groupSeparator': '.',
                                                    'autoGroup': true,
                                                    'digits': 2,
                                                    'radixPoint': ",",
                                                    'digitsOptional': false,
                                                    'allowMinus': false,
                                                    'prefix': 'Rp ',
                                                    'placeholder': '0',
                                                    'rightAlign': true,
                                                    'autoUnmask': true,
                                                    onUnMask: function(maskedValue, unmaskedValue, opts) {
                                                        if (unmaskedValue === "" && opts.nullable === true) {
                                                            return unmaskedValue;
                                                        }
                                                        var processValue = maskedValue.replace(opts.prefix, "");
                                                        processValue = processValue.replace(opts.suffix, "");
                                                        processValue = processValue.replace(new RegExp(Inputmask.escapeRegex(opts.groupSeparator), "g"), "");
                                                        if (opts.radixPoint !== "" && processValue.indexOf(opts.radixPoint) !== -1)
                                                            processValue = processValue.replace(Inputmask.escapeRegex.call(this, opts.radixPoint), ".");

                                                        return processValue;
                                                    }
                                                });

                                                if (data[4] != '%') $('#ubah-rincian-harga_dasar').prop("readonly", false);
                                                else $('#ubah-rincian-harga_dasar').prop("readonly", true);
                                                if (data[8] != '0') $('#ubah-rincian-keterangan').prop("readonly", true);
                                                else $('#ubah-rincian-keterangan').prop("readonly", false);
                                                ubah_rincian = 0;

                                                $('[id^=warning_ubah-rincian]').remove();
                                                $('[id^=col_ubah-rincian]').removeClass('has-error');
                                            });

                                            //alokasi rincian
                                            $('#tabel-rincian-bahan tbody').on('click', 'td .alokasi_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_bahan.row(tr);
                                                var data = row.data();

                                                $.ajax({
                                                    type: "POST",
                                                    url: "https://estimator.id/server/api/getListPekerjaanByBUA",
                                                    data: {
                                                        'id_proyek': id_proyek,
                                                        'nama_bua': data[3],
                                                        'satuan': data[4],
                                                        'spesifikasi': data[7],
                                                        'merk': data[6]
                                                    },
                                                    dataType: "JSON",
                                                    success: function(data) {
                                                        if (data != '') {
                                                            row.child(formatAlokasiRincian(data)).show();
                                                        } else {
                                                            row.child("<center><img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span></center>").show();
                                                        }
                                                    }
                                                });

                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);
                                            });
                                        }

                                        $('#reload-rincian-bahan').on('click', function() {
                                            if (typeof tabel_rincian_bahan == 'undefined') loadTabelRincianBahan();
                                            else reloadRincianBahan();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rincian-upah">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rincian-upah" aria-expanded="false" aria-controls="rincian-upah">
                                        Rincian Upah
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rincian-upah" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rincian-upah">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rincian-upah_processing {
                                            top: 56%;
                                            left: 54%;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rincian-upah" style="width: 138px;" onclick="konfirmasiEkspor('rincian_upah')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rincian-upah"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rincian-upah" width="100%" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <!-- <th width="3%">No.</th>
            <th>Kategori</th>
            <th>ID</th>
            <th width="27%">Uraian Bahan</th>
            <th width="7%">Satuan</th>
            <th width="12%">Harga Dasar</th>
            <th width="12%">Merk</th>
            <th width="17%">Spesifikasi</th>
            <th>Sumber</th>
            <th width="17%">Sumber</th>
            <th width="5%">Aksi</th> -->

                                                <th width="3%">No.</th>
                                                <th>Kategori</th>
                                                <th>ID</th>
                                                <th width="25%">Uraian Upah</th>
                                                <th width="7%">Satuan</th>
                                                <th width="12%">Harga Dasar</th>
                                                <th width="11%">Merk</th>
                                                <th width="16%">Spesifikasi</th>
                                                <th>Sumber</th>
                                                <th width="16%">Sumber</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <script>
                                        function reloadRincianUpah() {
                                            tabel_rincian_upah.ajax.reload();
                                        }

                                        var tabel_rincian_upah;

                                        function loadTabelRincianUpah() {
                                            tabel_rincian_upah = $("#tabel-rincian-upah").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRincianUpah",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                        data.pengguna = id_pengguna;
                                                    }
                                                },
                                                "columnDefs": [{
                                                        "targets": [1, 2, 8],
                                                        "visible": false,
                                                        "searchable": false
                                                    },
                                                    {
                                                        "targets": [0, 10],
                                                        "searchable": false,
                                                        "orderable": false
                                                    }
                                                ],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [3, 'asc'],
                                                    [4, 'asc'],
                                                    [6, 'asc'],
                                                    [7, 'asc'],
                                                    [9, 'asc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);

                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(2),td:eq(7)', row).prop("align", "center");
                                                    $('td:eq(3)', row).prop("align", "right").css("padding-right", "12px");
                                                    if (data[4] != "%" && data[5] == "Rp 0,00")
                                                        if ($('#btn-ekspor-rincian-upah').prop('disabled', false)) $('#btn-ekspor-rincian-upah').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rincian-upah_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rincian-upah.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rincian-upah_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });

                                            $('#tabel-rincian-upah tbody').on('dblclick', 'td', function() {
                                                var data = tabel_rincian_upah.row(this).data();
                                                var rowIndex = $(this).parent().index();

                                                $('#tabel-rincian-upah tbody tr').eq(rowIndex).find('#ubah_rincian').click();
                                            });

                                            //ubah rincian
                                            $('#tabel-rincian-upah tbody').on('click', 'td .ubah_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_upah.row(tr);
                                                var data = row.data();

                                                row.child(formatUbahRincian(data)).show();
                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);

                                                $('#ubah-rincian-harga_dasar').inputmask('decimal', {
                                                    'alias': 'numeric',
                                                    'groupSeparator': '.',
                                                    'autoGroup': true,
                                                    'digits': 2,
                                                    'radixPoint': ",",
                                                    'digitsOptional': false,
                                                    'allowMinus': false,
                                                    'prefix': 'Rp ',
                                                    'placeholder': '0',
                                                    'rightAlign': true,
                                                    'autoUnmask': true,
                                                    onUnMask: function(maskedValue, unmaskedValue, opts) {
                                                        if (unmaskedValue === "" && opts.nullable === true) {
                                                            return unmaskedValue;
                                                        }
                                                        var processValue = maskedValue.replace(opts.prefix, "");
                                                        processValue = processValue.replace(opts.suffix, "");
                                                        processValue = processValue.replace(new RegExp(Inputmask.escapeRegex(opts.groupSeparator), "g"), "");
                                                        if (opts.radixPoint !== "" && processValue.indexOf(opts.radixPoint) !== -1)
                                                            processValue = processValue.replace(Inputmask.escapeRegex.call(this, opts.radixPoint), ".");

                                                        return processValue;
                                                    }
                                                });

                                                if (data[4] != '%') $('#ubah-rincian-harga_dasar').prop("readonly", false);
                                                else $('#ubah-rincian-harga_dasar').prop("readonly", true);
                                                if (data[8] != '0') $('#ubah-rincian-keterangan').prop("readonly", true);
                                                else $('#ubah-rincian-keterangan').prop("readonly", false);
                                                ubah_rincian = 0;

                                                $('[id^=warning_ubah-rincian]').remove();
                                                $('[id^=col_ubah-rincian]').removeClass('has-error');
                                            });

                                            //alokasi rincian
                                            $('#tabel-rincian-upah tbody').on('click', 'td .alokasi_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_upah.row(tr);
                                                var data = row.data();

                                                $.ajax({
                                                    type: "POST",
                                                    url: "https://estimator.id/server/api/getListPekerjaanByBUA",
                                                    data: {
                                                        'id_proyek': id_proyek,
                                                        'nama_bua': data[3],
                                                        'satuan': data[4],
                                                        'spesifikasi': data[7],
                                                        'merk': data[6]
                                                    },
                                                    dataType: "JSON",
                                                    success: function(data) {
                                                        if (data != '') {
                                                            row.child(formatAlokasiRincian(data)).show();
                                                        } else {
                                                            row.child("<center><img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span></center>").show();
                                                        }
                                                    }
                                                });

                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);
                                            });
                                        }

                                        $('#reload-rincian-upah').on('click', function() {
                                            if (typeof tabel_rincian_upah == 'undefined') loadTabelRincianUpah();
                                            else reloadRincianUpah();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rincian-alat">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rincian-alat" aria-expanded="false" aria-controls="rincian-alat">
                                        Rincian Alat
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rincian-alat" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rincian-alat">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rincian-alat_processing {
                                            top: 56%;
                                            left: 54%;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rincian-alat" style="width: 138px;" onclick="konfirmasiEkspor('rincian_alat')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rincian-alat"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rincian-alat" width="100%" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th>Kategori</th>
                                                <th>ID</th>
                                                <th width="25%">Uraian Alat</th>
                                                <th width="7%">Satuan</th>
                                                <th width="12%">Harga Dasar</th>
                                                <th width="11%">Merk</th>
                                                <th width="16%">Spesifikasi</th>
                                                <th>Sumber</th>
                                                <th width="16%">Sumber</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <script>
                                        function reloadRincianAlat() {
                                            tabel_rincian_alat.ajax.reload();
                                        }

                                        var tabel_rincian_alat;

                                        function loadTabelRincianAlat() {
                                            tabel_rincian_alat = $("#tabel-rincian-alat").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRincianAlat",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                        data.pengguna = id_pengguna;
                                                    }
                                                },
                                                "columnDefs": [{
                                                        "targets": [1, 2, 8],
                                                        "visible": false,
                                                        "searchable": false
                                                    },
                                                    {
                                                        "targets": [0, 10],
                                                        "searchable": false,
                                                        "orderable": false
                                                    }
                                                ],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [3, 'asc'],
                                                    [4, 'asc'],
                                                    [6, 'asc'],
                                                    [7, 'asc'],
                                                    [9, 'asc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);

                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(2),td:eq(7)', row).prop("align", "center");
                                                    $('td:eq(3)', row).prop("align", "right").css("padding-right", "12px");
                                                    if (data[4] == "%" && data[5] == "Rp 0,00") $('td:eq(3)', row).html('');
                                                    if ((data[4] != "%" && data[5] == "Rp 0,00") || data == null)
                                                        if ($('#btn-ekspor-rincian-alat').prop('disabled', false)) $('#btn-ekspor-rincian-alat').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rincian-alat_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rincian-alat.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rincian-alat_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });

                                            $('#tabel-rincian-alat tbody').on('dblclick', 'td', function() {
                                                var data = tabel_rincian_alat.row(this).data();
                                                var rowIndex = $(this).parent().index();

                                                $('#tabel-rincian-alat tbody tr').eq(rowIndex).find('#ubah_rincian').click();
                                            });

                                            //ubah rincian
                                            $('#tabel-rincian-alat tbody').on('click', 'td .ubah_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_alat.row(tr);
                                                var data = row.data();

                                                row.child(formatUbahRincian(data)).show();
                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);

                                                $('#ubah-rincian-harga_dasar').inputmask('decimal', {
                                                    'alias': 'numeric',
                                                    'groupSeparator': '.',
                                                    'autoGroup': true,
                                                    'digits': 2,
                                                    'radixPoint': ",",
                                                    'digitsOptional': false,
                                                    'allowMinus': false,
                                                    'prefix': 'Rp ',
                                                    'placeholder': '0',
                                                    'rightAlign': true,
                                                    'autoUnmask': true,
                                                    onUnMask: function(maskedValue, unmaskedValue, opts) {
                                                        if (unmaskedValue === "" && opts.nullable === true) {
                                                            return unmaskedValue;
                                                        }
                                                        var processValue = maskedValue.replace(opts.prefix, "");
                                                        processValue = processValue.replace(opts.suffix, "");
                                                        processValue = processValue.replace(new RegExp(Inputmask.escapeRegex(opts.groupSeparator), "g"), "");
                                                        if (opts.radixPoint !== "" && processValue.indexOf(opts.radixPoint) !== -1)
                                                            processValue = processValue.replace(Inputmask.escapeRegex.call(this, opts.radixPoint), ".");

                                                        return processValue;
                                                    }
                                                });

                                                if (data[4] != '%') $('#ubah-rincian-harga_dasar').prop("readonly", false);
                                                else $('#ubah-rincian-harga_dasar').prop("readonly", true);
                                                if (data[8] != '0') $('#ubah-rincian-keterangan').prop("readonly", true);
                                                else $('#ubah-rincian-keterangan').prop("readonly", false);
                                                ubah_rincian = 0;

                                                $('[id^=warning_ubah-rincian]').remove();
                                                $('[id^=col_ubah-rincian]').removeClass('has-error');
                                            });

                                            //alokasi rincian
                                            $('#tabel-rincian-alat tbody').on('click', 'td .alokasi_rincian', function() {
                                                tr = $(this).closest('tr');
                                                row = tabel_rincian_alat.row(tr);
                                                var data = row.data();

                                                $.ajax({
                                                    type: "POST",
                                                    url: "https://estimator.id/server/api/getListPekerjaanByBUA",
                                                    data: {
                                                        'id_proyek': id_proyek,
                                                        'nama_bua': data[3],
                                                        'satuan': data[4],
                                                        'spesifikasi': data[7],
                                                        'merk': data[6]
                                                    },
                                                    dataType: "JSON",
                                                    success: function(data) {
                                                        if (data != '') {
                                                            row.child(formatAlokasiRincian(data)).show();
                                                        } else {
                                                            row.child("<center><img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span></center>").show();
                                                        }
                                                    }
                                                });

                                                tr.addClass('shown');
                                                $('.ubah_rincian,.alokasi_rincian').prop("disabled", true);
                                            });
                                        }

                                        $('#reload-rincian-alat').on('click', function() {
                                            if (typeof tabel_rincian_alat == 'undefined') loadTabelRincianAlat();
                                            else reloadRincianAlat();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="harga-satuan">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-harga-satuan" aria-expanded="false" aria-controls="rekap-harga-satuan">
                                        Rincian Harga Satuan
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-harga-satuan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="harga-satuan">
                                <div class="panel-body">
                                    <style>
                                        .table-rincian-ahs {
                                            border-collapse: separate;
                                            padding-left: 67px;
                                            padding-right: 67px;
                                        }

                                        #tabel-rekap-harga-satuan_processing {
                                            top: 56%;
                                            left: 54%;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-ahs" style="width: 138px;" onclick="konfirmasiEkspor('ahs')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-harga-satuan"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-harga-satuan" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th width="33%">Uraian Pekerjaan</th>
                                                <th width="2%">Satuan</th>
                                                <th width="12%">Bahan</th>
                                                <th width="12%">Upah</th>
                                                <th width="12%">Alat</th>
                                                <th width="14%">Harga Satuan</th>
                                                <th width="9%">Sumber</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <script>
                                        function number_format(number, decimals, dec_point, thousands_point) {
                                            if (number == null || !isFinite(number)) {
                                                throw new TypeError("number is not valid");
                                            }

                                            if (!decimals) {
                                                var len = number.toString().split('.').length;
                                                decimals = len > 1 ? len : 0;
                                            }

                                            if (!dec_point) {
                                                dec_point = '.';
                                            }

                                            if (!thousands_point) {
                                                thousands_point = ',';
                                            }

                                            number = parseFloat(number).toFixed(decimals);

                                            number = number.replace(".", dec_point);

                                            var splitNum = number.split(dec_point);
                                            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                                            number = splitNum.join(dec_point);

                                            return number;
                                        }

                                        function formatAHS(data) {
                                            var urut, nama_kategori, koefisien, harga_dasar, harga_satuan, urut_rincian_kategori, align;
                                            var rincian_ahs = '';
                                            rincian_ahs =
                                                '<table width="100%" id="tabel-ahs" class="table table-striped table-advance table-rincian-ahs">' +
                                                '<thead>' +
                                                '<tr>' +
                                                '<th width="3%">No.</th>' +
                                                '<th width="55%">Uraian Kategori</th>' +
                                                '<th width="9%">Koefisien</th>' +
                                                '<th width="3%">Satuan</th>' +
                                                '<th width="15%">Harga Dasar</th>' +
                                                '<th width="15%">Harga Satuan</th>' +
                                                '</tr>' +
                                                '</thead>' +
                                                '<tbody>';
                                            $.each(data, function(i, val) {
                                                if (val.id_kategori == "H") {
                                                    urut_rincian_kategori = 0;
                                                    urut = "<strong>" + val.level + "</strong>";
                                                    nama_kategori = "<strong>" + val.nama_kategori + "</strong>";
                                                    koefisien = "";
                                                    harga_dasar = "";
                                                    harga_satuan = "";
                                                    align = 'left';
                                                } else if (val.id_kategori == "F") {
                                                    urut = "";
                                                    nama_kategori = "<strong>" + val.nama_kategori + "</strong>";
                                                    koefisien = "";
                                                    harga_dasar = "";
                                                    harga_satuan = "<strong>Rp " + number_format(val.harga_satuan, 2, ',', '.') + "</strong>";
                                                    align = 'right';
                                                } else {
                                                    urut_rincian_kategori++;
                                                    urut = urut_rincian_kategori;
                                                    nama_kategori = val.nama_kategori;
                                                    koefisien = number_format(val.koefisien, 4, ',', '.');
                                                    harga_dasar = "Rp " + number_format(val.harga_dasar, 2, ',', '.');
                                                    harga_satuan = "Rp " + number_format(val.harga_satuan, 2, ',', '.');
                                                    align = 'left';
                                                }

                                                rincian_ahs +=
                                                    '<tr>' +
                                                    '<td align="center">' + urut + '</td>' +
                                                    '<td align="' + align + '">' + nama_kategori + '</td>' +
                                                    '<td align="right">' + koefisien + '</td>' +
                                                    '<td align="center">' + val.satuan_kategori + '</td>' +
                                                    '<td align="right">' + harga_dasar + '</td>' +
                                                    '<td align="right" style="padding-right: 12px;">' + harga_satuan + '</td>' +
                                                    '</tr>';
                                            });
                                            rincian_ahs += '</tbody></table>';

                                            return rincian_ahs;
                                        }

                                        function reloadRekapHargaSatuan() {
                                            tabel_rekap_harga_satuan.ajax.reload();
                                        }

                                        var tabel_rekap_harga_satuan, tabel_ahs;

                                        function loadTabelRekapHargaSatuan() {
                                            tabel_rekap_harga_satuan = $("#tabel-rekap-harga-satuan").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapHargaSatuan1",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                        "targets": [8],
                                                        "searchable": false,
                                                        "orderable": false
                                                    },
                                                    {
                                                        "targets": [0],
                                                        "searchable": false,
                                                        "orderable": false
                                                    }
                                                ],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [6, 'desc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);
                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(1)', row).prop("title", data[8]).html(data[1] + "<span id='badge-" + data[9].replace(/\./g, '') + "'></span>");
                                                    $('td:eq(0),td:eq(2),td:eq(8)', row).prop("align", "center");
                                                    $('td:eq(3),td:eq(4),td:eq(5),td:eq(6)', row).prop("align", "right");
                                                    $('td:eq(7)', row).css("padding-left", "10px");
                                                    $('td:eq(8)', row).html('').prop("class", "details-control").prop("id", data[9]);
                                                    if (data[6] == "Rp 0,00")
                                                        if ($('#btn-ekspor-ahs').prop('disabled', false)) $('#btn-ekspor-ahs').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-harga-satuan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-harga-satuan.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-harga-satuan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }

                                                    $.ajax({
                                                        type: 'get',
                                                        url: "https://estimator.id/server/api/cekKoefisienPekerjaan/" + id_proyek,
                                                        dataType: "JSON",
                                                        success: function(data) {
                                                            if (data != '') {
                                                                for (i = 0; i <= data.length; i++) {
                                                                    var id = data[i].id_pekerjaan;
                                                                    $('#badge-' + id.replace(/\./g, '')).append("<i class='fa fa-exclamation-circle' style='color: red; position: absolute; margin-top: -7px;' title='Terdapat koefisien yang belum diisi'></i>");
                                                                }
                                                            }
                                                        },
                                                        error: function(jqXHR, textStatus, errorThrown) {
                                                            toastr.error('Terjadi masalah saat pengambilan data.', 'Kesalahan', opsi_toastr);
                                                        }
                                                    });
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });

                                            $('#tabel-rekap-harga-satuan tbody').on('click', 'td.details-control', function() {
                                                var id_pekerjaan = $(this).attr('id');
                                                var tr = $(this).closest('tr');
                                                var row = tabel_rekap_harga_satuan.row(tr);

                                                if (row.child.isShown()) {
                                                    row.child.hide();
                                                    tr.removeClass('shown');
                                                } else {
                                                    $.ajax({
                                                        type: 'get',
                                                        url: "https://estimator.id/api/getRincianAHS1/" + id_proyek + "/" + id_pekerjaan,
                                                        dataType: "JSON",
                                                        success: function(data) {
                                                            if (data != '') {
                                                                row.child(formatAHS(data)).show();
                                                            } else {
                                                                row.child("<center><img src='https://estimator.id/assets/not-found.svg' width='50' style='padding: 5px 0px;' /><br><span>Tidak ada hasil ditemukan</span></center>").show();
                                                            }
                                                        }
                                                    });

                                                    tr.addClass('shown');
                                                }
                                            });
                                        }

                                        $('#reload-rekap-harga-satuan').on('click', function() {
                                            if (typeof tabel_rekap_harga_satuan == 'undefined') loadTabelRekapHargaSatuan();
                                            else reloadRekapHargaSatuan();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="volume">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-volume" aria-expanded="false" aria-controls="rekap-volume">
                                        Rincian Volume
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-volume" class="panel-collapse collapse" role="tabpanel" aria-labelledby="volume">
                                <div class="panel-body">
                                    <style>
                                        .table-rincian-volume {
                                            border-collapse: separate;
                                            padding-left: 91px;
                                            padding-right: 67px;
                                        }

                                        #tabel-rekap-volume_processing {
                                            top: 56%;
                                            left: 54%;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rekap-volume" style="width: 138px;" onclick="konfirmasiEkspor('volume')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-volume"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-volume" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <th width="4%">No.</th>
                                                <th>ID Pekerjaan</th>
                                                <th width="72%">Uraian Pekerjaan</th>
                                                <th width="7%">Satuan</th>
                                                <th width="13%">Total Volume</th>
                                                <th>Have Sub</th>
                                                <th>Urut</th>
                                                <th width="4%"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <script>
                                        function reloadRekapVolume() {
                                            tabel_rekap_volume.ajax.reload();
                                        }

                                        function number_format(number, decimals, dec_point, thousands_point) {
                                            if (number == null || !isFinite(number)) {
                                                throw new TypeError("number is not valid");
                                            }

                                            if (!decimals) {
                                                var len = number.toString().split('.').length;
                                                decimals = len > 1 ? len : 0;
                                            }

                                            if (!dec_point) {
                                                dec_point = '.';
                                            }

                                            if (!thousands_point) {
                                                thousands_point = ',';
                                            }

                                            number = parseFloat(number).toFixed(decimals);

                                            number = number.replace(".", dec_point);

                                            var splitNum = number.split(dec_point);
                                            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                                            number = splitNum.join(dec_point);

                                            return number;
                                        }

                                        function format(data) {
                                            var rincian_volume = '',
                                                kategori = '',
                                                panjang, luas, tinggi;

                                            if (data[0].satuan == "m1" || data[0].satuan == "m" || data[0].satuan == "m'") {
                                                rincian_volume =
                                                    '<table width="100%" class="table table-striped table-advance table-rincian-volume">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                    '<th width="52%">Uraian</th>' +
                                                    '<th width="13%">Jumlah</th>' +
                                                    '<th width="13%">Panjang (m1)</th>' +
                                                    '<th width="16%">Jumlah Volume (m1)</th>' +
                                                    '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                                                $.each(data, function(i, val) {
                                                    if (val.kategori == 1) kategori = '<i class="fa fa-plus" style="font-size:10pt;" title="Penambahan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    else if (val.kategori == 2) kategori = '<i class="fa fa-minus" style="font-size:10pt;" title="Pengurangan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    //   else kategori = '<i class="fa fa-external-link" style="font-size:10pt;" title="Skala Pekerjaan Referensi"></i>&nbsp&nbsp&nbsp';
                                                    if (val.id_pekerjaan_ref != '') panjang = val.volume;
                                                    else panjang = val.panjang;
                                                    rincian_volume +=
                                                        '<tr>' +
                                                        '<td align="left">' + kategori + val.keterangan + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(panjang, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah_volume, 2, ',', '.') + '</td>' +
                                                        '</tr>';
                                                });
                                                rincian_volume += '</tbody></table>';
                                            } else
                                            if (data[0].satuan == "m2") {
                                                rincian_volume =
                                                    '<table width="100%" class="table table-striped table-advance table-rincian-volume">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                    '<th width="29%">Uraian</th>' +
                                                    '<th width="13%">Jumlah</th>' +
                                                    '<th width="13%">Panjang (m)</th>' +
                                                    '<th width="13%">Lebar/Tinggi (m)</th>' +
                                                    '<th width="16%">Luas (m2)</th>' +
                                                    '<th width="16%">Jumlah Volume (m2)</th>' +
                                                    '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                                                $.each(data, function(i, val) {
                                                    if (val.kategori == 1) kategori = '<i class="fa fa-plus" style="font-size:10pt;" title="Penambahan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    else if (val.kategori == 2) kategori = '<i class="fa fa-minus" style="font-size:10pt;" title="Pengurangan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    if (val.id_pekerjaan_ref != '') luas = val.volume;
                                                    else luas = val.luas;
                                                    rincian_volume +=
                                                        '<tr>' +
                                                        '<td align="left">' + kategori + val.keterangan + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.panjang, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.lebar, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(luas, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah_volume, 2, ',', '.') + '</td>' +
                                                        '</tr>';
                                                });
                                                rincian_volume += '</tbody></table>';
                                            } else
                                            if (data[0].satuan == "m3") {
                                                rincian_volume =
                                                    '<table width="100%" class="table table-striped table-advance table-rincian-volume">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                    '<th width="21%">Uraian</th>' +
                                                    '<th width="10%">Jumlah</th>' +
                                                    '<th width="10%">Panjang (m)</th>' +
                                                    '<th width="10%">Lebar (m)</th>' +
                                                    '<th width="10%">Tinggi (m)</th>' +
                                                    '<th width="13%">Luas (m2)</th>' +
                                                    '<th width="13%">Volume (m3)</th>' +
                                                    '<th width="13%">Jumlah Volume (m3)</th>' +
                                                    '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                                                $.each(data, function(i, val) {
                                                    if (val.kategori == 1) kategori = '<i class="fa fa-plus" style="font-size:10pt;" title="Penambahan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    else if (val.kategori == 2) kategori = '<i class="fa fa-minus" style="font-size:10pt;" title="Pengurangan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    rincian_volume +=
                                                        '<tr>' +
                                                        '<td align="left">' + kategori + val.keterangan + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.panjang, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.lebar, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.tinggi, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.luas, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.volume, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah_volume, 2, ',', '.') + '</td>' +
                                                        '</tr>';
                                                });
                                                rincian_volume += '</tbody></table>';
                                            } else
                                            if (data[0].satuan == "kg") {
                                                rincian_volume =
                                                    '<table width="100%" class="table table-striped table-advance table-rincian-volume">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                    '<th width="28%">Uraian</th>' +
                                                    '<th width="10%">Jumlah</th>' +
                                                    '<th width="10%">Panjang (m)</th>' +
                                                    '<th width="13%">Luas (m2)</th>' +
                                                    '<th width="13%">Berat (kg/m)</th>' +
                                                    '<th width="13%">Berat (kg/m2)</th>' +
                                                    '<th width="13%">Jumlah Volume (kg)</th>' +
                                                    '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                                                $.each(data, function(i, val) {
                                                    if (val.kategori == 1) kategori = '<i class="fa fa-plus" style="font-size:10pt;" title="Penambahan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    else if (val.kategori == 2) kategori = '<i class="fa fa-minus" style="font-size:10pt;" title="Pengurangan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    if (val.id_pekerjaan_ref != '') tinggi = val.volume;
                                                    else tinggi = val.tinggi;
                                                    rincian_volume +=
                                                        '<tr>' +
                                                        '<td align="left">' + kategori + val.keterangan + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.panjang, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.luas, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.lebar, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(tinggi, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah_volume, 2, ',', '.') + '</td>' +
                                                        '</tr>';
                                                });
                                                rincian_volume += '</tbody></table>';
                                            } else {
                                                rincian_volume =
                                                    '<table width="100%" class="table table-striped table-advance table-rincian-volume">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                    '<th width="52%">Uraian</th>' +
                                                    '<th width="13%">Jumlah</th>' +
                                                    '<th width="13%">Volume (' + data[0].satuan + ')</th>' +
                                                    '<th width="16%">Jumlah Volume (' + data[0].satuan + ')</th>' +
                                                    '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                                                $.each(data, function(i, val) {
                                                    if (val.kategori == 1) kategori = '<i class="fa fa-plus" style="font-size:10pt;" title="Penambahan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    else if (val.kategori == 2) kategori = '<i class="fa fa-minus" style="font-size:10pt;" title="Pengurangan Rincian"></i>&nbsp&nbsp&nbsp';
                                                    if (val.id_pekerjaan_ref != '') volume = number_format(val.volume, 2, ',', '.');
                                                    else volume = '';
                                                    rincian_volume +=
                                                        '<tr>' +
                                                        '<td align="left">' + kategori + val.keterangan + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah, 2, ',', '.') + '</td>' +
                                                        '<td align="right">' + volume + '</td>' +
                                                        '<td align="right">' + number_format(val.jumlah_volume, 2, ',', '.') + '</td>' +
                                                        '</tr>';
                                                });
                                                rincian_volume += '</tbody></table>';
                                            };

                                            return rincian_volume;
                                        }

                                        var tabel_rekap_volume, urut_pekerjaan;

                                        function loadTabelRekapVolume() {
                                            tabel_rekap_volume = $("#tabel-rekap-volume").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapVolume",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [1, 5, 6],
                                                    "visible": false,
                                                    "searchable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bSort": false,
                                                "bAutoWidth": false,
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var api = this.api();
                                                    var arr_urut = data[0].split('.');
                                                    var urut, nama_pekerjaan;
                                                    if (arr_urut.length == 1) {
                                                        urut_pekerjaan = 0;
                                                        urut = "<strong>&#" + (64 + parseInt(data[6])) + "</strong>";
                                                        nama_pekerjaan = "<strong>" + data[2] + "</strong>";
                                                    } else if (arr_urut.length == 2) {
                                                        urut_pekerjaan++;
                                                        urut = urut_pekerjaan;
                                                        nama_pekerjaan = data[2];
                                                    } else {
                                                        urut = "-";
                                                        nama_pekerjaan = data[2];
                                                    }
                                                    $('td:eq(0)', row).html(urut);
                                                    $('td:eq(1)', row).html(nama_pekerjaan);
                                                    $('td:eq(0),td:eq(2),td:eq(4)', row).prop("align", "center");
                                                    if (data[4] != "0,00") $('td:eq(4)', row).prop("class", "details-control").prop("id", data[1]);
                                                    else $('td:eq(4)', row).html("");
                                                    $('td:eq(3)', row).prop("align", "right");
                                                    if (data[5] == "1") {
                                                        $('td:eq(2),td:eq(3)', row).html("");
                                                        $('td:eq(4)', row).prop("class", "");
                                                    }
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-volume_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-volume.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-volume_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });

                                            $('#tabel-rekap-volume tbody').on('click', 'td.details-control', function() {
                                                var id = $(this).attr('id');
                                                var tr = $(this).closest('tr');
                                                var row = tabel_rekap_volume.row(tr);

                                                if (row.child.isShown()) {
                                                    row.child.hide();
                                                    tr.removeClass('shown');
                                                } else {
                                                    $.ajax({
                                                        type: 'get',
                                                        url: "https://estimator.id/server/api/getRincianVolume/" + id_proyek + "/" + id,
                                                        dataType: "JSON",
                                                        success: function(data) {
                                                            if (data != '') {
                                                                row.child(format(data)).show();
                                                            } else {
                                                                row.child("<center><img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span></center>").show();
                                                            }
                                                        }
                                                    });
                                                    tr.addClass('shown');
                                                }
                                            });
                                        }

                                        $('#reload-rekap-volume').on('click', function() {
                                            if (typeof tabel_rekap_volume == 'undefined') loadTabelRekapVolume();
                                            else reloadRekapVolume();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rab">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rab" aria-expanded="false" aria-controls="rab">
                                        RAB
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rab">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rab_processing {
                                            top: 55%;
                                            left: 54%;
                                        }

                                        .summary-rab>tbody>tr {
                                            vertical-align: bottom;
                                            border-top: 2px solid #04740e;
                                            background-color: #089613;
                                            color: #fff;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rab" style="width: 138px;" onclick="konfirmasiEkspor('rab')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rab"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rab" class="table table-striped table-advance" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="4%">No.</th>
                                                <th>ID Kategori</th>
                                                <th width="47%">Uraian Pekerjaan</th>
                                                <th width="9%">Volume</th>
                                                <th width="3%">Satuan</th>
                                                <th width="14%">Harga Satuan</th>
                                                <th width="15%">Harga</th>
                                                <th width="8%">%</th>
                                                <th>Jumlah Harga</th>
                                                <th>Pros Pajak</th>
                                                <th>Pajak</th>
                                                <th>Total Harga</th>
                                                <th>Pekerjaan</th>
                                                <th>Have Sub</th>
                                                <th>Urut</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table summary-rab" style="width: 100%;margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="60%"><strong>JUMLAH HARGA</strong></td>
                                                <td align="right" width="16%"><strong><span id="jum_harga"></span></strong></td>
                                                <td align="right" width="7.7%"><strong style="padding-right: 17px;">100.00 %</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><strong>PPN <span id="pros_pajak"></span></strong></td>
                                                <td align="right"><strong><span id="pajak"></span></strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><strong>TOTAL HARGA</strong></td>
                                                <td align="right"><strong><span id="total_harga"></span></strong></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <script>
                                        function reloadRAB() {
                                            tabel_rab.ajax.reload();
                                        }

                                        var tabel_rab, urut_pekerjaan;

                                        function loadTabelRAB() {
                                            tabel_rab = $("#tabel-rab").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelLapRAB",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [1, 8, 9, 10, 11, 12, 13, 14],
                                                    "visible": false,
                                                    "searchable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bSort": false,
                                                "bAutoWidth": false,
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var api = this.api();
                                                    var arr_urut = data[0].split('.');
                                                    var urut, nama_pekerjaan, temp_nama;

                                                    if (data[12].length >= 84) temp_nama = data[12].substring(0, 82) + '...';
                                                    else temp_nama = data[12];
                                                    if (arr_urut.length == 1) {
                                                        urut_pekerjaan = 0;
                                                        urut = "<strong>&#" + (64 + parseInt(data[14])) + "</strong>";
                                                        nama_pekerjaan = "<strong>" + temp_nama + "</strong>";
                                                    } else if (arr_urut.length == 2) {
                                                        urut_pekerjaan++;
                                                        urut = urut_pekerjaan;
                                                        nama_pekerjaan = temp_nama;
                                                    } else {
                                                        urut = "-";
                                                        nama_pekerjaan = temp_nama;
                                                    }

                                                    $('td:eq(0)', row).html(urut);
                                                    $('td:eq(1)', row).html(nama_pekerjaan).prop("title", data[12]);
                                                    $('td:eq(0),td:eq(3)', row).prop("align", "center");
                                                    $('td:eq(2),td:eq(4),td:eq(5),td:eq(6)', row).prop("align", "right");
                                                    if (data[13] == "1" && data[4] != "") $('td:eq(2),td:eq(3),td:eq(4),td:eq(5),td:eq(6)', row).html("");
                                                    else if (data[13] == "1" && data[4] == "") {
                                                        $('td:eq(2),td:eq(3),td:eq(4)', row).html("");
                                                        $('td:eq(5)', row).html("<strong>" + data[6] + "</strong>");
                                                        $('td:eq(6)', row).html("<strong>" + data[7] + "</strong>");
                                                    }

                                                    $('#jum_harga').html(data[8]);
                                                    $('#pros_pajak').html(data[9]);
                                                    $('#pajak').html(data[10]);
                                                    $('#total_harga').html(data[11]);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rab_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rab.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rab_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '0');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                //   scroller: true
                                            });
                                        }

                                        $('#reload-rab').on('click', function() {
                                            if (typeof tabel_rab == 'undefined') loadTabelRAB();
                                            else reloadRAB();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rekap-rab">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rekap-rab" aria-expanded="false" aria-controls="rekap-rab">
                                        Rekapitulasi RAB
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rekap-rab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rekap-rab">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rekap-rab_processing {
                                            top: 55%;
                                            left: 54%;
                                        }

                                        .summary-rekap-rab>tbody>tr {
                                            vertical-align: bottom;
                                            border-top: 2px solid #04740e;
                                            background-color: #089613;
                                            color: #fff;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rekap-rab" style="width: 138px;" onclick="konfirmasiEkspor('rekap_rab')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-rab"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-rab" class="table table-striped table-advance" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="4%">No.</th>
                                                <th>ID Kategori</th>
                                                <th width="68%">Uraian Pekerjaan</th>
                                                <th width="20%">Harga</th>
                                                <th width="8%">%</th>
                                                <th>Jumlah Harga</th>
                                                <th>Pros Pajak</th>
                                                <th>Pajak</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table summary-rekap-rab" style="width: 100%;margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="60%"><strong>JUMLAH HARGA</strong></td>
                                                <td align="right" width="13%"><strong><span id="rekap_jum_harga"></span></strong></td>
                                                <td align="right" width="6.3%" style="padding-right: 12px;"><strong>100.00 %</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><strong>PPN <span id="rekap_pros_pajak"></span></strong></td>
                                                <td align="right"><strong><span id="rekap_pajak"></span></strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><strong>TOTAL HARGA</strong></td>
                                                <td align="right"><strong><span id="rekap_total_harga"></span></strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><strong>DIBULATKAN</strong></td>
                                                <td align="right"><strong><span id="rekap_harga_bulat"></span></strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="2"><strong><span id="rekap_terbilang"></span></strong></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <script src="https://estimator.id/assets/js/terbilang.js"></script>

                                    <script>
                                        function reloadRekapRAB() {
                                            tabel_rekap_rab.ajax.reload();
                                        }

                                        function roundDown(number, decimals) {
                                            decimals = decimals || 0;
                                            return (Math.floor(number * Math.pow(10, decimals)) / Math.pow(10, decimals));
                                        }

                                        function number_format(number, decimals, dec_point, thousands_point) {
                                            if (number == null || !isFinite(number)) {
                                                throw new TypeError("number is not valid");
                                            }

                                            if (!decimals) {
                                                var len = number.toString().split('.').length;
                                                decimals = len > 1 ? len : 0;
                                            }

                                            if (!dec_point) {
                                                dec_point = '.';
                                            }

                                            if (!thousands_point) {
                                                thousands_point = ',';
                                            }

                                            number = parseFloat(number).toFixed(decimals);

                                            number = number.replace(".", dec_point);

                                            var splitNum = number.split(dec_point);
                                            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                                            number = splitNum.join(dec_point);

                                            return number;
                                        }

                                        var tabel_rekap_rab, urut_pekerjaan;

                                        function loadTabelRekapRAB() {
                                            tabel_rekap_rab = $("#tabel-rekap-rab").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapRAB",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [1, 5, 6, 7, 8],
                                                    "visible": false,
                                                    "searchable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bSort": false,
                                                "bAutoWidth": false,
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    $('td:eq(0)', row).html("&#" + (64 + parseInt(data[0])));
                                                    $('td:eq(1)', row).html(data[2]);
                                                    $('td:eq(2)', row).html(data[3]);
                                                    $('td:eq(3)', row).html(data[4]).css("padding-right", "12px");
                                                    $('td:eq(0)', row).prop("align", "center");
                                                    $('td:eq(2),td:eq(3)', row).prop("align", "right");

                                                    $('#rekap_jum_harga').html(data[5]);
                                                    $('#rekap_pros_pajak').html(data[6]);
                                                    $('#rekap_pajak').html(data[7]);
                                                    $('#rekap_total_harga').html(data[8]);
                                                    let total_harga = data[8].replace('Rp ', '').replace(/\./g, '').replace(',', '.');
                                                    let harga_bulat = roundDown(parseFloat(total_harga), -3);
                                                    $('#rekap_harga_bulat').html("Rp " + number_format(harga_bulat, 2, ',', '.'));
                                                    $('#rekap_terbilang').html("TERBILANG: " + $.trim(terbilang(harga_bulat).replace(/  +/g, ' ')));
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-rab_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-rab.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-rab_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '0');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                //   scroller: true
                                            });
                                        }

                                        $('#reload-rekap-rab').on('click', function() {
                                            if (typeof tabel_rekap_rab == 'undefined') loadTabelRekapRAB();
                                            else reloadRekapRAB();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rekap-bahan">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rekap-bahan" aria-expanded="false" aria-controls="rekap-bahan">
                                        Rekapitulasi Bahan
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rekap-bahan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rekap-bahan">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rekap-bahan_processing {
                                            top: 55%;
                                            left: 54%;
                                        }

                                        .summary-rekap-bahan>tbody>tr {
                                            vertical-align: bottom;
                                            border-top: 2px solid #04740e;
                                            background-color: #089613;
                                            color: #fff;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rekap-bahan" style="width: 138px;" onclick="konfirmasiEkspor('rekap_bahan')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-bahan"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-bahan" class="table table-striped table-advance" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th width="19%">Uraian Bahan</th>
                                                <th width="7%">Volume</th>
                                                <th width="5%">Satuan</th>
                                                <th width="12%">Merk</th>
                                                <th width="14%">Spesifikasi</th>
                                                <th width="20%">Sumber</th>
                                                <th width="12%">Jumlah Harga</th>
                                                <th width="7%">%</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table summary-rekap-bahan" style="width: 100%;margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="62%"><strong>JUMLAH HARGA</strong></td>
                                                <td align="right" width="16.5%"><strong><span id="jum_bahan"></span></strong></td>
                                                <td align="right" width="6.9%"><strong style="padding-right: 17px;">100.00 %</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <script>
                                        function reloadRekapBahan() {
                                            tabel_rekap_bahan.ajax.reload();
                                        }

                                        var tabel_rekap_bahan;

                                        function loadTabelRekapBahan() {
                                            tabel_rekap_bahan = $("#tabel-rekap-bahan").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapBahan",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [0],
                                                    "searchable": false,
                                                    "orderable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [7, 'desc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);
                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(3)', row).prop("align", "center");
                                                    $('td:eq(2),td:eq(7),td:eq(8)', row).prop("align", "right");
                                                    $('#jum_bahan').html(data[9]);
                                                    if (data[3] != "%" && data[7] == "Rp 0,00")
                                                        if ($('#btn-ekspor-rekap-bahan').prop('disabled', false)) $('#btn-ekspor-rekap-bahan').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-bahan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-bahan.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-bahan_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });
                                        }

                                        $('#reload-rekap-bahan').on('click', function() {
                                            if (typeof tabel_rekap_bahan == 'undefined') loadTabelRekapBahan();
                                            else reloadRekapBahan();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rekap-upah">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rekap-upah" aria-expanded="false" aria-controls="rekap-upah">
                                        Rekapitulasi Upah
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rekap-upah" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rekap-upah">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rekap-upah_processing {
                                            top: 55%;
                                            left: 54%;
                                        }

                                        .summary-rekap-upah>tbody>tr {
                                            vertical-align: bottom;
                                            border-top: 2px solid #04740e;
                                            background-color: #089613;
                                            color: #fff;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rekap-upah" style="width: 138px;" onclick="konfirmasiEkspor('rekap_upah')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-upah"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-upah" class="table table-striped table-advance" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th width="19%">Uraian Upah</th>
                                                <th width="7%">Volume</th>
                                                <th width="5%">Satuan</th>
                                                <th width="12%">Merk</th>
                                                <th width="14%">Spesifikasi</th>
                                                <th width="20%">Sumber</th>
                                                <th width="12%">Jumlah Harga</th>
                                                <th width="7%">%</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table summary-rekap-upah" style="width: 100%;margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="62%"><strong>JUMLAH HARGA</strong></td>
                                                <td align="right" width="16.5%"><strong><span id="jum_upah"></span></strong></td>
                                                <td align="right" width="6.9%"><strong style="padding-right: 17px;">100.00 %</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <script>
                                        function reloadRekapUpah() {
                                            tabel_rekap_upah.ajax.reload();
                                        }

                                        var tabel_rekap_upah;

                                        function loadTabelRekapUpah() {
                                            tabel_rekap_upah = $("#tabel-rekap-upah").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapUpah",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [0],
                                                    "searchable": false,
                                                    "orderable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [7, 'desc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);
                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(3)', row).prop("align", "center");
                                                    $('td:eq(2),td:eq(7),td:eq(8)', row).prop("align", "right");
                                                    $('#jum_upah').html(data[9]);
                                                    if (data[3] != "%" && data[7] == "Rp 0,00")
                                                        if ($('#btn-ekspor-rekap-upah').prop('disabled', false)) $('#btn-ekspor-rekap-upah').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-upah_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-upah.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-upah_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });
                                        }

                                        $('#reload-rekap-upah').on('click', function() {
                                            if (typeof tabel_rekap_upah == 'undefined') loadTabelRekapUpah();
                                            else reloadRekapUpah();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="rekap-alat">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#wrap-rekap-alat" aria-expanded="false" aria-controls="rekap-alat">
                                        Rekapitulasi Alat
                                    </a>
                                </h4>
                            </div>
                            <div id="wrap-rekap-alat" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rekap-alat">
                                <div class="panel-body">
                                    <style>
                                        #tabel-rekap-alat_processing {
                                            top: 55%;
                                            left: 54%;
                                        }

                                        .summary-rekap-alat>tbody>tr {
                                            vertical-align: bottom;
                                            border-top: 2px solid #04740e;
                                            background-color: #089613;
                                            color: #fff;
                                        }
                                    </style>

                                    <center>
                                        <div class="btn-group">
                                            <div class="btn-group btn-group-info">
                                                <button class="btn btn-default btn-ekspor btn-rincian" id="btn-ekspor-rekap-alat" style="width: 138px;" onclick="konfirmasiEkspor('rekap_alat')"><strong><i class="fa fa-upload"></i> EKSPOR DATA</strong></button>
                                                <button class="btn btn-default btn-reload btn-rincian" id="reload-rekap-alat"><strong><i class="fa fa-refresh"></i> RELOAD</strong></button>
                                            </div>
                                        </div>
                                    </center>
                                    <table id="tabel-rekap-alat" class="table table-striped table-advance">
                                        <thead>
                                            <tr>
                                                <th width="3%">No.</th>
                                                <th width="19%">Uraian Alat</th>
                                                <th width="7%">Volume</th>
                                                <th width="5%">Satuan</th>
                                                <th width="12%">Merk</th>
                                                <th width="14%">Spesifikasi</th>
                                                <th width="20%">Sumber</th>
                                                <th width="12%">Jumlah Harga</th>
                                                <th width="7%">%</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table summary-rekap-alat" style="width: 100%;margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="62%"><strong>JUMLAH HARGA</strong></td>
                                                <td align="right" width="16.5%"><strong><span id="jum_alat"></span></strong></td>
                                                <td align="right" width="6.9%"><strong><span id="pros_harga" style="padding-right: 17px;"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <script>
                                        function reloadRekapAlat() {
                                            tabel_rekap_alat.ajax.reload();
                                        }

                                        var tabel_rekap_alat;

                                        function loadTabelRekapAlat() {
                                            var rowData;
                                            tabel_rekap_alat = $("#tabel-rekap-alat").DataTable({
                                                "language": {
                                                    "info": "Menampilkan _START_ sampai _END_ dari jumlah data",
                                                    "sInfoEmpty": "",
                                                    "sInfoFiltered": "(terfilter dari _MAX_ data)",
                                                    "emptyTable": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "sLengthMenu": "Data per Halaman: _MENU_",
                                                    "sLoadingRecords": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' /><br>Silakan tunggu, data sedang di-load...",
                                                    "sProcessing": "<img src='https://estimator.id/assets/ajax-loader.gif' width='45' />",
                                                    "sSearch": "Cari Data:",
                                                    "sSearchPlaceholder": "Masukkan kata kunci...",
                                                    "sZeroRecords": "<img src='https://estimator.id/assets/img/not-found.png' width='110' style='padding: 10px 0px;' /><br><span>Tidak ada hasil ditemukan</span>",
                                                    "paginate": {
                                                        "first": "Pertama",
                                                        "last": "Terakhir",
                                                        "previous": "Sebelumnya",
                                                        "next": "Berikutnya"
                                                    }
                                                },
                                                processing: true,
                                                serverSide: true,
                                                ajax: {
                                                    "url": "https://estimator.id/api/getTabelRekapAlat",
                                                    "type": "POST",
                                                    data: function(data) {
                                                        data.proyek = id_proyek;
                                                    }
                                                },
                                                "columnDefs": [{
                                                    "targets": [0],
                                                    "searchable": false,
                                                    "orderable": false
                                                }],
                                                "dom": "ftr",
                                                "bDeferRender": true,
                                                "bInfo": false,
                                                "bLengthChange": false,
                                                "bAutoWidth": false,
                                                order: [
                                                    [7, 'desc']
                                                ],
                                                rowCallback: function(row, data, iDisplayIndex) {
                                                    var info = this.fnPagingInfo();
                                                    var page = info.iPage;
                                                    var length = info.iLength;
                                                    var index = page * length + (iDisplayIndex + 1);
                                                    rowData = data;

                                                    $('td:eq(0)', row).html(index);
                                                    $('td:eq(0),td:eq(3)', row).prop("align", "center");
                                                    $('td:eq(2),td:eq(7),td:eq(8)', row).prop("align", "right");
                                                    if (data[3] != "%" && data[7] == "Rp 0,00")
                                                        if ($('#btn-ekspor-rekap-alat').prop('disabled', false)) $('#btn-ekspor-rekap-alat').prop('disabled', true);
                                                },
                                                drawCallback: function(settings) {
                                                    if (settings.fnRecordsDisplay() == 0) {
                                                        $('#tabel-rekap-alat_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '140px');
                                                        $('#tabel-rekap-alat.dataTable td.dataTables_empty').css('padding-bottom', '14px');
                                                    } else {
                                                        $('#tabel-rekap-alat_wrapper .dataTables_scroll .dataTables_scrollBody').css('min-height', '400px');
                                                    }

                                                    if (rowData != null) {
                                                        $('#jum_alat').html(rowData[9]);
                                                        $('#pros_harga').html("100.00 %");
                                                    } else {
                                                        $('#jum_alat').html("Rp 0.00");
                                                        $('#pros_harga').html("0.00 %");
                                                    }
                                                },
                                                scrollY: 400,
                                                scrollCollapse: true,
                                                scroller: true
                                            });
                                        }

                                        $('#reload-rekap-alat').on('click', function() {
                                            if (typeof tabel_rekap_alat == 'undefined') loadTabelRekapAlat();
                                            else reloadRekapAlat();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>