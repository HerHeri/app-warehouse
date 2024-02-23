@extends('layouts.app')
@include('layouts.header')
@include('layouts.menu')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Form Masuk</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ url('/form-barang/masuk') }}">List Form Masuk</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="multilingual-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom row">
                                <div class="col-6">
                                    <h4 class="card-title">Daftar Form Masuk</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="creditForm()">Tambah Form</button>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="demo-spacing-0" id="alert-report"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table-masuk">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Form</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

@include('layouts.footer')

<!-- Credit Modal Form Masuk -->
<div class="modal fade" id="creditForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content p-2">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-2 pt-50">
                <div class="text-center mb-2" id="title-modal">
                    <h1 class="mb-1">Form Masuk</h1>
                </div>
                <form id="creditBarangForm" class="row gy-1 pt-75" action="javascript:void(0)">
                    @csrf
                    <input type="hidden" id="idform" name="idform" autocomplete="false">
                    <div class="col-12 col-md-12" id="select-listbarang"></div>
                    <div class="col-12 col-md-6" id="input-kodeform">
                        <label class="form-label" for="kodeform">Kode Form</label>
                        <input type="text" id="kodeform" name="kodeform" class="form-control" placeholder="Kode barang" readonly />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="jumlahbarang">Jumlah Barang</label>
                        <input type="text" id="jumlahbarang" name="jumlahbarang" class="form-control" placeholder="Jumlah Barang" />
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="button" id="btn-submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // console.log(location.origin);
    var tableMasuk = $('#table-masuk').DataTable({
        serverSide: true,
        processing: 'Loading ...',
        ajax: {
            url: location.origin + '/api/form-barang/masuk',
            type: 'GET',
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", getTokenAuth());
            }
        },
        paging: true,
        select: true,
        columns: [{
                defaultContent: '-',
                className: 'text-center',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'kdoe_barang',
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                        <h6 class="mb-0">${row.kode_form ?? ''}</h6>
                    </div>`
                }
            },
            {
                data: 'nama_barang',
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                        ${row.barang?.nama_barang ?? ''}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div>
                        ${row.jumlah ?? '0'}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    let status;
                    if(row.status == 1){
                        status = `<span class="badge badge-light-warning">Pending</span>`
                    }else if(row.status == 2){
                        status = `<span class="badge badge-light-success">Approve</span>`
                    }else{
                        status = `<span class="badge badge-light-danger">Cancel</span>`
                    }
                    return `<div class="d-flex flex-column">
                            ${status ?? ''}
                        </div>`
                }
            },
            {
                orderable: false,
                className: 'text-center',
                render: (data, type, row, meta) => {
                    let btnremove = `<button class="btn btn-danger btn-sm d-flex" onclick="deleteForm('${row.id}')"><i class="fa fa-trash" style="font-size: 28px;"></i> <span> Remove</span></button>`
                    return `<div class="d-flex justify-content-center">${btnremove}</div>`
                }
            }
        ]
    });

    async function creditForm(id){
        let barang = await apiCaller('/api/stock-barang/get-barang')
        var options;
        $.each(barang.data, function( key, value ) {
            options = options + '<option value="'+value.id+'">'+value.kode_barang +' | '+ value.nama_barang+'</option>';
        });


        let listbarang = `<label class="form-label" for="listbarang">List Barang</label>
                        <select id="listbarang" name="listbarang" class="form-select" aria-label="Default select example">
                            ${options}
                        </select>`;

        $("#select-listbarang").html(listbarang);

        if(id){
            $('#title-modal').html(
                `<h1 class="mb-1">Edit Form</h1>`
            )
            $('#input-kodeform').removeClass('d-none')
            let form = await apiCaller('/api/form-masuk/credit/'+id)
        }else{
            $('#title-modal').html(
                `<h1 class="mb-1">Create Form</h1>`
            )
            $('#input-kodeform').addClass('d-none')
            // $('#creditForm')[0].reset()
        }
        $('#creditForm').modal('show')
    }

    $('#btn-submit').on('click', async function(e){
        e.preventDefault()
        let data = {
            'idform' : $('#idform').val(),
            'kodeform' : $('#kodeform').val(),
            'listbarang' : $('#listbarang').val(),
            'jumlahbarang' : $('#jumlahbarang').val(),
            'type' : 'in'
        }
        let html = ''
        let submitForm = await apiCaller('/api/form-barang/masuk/store', 'POST', data)
        if(submitForm.status == true){
            html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Disimpan!</strong> ${submitForm.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }else{
            html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Gagal!</strong> ${submitForm.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }
        $('#creditForm').modal('hide')
        tableMasuk.ajax.reload()
        $('#alert-report').html(html)
    })

    async function deleteForm(id){
        let html = ''
        Swal.fire({
            title: "Ingin menghapus data?",
            text: "Data akan dihapus dari tabel!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
            }).then(async function(result) {
            if (result.isConfirmed) {
                let remove = await apiCaller('/api/form-barang/masuk/delete/'+id)
                if(remove.status == true){
                    html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body"><strong>Dihapus!</strong> ${remove.message}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }else{
                    html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body"><strong>Gagal dihapus!</strong> ${remove.message}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }
                $('#alert-report').html(html)
                tableMasuk.ajax.reload()
                $('#creditForm').modal('hide')
            }
        });
    }
</script>
@endsection
