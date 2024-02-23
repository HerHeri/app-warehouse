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
                        <h2 class="content-header-title float-start mb-0">List Barang</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ url('stock-barang') }}">List Barang</a></li>
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
                                    <h4 class="card-title">List Barang</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="creditBarang()">Tambah Barang</button>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="demo-spacing-0" id="alert-report"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table-barang">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Stock</th>
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

<!-- Credit Modal Barang -->
<div class="modal fade" id="creditBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content p-2">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-2 pt-50">
                <div class="text-center mb-2" id="title-modal">
                    <h1 class="mb-1">Edit Barang</h1>
                    <p>Updating barang details.</p>
                </div>
                <form id="creditBarangForm" class="row gy-1 pt-75" action="javascript:void(0)">
                    @csrf
                    <input type="hidden" id="idbarang" name="idbarang" autocomplete="false">
                    <div class="col-12">
                        <label class="form-label" for="namabarang">Nama barang</label>
                        <input type="text" id="namabarang" name="namabarang" class="form-control" placeholder="Nama barang" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="kodebarang">Kode Barang</label>
                        <input type="text" id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode barang" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="hargabarang">Harga Barang</label>
                        <input type="text" id="hargabarang" name="hargabarang" class="form-control" placeholder="Harga barang" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="stockbarang">Stock Barang</label>
                        <input type="text" id="stockbarang" name="stockbarang" class="form-control" placeholder="Stock barang" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="statusbarang">Status</label>
                        <select id="statusbarang" name="statusbarang" class="form-select" aria-label="Default select example">
                            <option readonly>Pilih Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
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
    var tableBarang = $('#table-barang').DataTable({
        serverSide: true,
        processing: 'Loading ...',
        ajax: {
            url: location.origin + '/api/stock-barang',
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
                        <h6 class="mb-0">${row.kode_barang ?? ''}</h6>
                    </div>`
                }
            },
            {
                data: 'nama_barang',
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                        ${row.nama_barang ?? ''}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div>
                        ${row.harga ?? '0'}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                            ${row.stock ?? ''}
                        </div>`
                }
            },
            {
                orderable: false,
                className: 'text-center',
                render: (data, type, row, meta) => {
                    let btnremove = `<button class="btn btn-danger btn-sm d-flex" onclick="deleteBarang('${row.id}')"><i class="fa fa-trash" style="font-size: 28px;"></i> <span> Remove</span></button>`
                    let btncredit = `<button onclick="creditBarang('${row.id}')" class="btn btn-success btn-sm d-flex me-1"><i class="fa fa-eye" style="font-size: 28px;"></i><span> Edit</span></button>`
                    return `<div class="d-flex justify-content-center">
                        ${btncredit} ${btnremove}
                        </div>`
                }
            }
        ]
    });

    async function creditBarang(id){
        if(id){
            $('#title-modal').html(
                `<h1 class="mb-1">Edit Barang</h1>
                <p>Update barang details.</p>`
            )
            let barang = await apiCaller('/api/stock-barang/credit/'+id)
            $('#idbarang').val(barang.data.id)
            $('#namabarang').val(barang.data.nama_barang)
            $('#hargabarang').val(barang.data.harga)
            $('#kodebarang').val(barang.data.kode_barang)
            $('#statusbarang').val(barang.data.status)
            $('#stockbarang').val(barang.data.stock)
            $('#creditBarang').modal('show')
        }else{
            $('#title-modal').html(
                `<h1 class="mb-1">Tambah Barang</h1>
                <p>Tambah detail barang.</p>`
            )
            $('#idbarang').val('')
            $('#creditBarangForm')[0].reset()
            $('#creditBarang').modal('show')
        }
    }

    $('#btn-submit').on('click', async function(e){
        e.preventDefault()
        let data = {
            'idbarang' : $('#idbarang').val(),
            'namabarang' : $('#namabarang').val(),
            'hargabarang' : $('#hargabarang').val(),
            'kodebarang' : $('#kodebarang').val(),
            'statusbarang' : $('#statusbarang').val(),
            'stockbarang' : $('#stockbarang').val(),
        }
        let html = ''
        let submitBarang = await apiCaller('/api/stock-barang/store', 'POST', data)
        if(submitBarang.status == true){
            html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Disimpan!</strong> ${submitBarang.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }else{
            html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Gagal!</strong> ${submitBarang.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }
        $('#creditBarang').modal('hide')
        tableBarang.ajax.reload()
        $('#alert-report').html(html)
    })

    function deleteBarang(id){
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
                let remove = await apiCaller('/api/stock-barang/delete/'+id)
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
                tableBarang.ajax.reload()
            }
        });
    }
</script>
@endsection
