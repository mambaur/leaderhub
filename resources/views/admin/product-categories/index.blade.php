@extends('admin.layouts.main', ['title' => 'Kategori Produk', 'menu' => 'categories', 'submenu' => 'product-category-list'])

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Kategori</h4>
                                <p class="card-subtitle card-subtitle-dash">Kategori Produk</p>
                            </div>
                            <div>
                                <a href="{{ route('product_category_create') }}" class="btn btn-primary btn-sm">+ Tambah
                                    Kategori</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th class="w-50">Nama</th>
                                        <th>Dibuat</th>
                                        <th>Diupdate</th>
                                        <th class="w-25 text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_categories as $item)
                                        <tr>
                                            <td>
                                                <h6>{{ $item->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->created_at->format('Y-m-d h:i:s') }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->updated_at->format('Y-m-d h:i:s') }}</h6>
                                            </td>
                                            <td class="text-end">
                                                <a class="btn btn-primary py-1"
                                                    href="{{ route('product_category_edit', $item->id) }}">
                                                    Edit</a>
                                                <a href="#" class="btn btn-danger btn-delete py-1"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-url="{{ route('product_category_delete', $item->id) }}">
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
                    [2, 'desc']
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
