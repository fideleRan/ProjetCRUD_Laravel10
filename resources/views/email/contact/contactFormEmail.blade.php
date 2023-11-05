{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
@component('mail::message')
#Hello 
You have received an email from <strong>{{ $data_contact['name'] }} </strong>, {{ $data_contact['email'] }}
Comment : <br>
{{$data_contact['comment']}}
@component('mail::button',['url'=>'http://127.0.0.1:8000/customer'])
    Redirect to Demo1
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent