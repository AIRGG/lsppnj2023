@extends('lsp.layout.main-layout')
@section('custom-css')
@endsection

@section('title', 'Detail Pendaftar')
@section('content')

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="table-utama" class="table table-sm table-striped table-bordered" style="width:100%">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $data->nama_user }}</td>
                            </tr>

                            <tr>
                                <td>Alamat KTP</td>
                                <td>{{ $data->alamat_ktp }}</td>
                            </tr>

                            <tr>
                                <td>Alamat Domisili</td>
                                <td>{{ $data->alamat_domisili }}</td>
                            </tr>

                            <tr>
                                <td>Provinsi</td>
                                <td>{{ $data->provinsi }}</td>
                            </tr>

                            <tr>
                                <td>Kota/Kabupaten</td>
                                <td>{{ $data->kabupaten }}</td>
                            </tr>

                            <tr>
                                <td>Kecamatan</td>
                                <td>{{ $data->kecamatan }}</td>
                            </tr>

                            <tr>
                                <td>Notelp</td>
                                <td>{{ $data->notelp }}</td>
                            </tr>

                            <tr>
                                <td>NoHp</td>
                                <td>{{ $data->nohp }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ $data->email }}</td>
                            </tr>

                            <tr>
                                <td>Kewarganegaraan:</td>
                                <td>{{ $data->kewarganegaraan }}</td>
                            </tr>

                            <tr>
                                <td>Jika WNA Silahkan tulis asal negara</td>
                                <td>{{ $data->kewarganegaraan_negara }}</td>
                            </tr>

                            <tr>
                                <td>Tgl Lahir</td>
                                <td>{{ $data->tgl_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir</td>
                                <td>{{ $data->tempat_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Provinsi Lahir</td>
                                <td>{{ $data->provinsi_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Kota/Kabupaten Lahir</td>
                                <td>{{ $data->kotkab_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Jika WNA Silahkan tulis asal</td>
                                <td>{{ $data->negara }}</td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    @if ($data->jk == 'l')
                                        Laki-Laki
                                    @endif
                                    @if ($data->jk == 'p')
                                        Perempuan
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Sudah Menikah</td>
                                <td>
                                    @if ($data->menikah == '0')
                                        Belum Menikah
                                    @endif
                                    @if ($data->menikah == '1')
                                        Menikah
                                    @endif
                                    @if ($data->menikah == '2')
                                        Duda/Janda
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Agama</td>
                                <td>{{ $data->agama }}</td>
                            </tr>

                            <tr>
                                <td>Foto KTP</td>
                                <td>
                                    @if ($data->file_img != null)
                                        <a target="_blank" href="{{ $data->file_img }}">File Gambar</a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Video KTP</td>
                                <td>
                                    @if ($data->file_video != null)
                                        <a target="_blank" href="{{ $data->file_video }}">File Video</a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>

                            {{-- back identity --}}
                            {{-- <tr>
                                <td>User Created:</td>
                                <td>{{ $data->user_create }}</td>
                            </tr> --}}
                            <tr>
                                <td>Created At:</td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            {{-- <tr>
                                <td>User Updated:</td>
                                <td>{{ $data->user_create }}</td>
                            </tr> --}}
                            <tr>
                                <td>Updated At:</td>
                                <td>{{ $data->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>UID:</td>
                                <td>{{ $data->uid }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- ACTION FORM --}}
                    <div class="row mt-1">
                        <div class="col-12">
                            <a href="{{ route('manage.pendaftaran.index') }}"
                                class="btn btn-secondary m-1 radius-30 px-5"><i
                                    class="bx bx-chevron-left me-1"></i>Kembali</a>
                        </div>
                    </div>
                    {{-- [END] ACTION FORM --}}
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
