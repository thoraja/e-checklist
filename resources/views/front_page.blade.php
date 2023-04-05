<x-application-layout>
    <section class="bg-gray py-5" style="height: 90vh">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-lg-2">
                    <img src="{{ asset('img/pertamina.png') }}" alt="Pertamina Logo" class="w-100">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col text-center">
                    <h1 class="display-4 font-weight-bold">E-CHECKLIST</h1>
                    <p class="lead">Pertamina Fuel Terminal Boyolali</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10 col-lg-6">
                    <div class="input-group input-group-lg" id="searchField">
                        <input type="text" id="nomorPolisiInput" class="form-control" name="nomor_polisi" placeholder="Contoh: B 1234 EX" value="{{ old('nomor_polisi') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="searchButton"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-sm-10 col-lg-6">
                    <div class="collapse" id="passwordField">
                        <input type="password" id="passwordInput" class="form-control" name="password" placeholder="Password" required>
                        <div class="custom-control custom-switch mt-1">
                            <input type="checkbox" class="custom-control-input" id="showPassword" autocomplete="off">
                            <label class="custom-control-label" for="showPassword">Tampilkan Password</label>
                          </div>
                        <button class="btn btn-primary mt-1 w-100" id="requestAccessButton">Masuk</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $("#showPassword").change(function () {
            if ($("#passwordInput").attr("type") == "password") {
                $("#passwordInput").attr("type", "text");
            } else {
                $("#passwordInput").attr("type", "password");
            }
        })
        $("#nomorPolisiInput").keypress(function(e){
            if(e.which == 13) {
                $('#searchButton').click();
            }
        });
        $("#passwordInput").keypress(function(e){
            if(e.which == 13) {
                $('#requestAccessButton').click();
            }
        });
        $("#searchButton").click(function () {
            $.ajax({
                method: "GET",
                url: "{{ route('mobil_tangki.search') }}",
                data: {
                    nomor_polisi: $("#nomorPolisiInput").val()
                }
            }).done(function(result) {
                if(result.isFound) {
                    $("#nomorPolisiInput").prop("readonly", true);
                    $("#searchButton").prop("disabled", true);
                    $("#passwordField").collapse();
                } else {
                    $("#searchField").effect("shake", {times: 3}, 100);
                    $("#nomorPolisiInput").addClass("is-invalid").delay(1000).queue(function(next){
                        $(this).removeClass("is-invalid");
                        next();
                    });
                }
            });
        });
        $("#requestAccessButton").click(function () {
            $.ajax({
                method: "POST",
                url: "{{ route('mobil_tangki.request_access') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    nomor_polisi: $("#nomorPolisiInput").val(),
                    password: $("#passwordInput").val(),
                }
            }).done(function(result) {
                if(result.status == 'granted') {
                    window.location.replace("{{ route('checklist.options') }}");
                } else {
                    $("#passwordInput").effect("shake", {times: 3}, 100);
                    $("#passwordInput").addClass("is-invalid").delay(1000).queue(function(next){
                        $(this).removeClass("is-invalid");
                        next();
                    });
                }
            });
        });
    </script>
    @endpush
</x-application-layout>
