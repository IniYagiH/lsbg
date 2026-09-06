"use strict";

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable_example_1").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            retrieve: true,
            responsive: true,
            order: [[5, 'desc']],
            stateSave: true,
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                url: "https://sertifikasi.lsbugapeknas.com/server_side/get_data",
            },
            columns: [
              { data: 'no_urut' },
              { data: 'nama' },
              { data: 'NIB' },
              { data: 'concat_klasifikasi' },
              { data: 'concat_sub' },
              { data: 'concat_kualifikasi' },
              { data: 'tgl_permohonan' },
              { data: 'status_0' },
              { data: 'status_1' },
              { data: 'status_2' },
              { data: null },
              { data: null },
              { data: null },
              { data: null },
              { data: null }, 
              { data: null },
              { data: null },
              { data: null },
              { data: null },
              { data: null },
            ],
            columnDefs: [
              {
                width: '10px',
                targets: 0,
                render: function (data, type, row) {

                    return `
                    <span class="label pulse mr-20">
                        <span class="position-relative">${row.no_urut}</span>
                        <span class="pulse-ring"></span>
                    </span>
                    `;
                }
              },
                {
                    targets: 1,
                    render: function (data, type, row) {
                      if(row.qr!=null){
                        var a=`
                        <a href="" id="${row.qr}" data-kt-docs-table-filter="qrcode" data-toggle="modal" data-target="#modal_qr">
                            <span class="text-success">${row.nama}
                        </a>
                        `
                      }else{
                        var a=`
                        ${row.nama}
                        `
                      }
                        return a;
                    }
                },
                {
                  targets: 10,
                  render: function (data, type, row) {

                      return `Rp, -`;
                  }
                },
                {
                  targets: 11,
                  render: function (data, type, row) {
                      return `
                      <a href="${row.base_url}sertifikasi/cetak_verifikasi/${row.id1}/${row.id2}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                      `;
                  }
                },
                {
                  targets: 12,
                  render: function (data, type, row) {

                      return `<a href="${row.base_url}/get_file/get_bu_49/${row.file_pembayaran}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>`;
                  }
                },
                {
                  targets: 13,
                  render: function (data, type, row) {

                      return `<a href="${row.base_url}/get_file/get_bu_perjanjian/${row.file_perjanjian}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>`;
                  }
                },
                {
                  targets: 14,
                  render: function (data, type, row) {

                      return `<a href="${row.base_url}sertifikasi/hasil_tim_pemutus/${row.id1}/${row.id2}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>`;
                  }
                },
                {
                  targets: 15,
                  render: function (data, type, row) {
                    if(row.qr!=null){
                      var b=`
                      <a id="${row.NIB}" name="${row.tgl_permohonan}" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-success pulse pulse-primary mr-5">
                        <i class="flaticon2-correct"></i>
                        <span class="pulse-ring"></span>
                    </a>
                      `
                    }else{
                      var b=`
                      <a id="${row.NIB}" name="${row.tgl_permohonan}" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-danger pulse pulse-primary mr-5">
                        <i class="fas fa-qrcode"></i>
                        <span class="pulse-ring"></span>
                    </a>
                      `
                    }
                      return b;
                  }
                },
                {
                  targets: 16,
                  render: function (data, type, row) {

                      return `
                      <a href="${row.base_url}sertifikasi/get_surat_tugas/${row.id1}/${row.id2}/${row.id3}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                      `;
                  }
                },
                {
                  targets: 17,
                  render: function (data, type, row) {

                      return `
                      <a href="${row.base_url}sertifikasi/cetak_asesor/${row.id1}/${row.id2}/${row.id3}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                      `;
                  }
                },
                {
                  targets: 18,
                  render: function (data, type, row) {

                    return `
                    <a href="${row.base_url}sertifikasi/cetak_asesor/${row.id1}/${row.id2}/${row.id4}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                    `;
                  }
                },
                {
                  targets: 19,
                  render: function (data, type, row) {

                      return `
                      <a href="${row.base_url}sertifikasi/berita_acara/${row.id1}/${row.id2}" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                      `;
                  }
                },
                {
                  targets: -1,
                  render: function (data, type, row) {
                    if(row.qr!=null){
                      var c=`
                      <div class="dropdown dropdown-inline">
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                          <i class="la la-cog"></i>
                                      </a>
                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                          <ul class="nav nav-hoverable flex-column">

                            <li class="nav-item"><a class="nav-link"  target="_blank" href="${row.base_url}sertifikasi/cetak_rekomendasi/${row.id1}/.${row.id2}"><i class="nav-icon la la-chalkboard-teacher" ></i><span class="nav-text">Cetak Rekomendasi ke LPJK</span></a></li>

                        </ul>
                          </div>
                      </div>
                      `
                    }else{
                      var c=`
                      <div class="dropdown dropdown-inline">
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                          <i class="la la-cog"></i>
                                      </a>
                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                          <ul class="nav nav-hoverable flex-column">

                            <li class="nav-item"><a class="nav-link"  ><span class="nav-text">QRCODE harus di create!</span></a></li>

                        </ul>
                          </div>
                      </div>
                      `
                    }
                      return c;
                  }
                },
                // {
                //     targets: 2,
                //     data: null,
                //     orderable: false,
                //     className: 'text-end',
                //     render: function (data, type, row) {
                //         return `
                //             <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                //                 Actions
                //                 <span class="svg-icon svg-icon-5 m-0">
                //                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                             <polygon points="0 0 24 0 24 24 0 24"></polygon>
                //                             <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                //                         </g>
                //                     </svg>
                //                 </span>
                //             </a>
                //             <!--begin::Menu-->
                //             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                //                 <!--begin::Menu item-->
                //                 <div class="menu-item px-3">
                //                     <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                //                         Edit
                //                     </a>
                //                 </div>
                //                 <!--end::Menu item-->
                //
                //                 <!--begin::Menu item-->
                //                 <div class="menu-item px-3">
                //                     <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                //                         Delete
                //                     </a>
                //                 </div>
                //                 <!--end::Menu item-->
                //             </div>
                //             <!--end::Menu-->
                //         `;
                //     },
                // },
            ],
            // Add data-filter attribute
            createdRow: function (row, data, dataIndex) {
                $(row).find('td:eq(2)').attr('data-filter', data.NIB);

            }
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            initToggleToolbar();
            toggleToolbars();
            handleDeleteRows();
            handleDeleteRow();

        });
    }


    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterPayment = document.querySelectorAll('[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
        const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            // Get filter values
            let paymentValue = '';

            // Get payment value
            filterPayment.forEach(r => {
                if (r.checked) {
                    paymentValue = r.value;
                }

                // Reset payment value if "All" is selected
                if (paymentValue === 'all') {
                    paymentValue = '';
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search(paymentValue).draw();
        });
    }
    var handleDeleteRow = () => {
        // Select all delete buttons
        const deleteButton = document.querySelectorAll('[data-kt-docs-table-filter="qrcode"]');

        deleteButton.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const tgl_permohonan = parent.querySelectorAll('td')[6].innerText;
                const nib = parent.querySelectorAll('td')[2].innerText;

                $('#qr_code').html('');
                jQuery.ajax({
                  url : "https://sertifikasi.lsbugapeknas.com/sertifikasi/get_qr",
                  type : "POST",
                  data : {nib:nib,
                    tgl_permohonan:tgl_permohonan},
                    success : function(data) {
                    var response = jQuery.parseJSON(data);
                    var record=response.record;
                    console.log(record);
                    var counter=0;
                    record.forEach(function(index,elem,arr){
                      var qr='data:image/png;base64,'+arr[counter].qr;
                      if(arr[counter].pemenuhan_peralatan=='1'){
                        var peralatan = '<span class="text-success">TERPENUHI';
                      }else{
                        var peralatan = '<span class="text-danger">BELUM TERPENUHI';
                      }

                      if(arr[counter].pemenuhan_penjualan_tahunan=='1'){
                        var penjualan_tahunan = '<span class="text-success">TERPENUHI';
                      }else{
                        var penjualan_tahunan = '<span class="text-danger">BELUM TERPENUHI';
                      }
                      if(arr[counter].pemenuhan_smm=='1'){
                        var smm = '<span class="text-success">TERPENUHI';
                      }else{
                        var smm = '<span class="text-danger">BELUM TERPENUHI';
                      }
                      if(arr[counter].pemenuhan_smap=='1'){
                        var smap = '<span class="text-success">TERPENUHI';
                      }else{
                        var smap = '<span class="text-danger">BELUM TERPENUHI';
                      }
                      if(arr[counter].aset=='1'){
                        var asesor_aset = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_aset = '<span class="text-danger">TIDAK SESUAI';
                      }
                      if(arr[counter].peralatan=='1'){
                        var asesor_peralatan = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_peraltan = '<span class="text-danger">TIDAK SESUAI';
                      }
                      if(arr[counter].tk=='1'){
                        var asesor_tk = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_tk = '<span class="text-danger">TIDAK SESUAI';
                      }
                      if(arr[counter].penjualan_tahunan=='1'){
                        var asesor_penjualan_tahunan = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_penjualan_tahunan = '<span class="text-danger">TIDAK SESUAI';
                      }
                      if(arr[counter].smm=='1'){
                        var asesor_smm = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_smm = '<span class="text-danger">TIDAK SESUAI';
                      }
                      if(arr[counter].smap=='1'){
                        var asesor_smap = '<span class="text-info">SESUAI';
                      }else{
                        var asesor_smap = '<span class="text-danger">TIDAK SESUAI';
                      }

                      document.getElementById('qr_code').innerHTML += '<hr><div class="card card-custom gutter-b"><div class="card-body p-15 pb-20"><div class="row mb-17"><div class="col-md-5"><!--begin::Image--><div class="card card-custom card-stretch"><div class="card-body p-0 rounded px-5 py-15 d-flex align-items-center justify-content-center" style="background-color: #C70039;"><img src="'+qr+'" class="mw-200 w-300px" /></div></div></div><div class="col-md-7"><h2 class="font-weight-bolder text-dark mb-7" style="font-size: 20px;">'+arr[counter].nama_bu+'<br> [ '+arr[counter].id_izin+' ] '+'</h2><div class="font-size-h4 mb-7 text-dark-50">'+arr[counter].alamat_bu+'</div><div class="row mb-12"><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Klasifikasi Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_klasifikasi_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sifat Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_sifat+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">KBLI</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nomor_kbli+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sub Klasifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].id_sub_klasifikasi+' - '+arr[counter].deskripsi_subklasifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Kualifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].kualifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Penjualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+smap+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Keuangan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_aset+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Pejualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smap+'</span></div></div></div></div></div></div></div><hr>';

                      counter+=1;
                    });
                  },
                  error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                  }
                });
            })
        });
    }

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + customerName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            Swal.fire({
                                text: "You have deleted " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Reset payment type
            filterPayment[0].checked = true;

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search('').draw();
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = function () {
        // Toggle selected action toolbar
        // Select all checkboxes
        const container = document.querySelector('#kt_datatable_example_1');
        const checkboxes = container.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows

    }

    // Toggle toolbars
    var toggleToolbars = function () {
        // Define variables
        const container = document.querySelector('#kt_datatable_example_1');
        const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();

            handleFilterDatatable();
            handleDeleteRows();
            handleDeleteRow();
            handleResetForm();

        }
    }
}();


jQuery(document).ready(function() {
    KTDatatablesServerSide.init();
});
