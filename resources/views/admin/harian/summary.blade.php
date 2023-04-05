@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script>
    $("#tanggalFilter").datepicker({
        format: 'd MM yyyy',
        language: 'id',
        todayHighlight: true,
        autoclose: true,
    });
    $("#tanggalHiddenFilter").datepicker({
        format: 'yyyy-mm-dd'
    });
    $("#tanggalFilter").datepicker('setDate', new Date('{{ app('request')->input('tanggal') ? app('request')->input('tanggal') : now() }}'));
    $("#tanggalHiddenFilter").datepicker('setDate', new Date('{{ app('request')->input('tanggal') ? app('request')->input('tanggal') : now() }}'));
    $("#tanggalFilter").on('changeDate',function() {
        $("#tanggalHiddenFilter").datepicker('setDate', $(this).datepicker('getDate'));
    })
</script>
@endpush
<x-app-layout title="checklist harian">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="tanggalFilter">
                                <input type="hidden" id="tanggalHiddenFilter" name="tanggal" form="filterForm">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group mt-2 mb-0 ml-1">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="showAll" name="all" form="filterForm" value="1" {{ app('request')->input('all') ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="showAll">Tampilkan semua checklist</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('checklist.harian.summary') }}" method="get" id="filterForm">
                                <button class="btn btn-primary" type="submit">Terapkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="list-group">
                @foreach ($checklist as $checklist_item)
                @php
                    $false_counter = $checklist_item->poin()->wherePivot('kondisi', 0)->count();
                @endphp
                @if (app('request')->input('all') || $false_counter > 0)
                <div class="list-group-item" type="button" data-toggle="collapse" data-target="#checklist{{ $checklist_item->id }}" aria-expanded="false" aria-controls="checklist{{ $checklist_item->id }}">
                    <div class="col-auto">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 h4">{{ $checklist_item->mobil_tangki->nomor_polisi }} | RIT: {{ $checklist_item->rit }}</p>
                        @if ($false_counter > 0)
                        <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $false_counter }} poin perlu diperhatikan</small>
                        @endif
                    </div>
                </div>
                <div class="collapse" id="checklist{{ $checklist_item->id }}">
                    <div class="list-group-item bg-light">
                        <span class="text-primary font-weight-bold">Catatan:</span>
                        <span>{{ $checklist_item->catatan }}</span><br>
                        @if ($false_counter > 0)
                        <span class="font-weight-bold text-danger">Poin yang perlu diperhatikan:</span><br>
                        @foreach ($checklist_item->poin()->wherePivot('kondisi', 0)->get()->groupBy('kategori.nama') as $kategori_nama => $grouped_poin_item)
                        <span>{{ $kategori_nama }}</span>
                        <ol>
                            @foreach ($grouped_poin_item as $poin_item)
                            <li>{{ $poin_item->deskripsi }}</li>
                            @endforeach
                        </ol>
                        @endforeach
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
