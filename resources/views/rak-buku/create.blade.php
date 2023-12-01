<div class="modal modal-blur fade" id="modal_add" tabindex="-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('rak-buku.store') }}" enctype="multipart/form-data" id="create"
                name="create">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Rak Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="vover" class="col-sm-3 col-form-label text-secondary fw-semibold">Cover</label>
                        <div class="col-sm-9">
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre_id" class="col-sm-3 col-form-label text-secondary fw-semibold">Genre</label>
                        <div class="col-sm-9">
                            <select name="genre_id" id="genre_id" class="form-control">
                                <option value="">Pilih genre</option>
                                @foreach ($data_genre as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
