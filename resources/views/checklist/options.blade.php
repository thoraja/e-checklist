<x-application-layout title="checklist">
    <section class="bg-light" style="height: 90vh">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold text-primary">HARIAN</h3>
                        </div>
                        <div class="card-body">
                            <span>Checklist harian yang dibuat oleh awak mobil tangki dan dibuat bersarkan rit perjalanan mobil tangki</span>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('checklist.harian.create') }}" class="btn btn-primary btn-sm float-right">Buat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold text-warning">MINGGUAN</h3>
                        </div>
                        <div class="card-body">
                            <span>Checklist mingguan yang dibuat oleh mekanik untuk menguji kelayakan jalan mobil tangki.</span>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('checklist.mingguan.create') }}" class="btn btn-warning btn-sm float-right">Buat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold text-danger">BULANAN</h3>
                        </div>
                        <div class="card-body">
                            <span>Checklist harian yang dibuat oleh mekanik untuk menguji keseluruhan kelayakan mobil tangki</span>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('checklist.bulanan.create') }}" class="btn btn-danger btn-sm float-right">Buat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-application-layout>
