{{--
 * @author      Archie, Disono (webmonsph@gmail.com)
 * @link        https://github.com/disono/Laravel-Template
 * @lincense    https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright   Webmons Development Studio
--}}

@extends(currentTheme() . 'layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mr-auto ml-auto">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Your phone is now verified.</p>
                    <hr>
                    <p class="mb-0"><a href="{{ url('u/' . __me()->username) }}">Visit my Profile/Account</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection