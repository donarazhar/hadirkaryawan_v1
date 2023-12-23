@extends('layouts.presensi')
@section('header')
    {{-- App Header --}}
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton" goBack>
                <ion-icon name="chevron-back-outline">
                </ion-icon></a>
        </div>
        <div class="pageTittle">Edit Profile</div>
        <div class="right"></div>
    </div>
@endsection

@section('content')
    <form action="/presensi/{{ $karyawan->nik }}/updateprofile" method="POST" enctype="multipart/form-data"
        style="margin-top:4rem">
        @csrf
        <div class="col">
            <div class="row" style="margin-top:4rem">
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
                    {{-- Pesan error validate --}}
                    @error('foto')
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->nama_lengkap }}" name="nama_lengkap"
                        id="nama_lengkap" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->no_hp }}" name="no_hp" id="no_hp"
                        placeholder="No. HP">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            {{-- <input type="text" name="fotolama" id="fotolama" value="{{ $karyawan->foto }}"> --}}
            <div class="custom-file-upload" id="fileUpload1">
                <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <strong>
                            <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
                                aria-label="cloud upload outline"></ion-icon>
                            <i>Tap to Upload</i>
                        </strong>
                    </span>
                </label>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <button type="submit" class="btn btn-primary btn-block">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
