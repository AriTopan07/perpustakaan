<div class="modal modal-lg modal-blur fade" id="modal_add" tabindex="-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data" id="create"
                name="create">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Data Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="judul" class="col-form-label text-secondary fw-semibold">Judul</label>
                        <div class="">
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sampul" class="col-form-label text-secondary fw-semibold">Sampul</label>
                            <div class="">
                                <input type="hidden" id="cover_id" name="cover_id" value="">
                                <input type="file" name="cover" id="cover" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <label for="isbn" class="col-form-label text-secondary fw-semibold">ISBN</label>
                            <div class="">
                                <input type="text" name="isbn" id="isbn" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="author_id" class="col-form-label text-secondary fw-semibold">Penulis</label>
                            <div class="">
                                <select name="author_id" id="author_id" class="form-control" required>
                                    <option value="">Pilih penulis</option>
                                    @foreach ($author as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="genre_id" class="col-form-label text-secondary fw-semibold">Genre</label>
                            <div class="">
                                <select type="text" name="genre_id" id="genre_id" class="form-control" required>
                                    <option value="">Pilih genre</option>
                                    @foreach ($genre as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="publisher" class="col-form-label text-secondary fw-semibold">Penerbit</label>
                            <div class="">
                                <input type="text" name="publisher" id="publisher" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="publish_year" class="col-form-label text-secondary fw-semibold">Tahun
                                Terbit</label>
                            <div class="">
                                <input type="text" name="publish_year" id="publish_year" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="bookshelves_id" class="col-form-label text-secondary fw-semibold">Rak
                                Buku</label>
                            <div class="">
                                <select type="text" name="bookshelves_id" id="bookshelves_id" class="form-control"
                                    required>
                                    <option value="">Pilih rak</option>
                                    @foreach ($rak as $item)
                                        <option value="{{ $item->id }}">{{ $item->genre_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="quantity" class="col-form-label text-secondary fw-semibold">Stok</label>
                            <div class="">
                                <input type="text" name="quantity" id="quantity" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" value="Simpan" class="btn btn-primary fw-bold">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>
