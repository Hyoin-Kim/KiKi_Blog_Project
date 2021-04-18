
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

               <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">아이디</label>

                            <div class="col-md-6  alert alert-warning">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn btn-warning">
                                    {{ __('추가하기') }}
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

