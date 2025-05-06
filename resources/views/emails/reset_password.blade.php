@component('mail::message')
    <h1> {{  trans('messages.thanking') }} {{config('app.name') }} !</h1>
    <p>{{ trans('messages.password_reset_label') }}</p>
    @component('mail::button', ['url' => $data['url']])
        {{trans('messages.reset_password')}}
    @endcomponent
    <p>{{  trans('messages.no_action_required') }}</p>
@endcomponent
