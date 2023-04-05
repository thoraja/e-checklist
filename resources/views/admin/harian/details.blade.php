@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush
<x-app-layout title='checklist harian'>
    @foreach ($harian_checklist_poin as $kategori_nama => $poin)
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title font-weight-bold">{{ $kategori_nama }}</h4>
                </div>
                <div class="card-body">
                    @if ($loop->index == 2)
                    <div class="row">
                        @foreach ($poin as $poin_item)
                        <div class="form-group col-md-6">
                            <label>{{ $poin_item->deskripsi }}</label>
                            <input type="number" min="0" class="form-control" value="{{ $poin_item->pivot->kondisi }}" disabled>
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
                            @foreach ($poin as $poin_item)
                            <tr>
                                <td class="{{ $poin_item->pivot->kondisi == 0 ? 'table-danger' : '' }}">{{ $loop->index + 1 }}</td>
                                <td class="{{ $poin_item->pivot->kondisi == 0 ? 'table-danger' : '' }}">{{ $poin_item->deskripsi }}</td>
                                <td class="{{ $poin_item->pivot->kondisi == 0 ? 'table-danger' : 'table-success' }}" width="1%">
                                    <div class="icheck-success icheck-inline ml-2">
                                        <input type="radio" value="1" {{ $poin_item->pivot->kondisi == 1 ? 'checked' : '' }} disabled/>
                                        <label></label>
                                    </div>
                                </td>
                                <td class="table-danger" width="1%">
                                    <div class="icheck-danger icheck-inline ml-2">
                                        <input type="radio" value="0"  {{ $poin_item->pivot->kondisi == 0 ? 'checked' : '' }} disabled/>
                                        <label></label>
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
</x-app-layout>
