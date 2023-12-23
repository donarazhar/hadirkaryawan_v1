@extends('layouts.presensi')
@section('header')
    {{-- App Header --}}
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton" goBack>
                <ion-icon name="chevron-back-outline">
                </ion-icon></a>
        </div>
        <div class="pageTittle">Data Izin, Sakit & Cuti</div>
        <div class="right"></div>
    </div>
    <style>
        .historicontent {
            display: flex;
            gap: 1px;
        }

        .datapresensi {
            margin-left: 10px;
        }

        .status {
            position: absolute;
            right: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="row" style="margin-top: 70px">
        <div class="col">
            @php
                $messagesuccess = Session::get('success');
                $messageerror = Session::get('error');
            @endphp
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ $messagesuccess }}
                </div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ $messageerror }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            @foreach ($dataizin as $d)
                @php
                    if ($d->status == 'i') {
                        $status = 'Izin';
                    } elseif ($d->status == 's') {
                        $status = 'Sakit';
                    } elseif ($d->status == 'c') {
                        $status = 'Cuti';
                    } else {
                        $status = 'Not Found';
                    }
                @endphp
                <div class="card mb-1 card_izin" kode_izin="{{ $d->kode_izin }}" data-toggle="modal"
                    data-target="#actionSheetIconed">
                    <div class="card-body">
                        <div class="historicontent">
                            <div class="iconpresensi">
                                @if ($d->status == 'i')
                                    <ion-icon name="person-add-outline" style="font-size: 36px; color:#1e74fd;"></ion-icon>
                                @elseif ($d->status == 's')
                                    <ion-icon name="medkit-outline" style="font-size: 36px; color:#fd1e1e;"></ion-icon>
                                @elseif ($d->status == 'c')
                                    <ion-icon name="calendar-outline" style="font-size: 36px; color:#ffae00;"></ion-icon>
                                @endif
                            </div>
                            <div class="datapresensi">
                                <h3 style="line-height: 3px">{{ $status }} :
                                    {{ hitunghari($d->tgl_izin_dari, $d->tgl_izin_sampai) }} Hari
                                </h3>
                                <small>{{ date('d-m-Y', strtotime($d->tgl_izin_dari)) }} s/d
                                    {{ date('d-m-Y', strtotime($d->tgl_izin_sampai)) }} </small>
                                <p>
                                    {{ $d->keterangan }}
                                    <br>
                                    @if ($d->status == 'c')
                                        <span class="badge badge-warning">{{ $d->nama_cuti }}</span>
                                        <br>
                                    @endif
                                    @if (!empty($d->doc_sid))
                                        <span style="color: #1e74fd;">
                                            <ion-icon name="document-attach-outline"></ion-icon>
                                            <small>Surat Dokter</small>
                                        </span>
                                    @endif

                                </p>

                            </div>
                            <div class="status">
                                @if ($d->status_approved == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($d->status_approved == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                @elseif($d->status_approved == 2)
                                    <span class="badge badge-danger">Ditolak</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="fab-button animate bottom-right dropdown" style="margin-bottom: 70px">
        <a href="#" class="fab bg-primary" data-toggle="dropdown">
            <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-primary" href="/izinabsen">
                <ion-icon name="person-add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                <p>Izin</p>
            </a>
            <a class="dropdown-item bg-danger" href="/izinsakit">
                <ion-icon name="medkit-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                <p>Sakit</p>
            </a>
            <a class="dropdown-item bg-warning" href="/izincuti">
                <ion-icon name="calendar-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                <p>Cuti</p>
            </a>
        </div>
    </div>

    {{-- Modal Pop UP Action --}}

    <div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aksi</h5>
                </div>
                <div class="modal-body" id="showact">
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade dialogbox" id="deleteConfirm" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin Dihapus ?</h5>
                </div>
                <div class="modal-body">
                    Data Pengajuan Izin Akan dihapus
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batalkan</a>
                        <a href="" class="btn btn-text-primary" id="hapuspengajuan">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {
            $(".card_izin").click(function(e) {
                // Mendapatkan masing2 kode izin
                var kode_izin = $(this).attr("kode_izin");
                $("#showact").load('/izin/' + kode_izin + '/showact');
            });
        });
    </script>
@endpush
