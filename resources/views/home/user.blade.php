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
                        <h2 class="content-header-title float-start mb-0">Users</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ url('users') }}">User</a></li>
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
                                    <h4 class="card-title">Daftar User</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="creditUser()">Tambah User</button>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="demo-spacing-0" id="alert-report"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table-users">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kontak</th>
                                                <th>Role</th>
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

<!-- Credit Modal users -->
<div class="modal fade" id="creditUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content p-2">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-2 pt-50">
                <div class="text-center mb-2" id="title-modal">
                    <h1 class="mb-1">Edit User</h1>
                    <p>Updating user details.</p>
                </div>
                <form id="creditUserForm" class="row gy-1 pt-75" action="javascript:void(0)">
                    @csrf
                    <input type="hidden" id="iduser" name="iduser">
                    <div class="col-12">
                        <label class="form-label" for="nameuser">Nama user</label>
                        <input type="text" id="nameuser" name="nameuser" class="form-control" placeholder="Nama user" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="emailuser">Email user</label>
                        <input type="text" id="emailuser" name="emailuser" class="form-control" placeholder="Nama user" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="statususer">Status</label>
                        <select id="statususer" name="statususer" class="form-select" aria-label="Default select example">
                            <option readonly>Pilih Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="roleuser">Role</label>
                        <select id="roleuser" name="roleuser" class="form-select" aria-label="Default select example">
                            <option readonly>Pilih Status</option>
                            <option value="1">Admin</option>
                            <option value="2">Keeper</option>
                            <option value="3">Staff</option>
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
    var tableUsers = $('#table-users').DataTable({
        serverSide: true,
        processing: 'Loading ...',
        ajax: {
            url: location.origin + '/api/users',
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
                data: 'judul',
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                        <h6 class="mb-0">${row.name ?? ''}</h6>
                    </div>`
                }
            },
            {
                data: 'deskripsi_singkat',
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div class="d-flex flex-column">
                        ${row.email ?? ''}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    return `<div>
                        ${row.role?.role_name ?? 'User'}
                    </div>`
                }
            },
            {
                defaultContent: '-',
                className: 'text-center',
                render: (data, type, row, meta) => {
                    if(row.status == 1){
                        notifstatus = `<span class="text-success">ACTIVE</span>`
                    }else{
                        notifstatus = `<span class="text-danger">NOT ACTIVE</span>`
                    }

                    return `<div class="d-flex flex-column">
                            ${notifstatus}
                        </div>`
                }
            },
            {
                orderable: false,
                className: 'text-center',
                render: (data, type, row, meta) => {
                    let btnremove = `<button class="btn btn-danger btn-sm d-flex" onclick="deleteUser('${row.id}')"><i class="fa fa-trash" style="font-size: 28px;"></i> <span> Remove</span></button>`
                    let btncredit = `<button onclick="creditUser('${row.id}')" class="btn btn-success btn-sm d-flex me-1"><i class="fa fa-eye" style="font-size: 28px;"></i><span> Edit</span></button>`
                    return `<div class="d-flex justify-content-center">
                        ${btncredit} ${btnremove}
                        </div>`
                }
            }
        ]
    });

    async function creditUser(id){
        if(id){
            $('#title-modal').html(
                `<h1 class="mb-1">Edit User</h1>
                <p>Updating user details.</p>`
            )
            let user = await apiCaller('/api/users/credit/'+id)
            $('#creditUser').modal('show')
            $('#iduser').val(user.data.id)
            $('#nameuser').val(user.data.name)
            $('#statususer').val(user.data.status)
            $('#roleuser').val(user.data.role_id)
            $('#emailuser').val(user.data.email)
            $('#emailuser').attr('readonly', 'readonly')
        }else{
            $('#title-modal').html(
                `<h1 class="mb-1">Create User</h1>
                <p>Creating user details.</p>`
            )
            $('#iduser').val('')
            $('#creditUserForm')[0].reset()
            $('#emailuser').removeAttr('readonly', 'readonly')
            $('#creditUser').modal('show')
        }
    }

    $('#btn-submit').on('click', async function(e){
        e.preventDefault()
        let data = {
            'iduser' : $('#iduser').val(),
            'nameuser' : $('#nameuser').val(),
            'statususer' : $('#statususer').val(),
            'roleuser' : $('#roleuser').val(),
            'emailuser' : $('#emailuser').val()
        }
        let submitUser = await apiCaller('/api/users/store', 'POST', data)
        if(submitUser.status == true){
            html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Disimpan!</strong> ${submitUser.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }else{
            html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>Gagal!</strong> ${submitUser.message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
        }
        $('#creditUser').modal('hide')
        tableUsers.ajax.reload()
        $('#alert-report').html(html)
    })

    function deleteUser(id){
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
                let remove = await apiCaller('/api/users/delete/'+id)
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
            }
        })
    }
</script>
@endsection
