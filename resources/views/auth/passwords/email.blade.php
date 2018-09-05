@component('layouts.landing')
@slot('template')
  page-email
@endslot
<section class="section flex-center ">
  <div class="boxForm">
       <div class="big-title center">
        <h2 class="title">RESET PASSWORD</h2>
      </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="loginForm" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input  type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-red">
                   SEND REQUEST
                </button>
            </div>
        </form>
  </div> {{-- .container --}}
</section>
@endcomponent
