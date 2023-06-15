@extends('assets.body')
{{----------------------------------------------------------------------}}
@section('css')
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
@endsection
{{----------------------------------------------------------------------}}
@section('js')
    <script src="{{asset('material')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script>
        var table = $('#table-vip').DataTable({});
    </script>
@endsection
{{----------------------------------------------------------------------}}
@section('body')
    <div class="card">
        <div class="card-body">
            <x-modal-button id="create-vip" >
                <button  class="btn btn-success">Add Vip</button>
            </x-modal-button>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table table-bordered" id="table-vip">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1; ?>
                    @foreach($quests as $quest)
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{$quest->name}}</td>
                            <td>{{$quest->jabatan}}</td>
                            <td>
                                <x-sweet-alert
                                    title="Logout"
                                    text="Apakah anda yakin untuk logout"
                                    icon="info"
                                    confirmtext="Logout"
                                    confirmcolor="success"
                                    confirmicon="success"
                                    confirmresult="Anda berhasil logout"
                                    canceltext="batal"
                                    cancelcolor="danger"
                                    cancelicon="warning"
                                    cancelresult="batal logout"
                                    redirect="/admin/home"
                                    url="/admin/home/show-vip"
                                    :body="[
                                        'id' => $quest->id,
                                    ]"
                                >
                                    <button class="btn btn-success">Show Welcome</button>
                                </x-sweet-alert>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal id="create-vip" header="Tambah tamu VIP" body="Silahkan isi form dibawah ini untuk menambah tamu vip">
        <form method="post" action="/admin/home/add-vip" novalidate>@csrf
            <x-input type="text" name="name" placeholder="Nama tamu VIP" />
            <x-input type="text" name="jabatan" placeholder="Jabatan tamu VIP" />
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan</button>
                <button
                    type="reset"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    Cancel
                </button>
            </div>
        </form>
    </x-modal>
@endsection



