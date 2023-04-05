@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush
@push('scripts')
<script>
    @error('poin.*.*')
    $(document).Toasts('create', {
        title: 'Tidak Lengkap',
        body: '{{ $message }}',
        class: 'bg-danger',
        autohide: true,
        delay: 3000,
    });
    @enderror
</script>
@endpush
<x-app-layout title='checklist harian'>
    <form action="{{ route('checklist.harian.store', $mobil_tangki->id) }}" method="post">
        @csrf
        @foreach ($kategori as $kategori_item)
        <div class="row">
            <div class="col">
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
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title font-weight-bold">Catatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Tuliskan catatan disini" name="catatan" id="catatan"></textarea>
                            <small class="form-text text-danger">*isikan dengan "-" jika tidak ada</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mb-3">
            <div class="col-12 col-md-2">
                <input type="submit" class="btn btn-primary w-100" value="Submit">
            </div>
        </div>
    </form>
</x-app-layout>
