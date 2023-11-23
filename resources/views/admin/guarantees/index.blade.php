@extends('admin.layouts.main', ['title' => 'Garansi', 'menu' => 'guarantees', 'submenu' => 'guarantee-list'])

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="card-title card-title-dash">Garansi</h4>
                            </div>
                            <div>
                                <a href="{{ route('guarantee_create') }}" class="btn btn-primary btn-sm">+ Tambah
                                    Garansi</a>
                            </div>
                        </div>
                        <div class="table-responsive  mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Nama Produk</th>
                                        <th>Garansi Berakhir</th>
                                        <th style="width: 10%">Diupdate</th>
                                        <th class="w-25 text-end">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="form-delete" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Peringatan!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                order: [
                    [3, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('guarantee_list') }}",
                columns: [{
                        data: 'serial_number',
                        name: 'serial_number'
                    },
                    {
                        data: 'product.name',
                        name: 'product.name'
                    },
                    {
                        data: 'expired_date',
                        name: 'expired_date'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'updated_at',
                        // orderable: false,
                        // searchable: false
                    },
                ]
            });
        });

        $(document).on("click", ".btn-delete", function(e) {
            e.preventDefault()
            let url = $(this).data('url');
            $(".form-delete").attr('action', url);
        });
    </script>
@endsection
