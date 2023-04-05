@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

<x-application-layout>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h3 class="font-weight-bold">Checklist Bulanan</h3>
            </div>
        </div>
        <form action="{{ route('checklist.bulanan.store', $mobil_tangki->id) }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Informasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nomorPolisi">Nomor Polisi</label>
                                <input type="text" name="nomor_polisi" class="form-control" id="nomorPolisi" value="{{ $mobil_tangki->nomor_polisi }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="{{ now()->isoFormat('DD MMMM YYYY') }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kmODO">KM ODO</label>
                                <input type="number" name="km_odo" class="form-control" id="kmODO" value="{{ old('km_odo') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title font-weight-bold">Identitas Pengisi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaMekanik">Nama Mekanik</label>
                                <input type="text" name="nama[mekanik]" class="form-control" id="namaMekanik" value="{{ old('nama.mekanik') }}">
                            </div>
                            <div class="form-group">
                                <label for="namaSupervisor">Nama Supervisor</label>
                                <input type="text" name="nama[supervisor]" class="form-control" id="namaSupervisor" value="{{ old('nama.supervisor') }}">
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
                                    @foreach ($kategori_item->sub_kategori as $sub_kategori_item)
                                    <tr>
                                        <td colspan="4" class="bg-secondary font-weight-bold"> {{ $sub_kategori_item->nama }}</td>
                                    </tr>
                                    @foreach ($sub_kategori_item->poin as $poin_item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $poin_item->deskripsi }}</td>
                                        <td class="table-success" width="1%">
                                            <div class="icheck-success icheck-inline ml-2">
                                                <input type="radio" style="margin: 0 !important" name="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]" id="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]1" value="1" {{ old("poin.$sub_kategori_item->id.$poin_item->id") === '1' ? 'checked' : '' }}/>
                                                <label for="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]1"></label>
                                            </div>
                                        </td>
                                        <td class="table-danger" width="1%">
                                            <div class="icheck-danger icheck-inline ml-2">
                                                <input type="radio" name="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]" id="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]0" value="0" {{ old("poin.$sub_kategori_item->id.$poin_item->id") === '0' ? 'checked' : '' }}/>
                                                <label for="poin[{{ $sub_kategori_item->id }}][{{ $poin_item->id }}]0"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row justify-content-center mb-3">
                <div class="col-md-10 col-lg-8">
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
