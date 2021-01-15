@if($errors->any())
    <div class="alert alert-danger">
        <h6>Opps, ada yang bermasalah.</h6>
        <p>
            {{ collect($errors->all())->join(', ')  }}
        </p>
    </div>
@endif
