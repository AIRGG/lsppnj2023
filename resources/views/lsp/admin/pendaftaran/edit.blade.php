@extends('lsp.layout.main-layout')
@section('custom-css')
@endsection

@section('title', 'Form Pendaftaran')
@section('content')
    <div class="row">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show">
                    <div class="text-white">{{ Session::get('alert-' . $msg) }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('manage.pendaftaran.proses-edit') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input required name="oldid" type="hidden" class="form-control" value="{{ $data->id_user }}">


                        {{-- GRID SYSTEM FORM --}}
                        {{-- https://getbootstrap.com/docs/4.0/layout/grid/#equal-width --}}

                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Nama</label>
                                <input required name="nama_user" type="text" class="form-control"
                                    value="{{ $data->nama_user }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Alamat KTP</label>
                                <textarea required name="alamat_ktp" cols="30" rows="3" class="form-control">{{ $data->alamat_ktp }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Alamat Domisili</label>
                                <textarea required name="alamat_domisili" cols="30" rows="3" class="form-control">{{ $data->alamat_domisili }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Provinsi</label>
                                <select required name="id_provinsi" class="form-control"
                                    onchange="handleOnChangeDropdown(this.value, 'kabupaten', 'id_kabupaten')"
                                    value="{{ $data->id_provinsi }}">
                                    @foreach ($dataProvinsi as $key => $val)
                                        <option @if ($data->id_provinsi == $val->id) selected @endif
                                            value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Kota/Kabupaten</label>
                                <select required name="id_kabupaten" class="form-control"
                                    onchange="handleOnChangeDropdown(this.value, 'kecamatan', 'id_kecamatan')"
                                    value="{{ $data->id_kabupaten }}">
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Kecamatan</label>
                                <select required name="id_kecamatan" class="form-control"
                                    value="{{ $data->id_kecamatan }}">
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Notelp</label>
                                <input required name="notelp" type="text" class="form-control"
                                    oninput="checkNumber(this)" value="{{ $data->notelp }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">NoHp</label>
                                <input required name="nohp" type="text" class="form-control"
                                    oninput="checkNumber(this)" value="{{ $data->nohp }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input required name="email" type="email" class="form-control"
                                    value="{{ $data->email }}">
                            </div>
                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Kewarganegaraan</label>
                                <input required name="kewarganegaraan" type="text" class="form-control"
                                    value="{{ $data->kewarganegaraan }}">
                            </div>
                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Kewarganegaraan:</label>
                                <br>
                                <input id="kewarganegaraan0" type="radio" name="kewarganegaraan" value="WNI"
                                    @if ($data->kewarganegaraan == 'WNI') checked @endif> <label
                                    for="kewarganegaraan0">WNI</label>
                                <input id="kewarganegaraan1" type="radio" name="kewarganegaraan" value="WNI2"
                                    @if ($data->kewarganegaraan == 'WNI2') checked @endif> <label for="kewarganegaraan1">WNI
                                    Keturuan</label>
                                <input id="kewarganegaraan2" type="radio" name="kewarganegaraan" value="WNA"
                                    @if ($data->kewarganegaraan == 'WNA') checked @endif> <label
                                    for="kewarganegaraan2">WNA</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Jika WNA Silahkan tulis asal negara</label>
                                <input required name="kewarganegaraan_neagra" type="text" class="form-control"
                                    value="{{ $data->kewarganegaraan_negara }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">Tgl Lahir</label>
                                <input required name="tgl_lahir" type="date" class="form-control"
                                    value="{{ $data->tgl_lahir }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input required name="tempat_lahir" type="text" class="form-control"
                                    value="{{ $data->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">Provinsi Lahir</label>
                                <select required name="id_provinsi_lahir" class="form-control"
                                    onchange="handleOnChangeDropdown(this.value, 'kabupaten', 'id_kotkab_lahir')"
                                    value="{{ $data->id_provinsi_lahir }}">
                                    @foreach ($dataProvinsi as $key => $val)
                                        <option @if ($data->id_provinsi_lahir == $val->id) selected @endif
                                            value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Kota/Kabupaten Lahir</label>
                                <select required name="id_kotkab_lahir" class="form-control"
                                    value="{{ $data->id_kotkab_lahir }}">
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Jika WNA Silahkan tulis asal
                                    negara</label>
                                <input required name="negara" type="text" class="form-control"
                                    value="{{ $data->negara }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Jenis Kelamin:</label>
                                <br>
                                <input id='jkl' type="radio" name="jk" value="l"
                                    @if ($data->jk == 'l') checked @endif> <label for="jkl">Laki-
                                    Laki</label>
                                <input id='jkp' type="radio" name="jk" value="p"
                                    @if ($data->jk == 'p') checked @endif> <label
                                    for="jkp">Perempuan</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Sudah Menikah?:</label>
                                <br>
                                <input id="menikah0" type="radio" name="menikah" value="0"
                                    @if ($data->menikah == '0') checked @endif> <label for="menikah0">Belum</label>
                                <input id="menikah1" type="radio" name="menikah" value="1"
                                    @if ($data->menikah == '1') checked @endif> <label for="menikah1">Sudah</label>
                                <input id="menikah2" type="radio" name="menikah" value="2"
                                    @if ($data->menikah == '2') checked @endif> <label
                                    for="menikah2">Duda/Janda</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Agama</label>
                                <select required name="agama" class="form-control" value="{{ $data->agama }}">
                                    <option @if ($data->agama == 'ISLAM') checked @endif value="ISLAM">ISLAM
                                    </option>
                                    <option @if ($data->agama == 'KRISTEN') checked @endif value="KRISTEN">KRISTEN
                                    </option>
                                    <option @if ($data->agama == 'KATHOLIK') checked @endif value="KATHOLIK">KATHOLIK
                                    </option>
                                    <option @if ($data->agama == 'HINDU') checked @endif value="HINDU">HINDU
                                    </option>
                                    <option @if ($data->agama == 'BUDDHA') checked @endif value="BUDDHA">BUDDHA
                                    </option>
                                    <option @if ($data->agama == 'LAIN') checked @endif value="LAIN">Lain-Lain
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                @if ($data->file_img != null)
                                    <a target="_blank" href="{{ $data->file_img }}">File Gambar</a>
                                @endif
                                <label class="form-label">Upload Foto KTP</label>
                                <input type="file" name="gambar">
                            </div>
                            <div class="col-6">
                                @if ($data->file_video != null)
                                    <a target="_blank" href="{{ $data->file_video }}">File Video</a>
                                @endif
                                <label class="form-label">Upload Video KTP</label>
                                <input type="file" name="video">
                            </div>
                        </div>
                        {{-- [END] GRID SYSTEM FORM --}}

                        {{-- ACTION FORM --}}
                        <div class="row mt-5 justify-content-center">
                            <div class="col-8 text-center">
                                {{-- <a href="{{ route('manage.user.index') }}"
                                    class="btn btn-secondary m-1 radius-30 px-5"><i class="bx bx-x me-1"></i>Batal</a> --}}
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
        const handleOnChangeDropdown = async (id, isfrom, target) => {
            let path = 'kabkot'
            let idpatokan = ''
            if (isfrom == 'kecamatan') {
                path = 'kecamatan'
            }
            if (target == 'id_kabupaten') {
                idpatokan = '{{ $data->id_kabupaten }}'
            }
            if (target == 'id_kecamatan') {
                idpatokan = '{{ $data->id_kecamatan }}'
            }
            if (target == 'id_kotkab_lahir') {
                idpatokan = '{{ $data->id_kotkab_lahir }}'
            }
            let url = '/get-data/' + path + '?id=' + id
            const resp = await $.get(url)
            // console.log(resp)
            let selectOption = ''
            resp.forEach(val => {
                let isselect = (val.id == idpatokan) ? 'selected' : ''
                selectOption += `
                <option ${isselect} value="${val.id}">${val.name}</option>
                `
            })
            $(`select[name="${target}"]`).html(selectOption)
        }
        const checkNumber = (target) => {
            let val = target.value
            if (isNaN(val)) {
                alert("Harus Angka.!");
                target.value = ''
                return false;
            }
        }

        handleOnChangeDropdown('{{ $data->id_provinsi }}', 'kabupaten', 'id_kabupaten')
        handleOnChangeDropdown('{{ $data->id_kabupaten }}', 'kecamatan', 'id_kecamatan')
        handleOnChangeDropdown('{{ $data->id_provinsi_lahir }}', 'kabupaten', 'id_kotkab_lahir')
    </script>
@endsection
