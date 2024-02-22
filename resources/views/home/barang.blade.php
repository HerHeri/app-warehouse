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
                                    <h4 class="card-title">Daftar Barang</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="creditUser()">Tambah Barang</button>
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

<!-- Credit Modal users -->
<div class="modal fade" id="creditUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content p-2">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-2 pt-50">
                <div class="text-center mb-2" id="title-modal">
                    <h1 class="mb-1">Edit Notification</h1>
                    <p>Updating notification details.</p>
                </div>
                <form id="creditUserForm" class="row gy-1 pt-75" action="javascript:void(0)">
                    @csrf
                    <input type="hidden" id="id-notif" name="notifid">
                    <div class="col-12">
                        <label class="form-label" for="modalcreditUserName">Nama users</label>
                        <input type="text" id="notifname" name="notifname" class="form-control" placeholder="Nama users" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="notifstatus">Status</label>
                        <select id="notifstatus" name="notifstatus" class="form-select" aria-label="Default select example">
                            <option readonly>Pilih Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="notifmessage">Pesan Notifikasi</label>
                        <textarea class="form-control" name="pesannotif" id="pesannotif" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="button" id="btn-submit-notif" class="btn btn-primary me-1">Submit</button>
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
                    let btnremove = `<button class="btn btn-primary btn-sm d-flex" onclick="removeUser('${row.id}')"><i class="fa fa-trash" style="font-size: 28px;"></i> <span> Remove</span></button>`
                    let btncredit = `<button onclick="creditUser('${row.id}')" class="btn btn-success btn-sm d-flex"><i class="fa fa-eye" style="font-size: 28px;"></i><span> Edit</span></button>`
                    return `<div class="d-flex justify-content-center">
                            ${btnremove} ${btncredit}
                        </div>`
                }
            }
        ]
    });

    function creditUser(id){
        if(id){
            $('#title-modal').html(
                `<h1 class="mb-1">Edit Notification</h1>
                <p>Updating notification details.</p>`
            )
            $.ajax({
                url: location.href + '?id=' + id,
                success: function(res){
                    $('#creditUser').modal('show')
                    $('#id-notif').val(res.id)
                    $('#notifname').val(res.name)
                    $('#deviceid').val(res.device_id)
                    $('#notifstatus').val(res.status)
                    $('#pesannotif').val(res.message)
                }
            })
        }else{
            $('#title-modal').html(
                `<h1 class="mb-1">Create Notification</h1>
                <p>Creating notification details.</p>`
            )
            $('#creditUserForm')[0].reset()
            $('#creditUser').modal('show')
        }
    }

    $('#btn-submit-notif').on('click', function(e){
        e.preventDefault()
        let data = {
            'notifid' : $('#id-notif').val(),
            'notifname' : $('#notifname').val(),
            'deviceid' : $('#deviceid').val(),
            'notifstatus' : $('#notifstatus').val(),
            'message' : $('#pesannotif').val()
        }
        $.ajax({
            url: location.origin + '/notification/store',
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                tableBarang.ajax.reload()
                $('#creditUser').modal('hide')
                console.log(response);
            },
            error: function(response){
                console.log('error :'+ response);
            }
        })
    })

    function removeUser(id){
        $.ajax({
            url: location.origin + '/notification/remove?id=' + id,
            method: 'GET',
            success: function(response){
                tableBarang.ajax.reload()
                console.log(response);
            },
            error: function(response){
                console.log('error :'+ response);
            }
        })
    }
</script>
@endsection
