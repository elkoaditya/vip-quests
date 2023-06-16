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
        var table = $('#table-vip').DataTable({
            'iDisplayLength': 150
        });
    </script>
@endsection
{{----------------------------------------------------------------------}}
@section('body')
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <x-modal-button id="create-vip" >
                    <button  class="btn btn-success me-3">Add Vip</button>
                </x-modal-button>
                <x-modal-button id="import-vip">
                    <button  class="btn btn-info">Import Vip</button>
                </x-modal-button>
            </div>
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
                                <?php
                                    $values = [
                                        'id' => $quest->id,
                                    ];
                                ?>
                                <x-modal-button id="show-vip" :values="$values" >
                                    <button class="btn btn-success">Show Welcome</button>
                                </x-modal-button>
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
    <x-modal id="import-vip" header="Import Tamu VIP by Excel" body="Silahkan download template dibawah ini dan upload ulang">
        <a href="/template.xlsx" class="btn btn-success m-2 mb-3">Download Template</a>
        <form method="post" action="/admin/home/import-vip" novalidate enctype="multipart/form-data">@csrf
            <x-input type="file" name="file" placeholder="Upload Excel" />
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-info me-sm-3 me-1">Import</button>
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
    <x-modal id="show-vip" header="Run VIP" body="Silahkan pilih jenis panggilan">
        <form method="post" action="/admin/home/show-vip">@csrf
            <x-input type="hidden" name="id" id="id" />
            <div class="form-check">
                <input class="form-check-input" type="radio" name="panggilan" id="flexRadioDefault1" value="Ibu">
                <label class="form-check-label" for="flexRadioDefault1">
                    Ibu
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="panggilan" id="flexRadioDefault2" value="Bapak">
                <label class="form-check-label" for="flexRadioDefault2">
                    Bapak
                </label>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-info me-sm-3 me-1">Import</button>
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



