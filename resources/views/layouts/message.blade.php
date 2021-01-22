@if($errors->any())
    <div class="alert alert-danger">
        <h6>Opps, ada yang bermasalah.</h6>
        <span>
            {{ collect($errors->all())->join(', ')  }}
        </span>
    </div>

    @php
        alert()->error('Gagal', 'Data tidak berhasil di proses.')->showConfirmButton('Tutup', '#2B7D75');;
    @endphp
@endif


@if(session('message'))
    <div class="alert alert-success">
        <h4>Yeah sukses</h4>
        <span>
            {{ session('message') }}
        </span>
    </div>

    @php
        alert()->success('Berhasil', session('message'))->showConfirmButton('Tutup', '#2B7D75');;
    @endphp
@endif


