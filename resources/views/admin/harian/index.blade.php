<x-app-layout title="checklist harian">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <form action="{{ route('checklist.harian.search') }}" method="get">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="nomor_polisi" placeholder="Nomor polisi ..." value="{{ old('nomor_polisi') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
