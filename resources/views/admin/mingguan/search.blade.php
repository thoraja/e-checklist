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
    @isset($mobil_tangki)
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="list-group" id="result">
                @foreach ($mobil_tangki as $mobil_tangki_item)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <p class="font-weight-bold text-primary text-uppercase mb-0 h4">{{ $mobil_tangki_item->nomor_polisi }}</p>
                            <small class="text-secondary">{{ \carbon\carbon::now()->isoFormat('MMMM Y'); }}</small>
                        </div>
                        <div class="col-auto ml-auto align-self-center">
                            <a class="btn btn-primary" href="{{ route('checklist.mingguan.create', $mobil_tangki_item->id) }}">Buat</a>
                            <a class="btn btn-primary" href="{{ route('checklist.mingguan.show', $mobil_tangki_item->id) }}">Lihat</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endisset
</x-app-layout>
