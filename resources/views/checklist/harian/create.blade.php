@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush
<x-application-layout title='checklist harian'>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h3 class="font-weight-bold">Checklist Harian</h3>
            </div>
        </div>
        <form action="{{ route('checklist.harian.store') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Identitas Mobil Tangki</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nomorPolisi">Nomor Polisi</label>
                                <input type="text" name="nomor_polisi" class="form-control" id="nomorPolisi" value="{{ $mobil_tangki->nomor_polisi }}" disabled>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" name="tanggal" class="form-control" id="tanggal" value="{{ now()->isoFormat('DD MMMM YYYY') }}" disabled>
                                    </div>
                                    <div class="col-2">
                                        <label for="rit">Rit</label>
                                        <input type="text" name="rit" class="form-control" id="rit" value="{{ $mobil_tangki->harian_checklist()->whereDate('tanggal', now())->count() + 1 }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Identitas AMT</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaAMT">Nama AMT</label>
                                <input type="text" name="nama_amt" class="form-control" id="namaAMT" value="{{ old('nama_amt') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($kategori as $kategori_item)
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">{{ $kategori_item->nama }}</h4>
                        </div>
                        <div class="card-body">
                            @if ($loop->index == 2)
                            <div class="row">
                                @foreach ($kategori_item->poin as $poin)
                                <div class="form-group col-md-6">
                                    <label for="poin[{{ $kategori_item->id }}][{{ $poin->id }}]1">{{ $poin->deskripsi }}</label>
                                    <input type="number" id="poin[{{ $kategori_item->id }}][{{ $poin->id }}]" min="0" name="poin[{{ $kategori_item->id }}][{{ $poin->id }}]" class="form-control" value="{{ old("poin.$kategori_item->id.$poin->id") }}">
                                    <small class="form-text text-danger">*isikan dengan "0" jika tidak ada</small>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th width="1%" rowspan="2" class="align-middle">No.</th>
                                        <th width="80%" rowspan="2" class="align-middle">Deskripsi</th>
                                        <th width="19%" colspan="2">Kondisi</th>
                                    </tr>
                                    <tr>
                                        <th><i class="fas fa-check"></i></th>
                                        <th><i class="fas fa-times"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori_item->poin as $poin)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $poin->deskripsi }}</td>
                                        <td class="table-success" width="1%">
                                            <div class="icheck-success icheck-inline ml-2">
                                                <input type="radio" style="margin: 0 !important" name="poin[{{ $kategori_item->id }}][{{ $poin->id }}]" id="poin[{{ $kategori_item->id }}][{{ $poin->id }}]1" value="1" {{ old("poin.$kategori_item->id.$poin->id") === '1' ? 'checked' : '' }}/>
                                                <label for="poin[{{ $kategori_item->id }}][{{ $poin->id }}]1"></label>
                                            </div>
                                        </td>
                                        <td class="table-danger" width="1%">
                                            <div class="icheck-danger icheck-inline ml-2">
                                                <input type="radio" name="poin[{{ $kategori_item->id }}][{{ $poin->id }}]" id="poin[{{ $kategori_item->id }}][{{ $poin->id }}]0" value="0" {{ old("poin.$kategori_item->id.$poin->id") === '0' ? 'checked' : '' }}/>
                                                <label for="poin[{{ $kategori_item->id }}][{{ $poin->id }}]0"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Catatan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Tuliskan catatan disini ..." name="catatan" id="catatan">{{ old('catatan') }}</textarea>
                                <small class="form-text text-danger">*isikan dengan "-" jika tidak ada</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-6 col-md-3 col-lg-2">
                    <input type="submit" class="btn btn-primary w-100" value="Submit">
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
    <script>
        @if($errors->any())
        $(document).Toasts('create', {
            title: 'Tidak Sesuai',
            body: 'Harap periksa kembali kelengkapan dan kesesuaian checklist',
            class: 'bg-danger',
            autohide: true,
            delay: 5000,
        });
        @endif
    </script>
@endpush
</x-application-layout>
