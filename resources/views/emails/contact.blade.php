@component('mail::message')
# Contact informations

Hello admin,<br>
Here are informations which customer contact you, please read them:
{{ $contact['name'] }}
{{ $contact['email'] }}
{{ $contact['subject'] }}
{{ $contact['message'] }}

@component('mail::button', ['url' => 'http://privatecarvietnam.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
