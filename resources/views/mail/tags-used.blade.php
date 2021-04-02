@component('mail::message')
# Tags attached to the post

Tags:
@foreach ($tags as $tag)
    #{{$tag->name}}
@endforeach


@component('mail::button', ['url' => ''])
Click here!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
