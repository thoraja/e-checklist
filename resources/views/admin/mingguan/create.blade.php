@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush
{{-- @push('scripts')
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
@endpush --}}
<x-app-layout title='checklist mingguan'>
    <form action="{{ route('checklist.mingguan.store', $mobil_tangki->id) }}" method="post">
        @csrf
        @foreach ($kategori as $kategori_item)

        <div class="row">
            <div class="col">
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
        <div class="row justify-content-end mb-3">
            <div class="col-12 col-md-2">
                <input type="submit" class="btn btn-primary w-100" value="Submit">
            </div>
        </div>
    </form>
</x-app-layout>
