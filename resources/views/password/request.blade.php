@extends('layouts.applicant.app')
@section('title', __('J-K Network Services'))
@section('body')
<section class="section" style="background: rgb(250, 250, 250)">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-8 col-lg-5 py-4">
        @if(Session::has('success'))
          @include('applicant.flash.success', ['message' => session()->get('success'), 'alertClass'=> 'success'])
        @endif
        <div class="mb-4 h2 text-center"> {{ __('Reset Password') }} </div>
        <form class="form mt-4" action="{{ route('password.email') }}" method="POST">
          @csrf
        <div class="form-group">
            <div class="input-group input-group-merge">
                <input type="text" class="form-control form-control-prepend" id="email" name="email" value="" placeholder="Email Address" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAfBJREFUWAntVk1OwkAUZkoDKza4Utm61iP0AqyIDXahN2BjwiHYGU+gizap4QDuegWN7lyCbMSlCQjU7yO0TOlAi6GwgJc0fT/fzPfmzet0crmD7HsFBAvQbrcrw+Gw5fu+AfOYvgylJ4TwCoVCs1ardYTruqfj8fgV5OUMSVVT93VdP9dAzpVvm5wJHZFbg2LQ2pEYOlZ/oiDvwNcsFoseY4PBwMCrhaeCJyKWZU37KOJcYdi27QdhcuuBIb073BvTNL8ln4NeeR6NRi/wxZKQcGurQs5oNhqLshzVTMBewW/LMU3TTNlO0ieTiStjYhUIyi6DAp0xbEdgTt+LE0aCKQw24U4llsCs4ZRJrYopB6RwqnpA1YQ5NGFZ1YQ41Z5S8IQQdP5laEBRJcD4Vj5DEsW2gE6s6g3d/YP/g+BDnT7GNi2qCjTwGd6riBzHaaCEd3Js01vwCPIbmWBRx1nwAN/1ov+/drgFWIlfKpVukyYihtgkXNp4mABK+1GtVr+SBhJDbBIubVw+Cd/TDgKO2DPiN3YUo6y/nDCNEIsqTKH1en2tcwA9FKEItyDi3aIh8Gl1sRrVnSDzNFDJT1bAy5xpOYGn5fP5JuL95ZjMIn1ya7j5dPGfv0A5eAnpZUY3n5jXcoec5J67D9q+VuAPM47D3XaSeL4AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                <div class="input-group-prepend">
                    <span class="input-group-text py-1 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                        </svg>
                    </span>
                </div>
            </div>
                @error("email")
                    <div class="text-danger"> {{ $message }} </div>
                @enderror
            <div class="mt-4 text-center">
                <input class="btn btn-primary w-100" type="submit" value="{{ __('Reset Password') }}">
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
