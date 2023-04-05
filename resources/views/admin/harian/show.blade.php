@php
    use Carbon\Carbon;
@endphp
<x-app-layout title="checklist harian">
    <div class="row">
        <div class="col">
            <div class="card card-outline card-primary mr-4">
                <div class="card-body">
                    <span class="text-primary font-weight-bold d-block">Nomor Polisi:</span>
                    <span class="font-weight-bold d-block h3">{{ $mobil_tangki->nomor_polisi }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-7 col-md-3">
            <select class="custom-select" id="bulanFilter" form="filterForm" name="bulan">
                @foreach ($filter['bulan'] as $bulan_angka => $bulan_nama)
                <option value="{{ $bulan_angka }}" {{ $bulan_angka == (app('request')->input('bulan') ? app('request')->input('bulan') : now()->month) ? 'selected' : '' }}>{{ $bulan_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-5 col-md-2">
            <select class="custom-select" id="tahunFilter" form="filterForm" name="tahun">
                @foreach ($filter['tahun'] as $tahun)
                <option value="{{ $tahun }}" {{ $tahun == (app('request')->input('tahun') ? app('request')->input('tahun') : now()->year) ? 'selected' : '' }}>{{ $tahun }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <form action="{{ route('checklist.harian.show', $mobil_tangki->id)}}" method="get" id="filterForm">
                <button type="submit" class="btn btn-primary">Lihat</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="timeline">
                @foreach ($harian_checklist->reverse() as $tanggal => $grouped_checklist)
                <div class="time-label">
                    <span class="bg-primary">{{ Carbon::parse($tanggal)->isoFormat('D MMMM Y') }}</span>
                </div>
                <div>
                    @foreach ($grouped_checklist as $checklist_item)
                    @php
                        $false_counter = $checklist_item->poin()->wherePivot('kondisi', 0)->count();
                    @endphp
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{ Carbon::parse($checklist_item->created_at)->isoFormat('hh:mm') }}</span>
                        <h3 class="timeline-header text-primary font-weight-bold">RIT {{ $checklist_item->rit }}</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <span><span class="text-primary font-weight-bold">AMT:</span> {{ $checklist_item->amt->nama }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span><span class="text-primary font-weight-bold">Pengawas AMT:</span> {{ $checklist_item->pengawas_amt ? $checklist_item->pengawas_amt->nama : '-' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span><span class="text-primary font-weight-bold">HSSE:</span> {{ $checklist_item->hsse ? $checklist_item->hsse->nama : '-'  }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="text-primary font-weight-bold">Catatan:</span>
                                    <span>{{ $checklist_item->catatan }}</span>
                                </div>
                            </div>
                            @if ($false_counter > 0)
                            <div class="row">
                                <div class="col">
                                    <small class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $false_counter }} poin perlu diperhatikan</small>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="timeline-footer">
                            <a href="{{ route('checklist.harian.details', $checklist_item->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                            @if (!$checklist_item->pengawas_amt)
                            <button type="submit" class="btn btn-warning btn-sm" form="konfirmasiChecklist">Konfirmasi</button>
                            <form action="{{ route('checklist.harian.confirm', $checklist_item->id) }}" id="konfirmasiChecklist" method="POST">
                                @csrf
                                <input type="hidden" name="checklist_id" value="{{ $checklist_item->id }}">
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
