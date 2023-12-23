@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Anda sedang dihalaman
                    </div>
                    <h2 class="page-title">
                        Data Izin / Sakit
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                    <path d="M16 3l0 4" />
                                                    <path d="M8 3l0 4" />
                                                    <path d="M4 11l16 0" />
                                                    <path d="M8 15h2v2h-2z" />
                                                </svg>
                                            </span>
                                            <input type="text" value="{{ Request('dari') }}" class="form-control"
                                                name="dari" id="dari" placeholder="Dari">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                    <path d="M16 3l0 4" />
                                                    <path d="M8 3l0 4" />
                                                    <path d="M4 11l16 0" />
                                                    <path d="M8 15h2v2h-2z" />
                                                </svg>
                                            </span>
                                            <input type="text" value="{{ Request('sampai') }}" class="form-control"
                                                name="sampai" id="sampai" placeholder="Sampai">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-barcode" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                                    <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                                    <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                                    <path d="M5 11h1v2h-1z" />
                                                    <path d="M10 11l0 2" />
                                                    <path d="M14 11h1v2h-1z" />
                                                    <path d="M19 11l0 2" />
                                                </svg>
                                            </span>
                                            <input type="text" value="{{ Request('nik') }}" class="form-control"
                                                name="nik" id="nik" placeholder="NIK">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-user" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                </svg>
                                            </span>
                                            <input type="text" value="{{ Request('nama_lengkap') }}" class="form-control"
                                                name="nama_lengkap" id="nama_lengkap" placeholder="Nama Karyawan">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <select class="form-select" name="status_approved" id="status_approved">
                                                <option value="">Pilih Status</option>
                                                <option value="0"
                                                    {{ Request('status_approved') === '0' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="1"
                                                    {{ Request('status_approved') == 1 ? 'selected' : '' }}>
                                                    Disetujui</option>
                                                <option value="2"
                                                    {{ Request('status_approved') == 2 ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary w-100" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-search" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>
                                                Cari Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Proses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($izinsakit as $d)
                                        <tr>
                                            <td>{{ $loop->iteration + $izinsakit->firstItem() - 1 }}</td>
                                            <td>{{ date('d-m-Y', strtotime($d->tgl_izin)) }}</td>
                                            <td>{{ $d->nik }}</td>
                                            <td>{{ $d->nama_lengkap }}</td>
                                            <td>{{ $d->jabatan }}</td>
                                            <td>{{ $d->status == 'i' ? 'Izin' : 'Sakit' }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                            <td>
                                                @if ($d->status_approved == 1)
                                                    <span class="badge bg-success text-light">Disetujui</span>
                                                @elseif($d->status_approved == 2)
                                                    <span class="badge bg-danger text-light">Ditolak</span>
                                                @else
                                                    <span class="badge bg-warning text-light">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($d->status_approved == 0)
                                                    <a href="" class="approve btn btn-sm btn-primary"
                                                        id_izinsakit="{{ $d->kode_izin }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-external-link"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                                            <path d="M11 13l9 -9" />
                                                            <path d="M15 4h5v5" />
                                                        </svg>Proses
                                                    </a>
                                                @else
                                                    <a href="/presensi/{{ $d->kode_izin }}/batalkanizinsakit"
                                                        class="btn btn-danger btn-sm">

                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-square-rounded-minus"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 12h6" />
                                                            <path
                                                                d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                                        </svg>Batalkan
                                                    </a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $izinsakit->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Page body --}}

    {{-- Modal Izin Sakit --}}
    <div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keputusan Izin / Sakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/presensi/approveizinsakit" method="POST">
                        @csrf
                        <input type="hidden" name="id_izinsakit_form" id="id_izinsakit_form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="status_approved" id="status_approved" class="form-select">
                                            <option value="">Pilih Status</option>
                                            <option value="1">Disetujui</option>
                                            <option value="2">Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 14l11 -11" />
                                            <path
                                                d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                        </svg>Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {
            $(".approve").click(function(e) {
                e.preventDefault();
                var id_izinsakit = $(this).attr("id_izinsakit");
                $("#id_izinsakit_form").val(id_izinsakit);

                $("#modal-izinsakit").modal("show");
            });
            $("#dari, #sampai").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush
