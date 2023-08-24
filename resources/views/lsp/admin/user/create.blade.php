@extends('lsp.layout.main-layout')
@section('custom-css')
@endsection

@section('title', 'Form Tambah User')
@section('content')

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('manage.user.proses-add') }}">
                        @csrf

                        {{-- GRID SYSTEM FORM --}}
                        {{-- https://getbootstrap.com/docs/4.0/layout/grid/#equal-width --}}
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Nama User:</label>
                                <input class="form-control form-control-sm" type="text" name="nama_user" id="nama_user"
                                    placeholder="Masukkan Nama User">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Username:</label>
                                <input class="form-control form-control-sm" type="text" name="username" id="username"
                                    placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Password:</label>
                                <input class="form-control form-control-sm" type="password" name="password" id="password"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                        {{-- [END] GRID SYSTEM FORM --}}

                        {{-- ACTION FORM --}}
                        <div class="row justify-content-center">
                            <div class="col-8 text-center">
                                <a href="{{ route('manage.user.index') }}" class="btn btn-secondary m-1 radius-30 px-5"><i
                                        class="bx bx-x me-1"></i>Batal</a>
                                <button type="submit" class="btn btn-primary m-1 radius-30 px-5 ml-auto"><i
                                        class="bx bx-save me-1"></i>Simpan</button>
                            </div>
                        </div>
                        {{-- [END] ACTION FORM --}}

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
