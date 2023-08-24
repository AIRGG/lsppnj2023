<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PMB</title>
    <!--favicon-->
    <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="/assets/css/app.css" />
</head>

<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-12">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        {{-- <img src="/assets/images/logo-pnj.png" width="150" alt=""> --}}
                                        <h3 class="mt-4 font-weight-bold">-</h3>
                                        @if (\Session::has('error'))
                                            <div class="alert alert-danger border-0 bg-danger fade show">
                                                <div class="text-white">{!! \Session::get('error') !!}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="">
                                        <div class="form-body">
                                            <form class="row g-3" action="{{ route('landing.proses.daftar') }}"
                                                method="POST">
                                                @csrf
                                                <div class="col-12">
                                                    <label class="form-label">Nama</label>
                                                    <input required name="username" type="text" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Alamat KTP</label>
                                                    <textarea required name="alamat_ktp" cols="30" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Alamat Domisili</label>
                                                    <textarea required name="alamat_domisili" cols="30" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Provinsi</label>
                                                    <select required name="id_provinsi" class="form-control">
                                                        <option value="a">AA</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Kota/Kabupaten</label>
                                                    <select required name="id_kotkab" class="form-control">
                                                        <option value="a">AA</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Kecamatan</label>
                                                    <select required name="id_kecamatan" class="form-control">
                                                        <option value="a">AA</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Notelp</label>
                                                    <input required name="notelp" type="text" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">NoHp</label>
                                                    <input required name="nohp" type="text" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input required name="email" type="email" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Kewarganegaraan</label>
                                                    <input required name="kewarganegaraan" type="text"
                                                        class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Jika WNA Silahkan tulis asal
                                                        negara</label>
                                                    <input required name="kewarganegaraan_neagra" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label">Tgl Lahir</label>
                                                    <input required name="tbl_lahir" type="date"
                                                        class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Tempat Lahir</label>
                                                    <input required name="tempate_lahir" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label">Provinsi Lahir</label>
                                                    <select required name="id_provinsi_lahir" class="form-control">
                                                        <option value="a">AA</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Kota/Kabupaten Lahir</label>
                                                    <select required name="id_kotkab_lahir" class="form-control">
                                                        <option value="a">AA</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Jika WNA Silahkan tulis asal
                                                        negara</label>
                                                    <input required name="negara" type="text"
                                                        class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Jenis Kelamin:</label>
                                                    <br>
                                                    <input id='jkl' type="radio" name="jk"
                                                        value="l"> <label for="jkl">Laki- Laki</label>
                                                    <input id='jkp' type="radio" name="jk"
                                                        value="p"> <label for="jkp">Perempuan</label>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Sudah Menikah?:</label>
                                                    <br>
                                                    <input id="menikah0" type="radio" name="menikah"
                                                        value="0"> <label for="menikah0">Belum</label>
                                                    <input id="menikah1" type="radio" name="menikah"
                                                        value="1"> <label for="menikah1">Sudah</label>
                                                    <input id="menikah2" type="radio" name="menikah"
                                                        value="2"> <label for="menikah2">Duda/Janda</label>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Agama</label>
                                                    <select required name="agama" class="form-control">
                                                        <option value="ISLAM">ISLAM</option>
                                                        <option value="KRISTEN">KRISTEN</option>
                                                        <option value="KATHOLIK">KATHOLIK</option>
                                                        <option value="HINDU">HINDU</option>
                                                        <option value="BUDDHA">BUDDHA</option>
                                                        <option value="LAIN">Lain-Lain</option>
                                                    </select>
                                                </div>

                                                {{-- DAFTAR --}}
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit"
                                                            class="btn btn-primary"></i>Daftar</button>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <a href="{{ route('landing.index') }}"><i
                                                            class="bx bxs-chevron-right"></i> Login
                                                        disini..</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

<!--plugins-->
<script src="/assets/js/jquery.min.js"></script>
<!--Password Show & Hide JS -->
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

</html>
