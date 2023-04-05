@php
    use Carbon\Carbon;
@endphp
<x-app-layout title="checklist mingguan">
    <div class="row">
        <div class="col">
            <div class="card card-outline card-primary mr-4">
                <div class="card-body">
                    <span class="text-primary font-weight-bold d-block">Nomor Polisi:</span>
                    <p class="font-weight-bold h3">{{ $mobil_tangki->nomor_polisi }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="timeline">
                @foreach ($mingguan_checklist->reverse() as $tanggal => $grouped_checklist)
                <div class="time-label">
                    <span class="bg-primary">{{ Carbon::parse($tanggal)->isoFormat('D MMMM Y') }}</span>
                </div>
                <div>
                    @foreach ($grouped_checklist as $checklist)
                    @php
                        $false_counter = $checklist->poin()->wherePivot('kondisi', 0)->count();
                    @endphp
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{ Carbon::parse($checklist->created_at)->isoFormat('hh:mm') }}</span>
                        <h3 class="timeline-header text-primary font-weight-bold">RIT {{ $checklist->rit }}</h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span><span class="text-primary font-weight-bold">AMT</span>: {{ $checklist->amt->nama }}</span>
                                </div>
                                <div class="col-md-3">
                                    <span><span class="text-primary font-weight-bold">PAMT</span>: {{ $checklist->pamt ? $checklist->pamt->nama : '-' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <span><span class="text-primary font-weight-bold">HSSE</span>: {{ $checklist->hsse ? $checklist->hsse->nama : '-'  }}</span>
                                </div>
                            </div>
                            @if (!$checklist->pamt)
                            <div class="row">
                                <div class="col">
                                    {{ $false_counter > 0 ? '>0' : '0' }}
                                    <a href="#"><small class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $false_counter }} poin perlu diperhatikan</small></a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="timeline-footer">
                            <button class="btn btn-primary btn-sm">Lihat</button>
                            <button type="submit" class="btn btn-warning btn-sm" form="konfirmasiChecklist">Konfirmasi</button>
                            <form action="{{ route('checklist.mingguan.confirm', $checklist->id) }}" id="konfirmasiChecklist" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
