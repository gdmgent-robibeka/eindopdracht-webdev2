@component('mail::message')
# Verstuurd via Moeder Barry

{{ $contactForm->content }}

{{ $contactForm->name }}<br>
{{ $contactForm->email }}<br>
{{ $contactForm->phone }}<br>
@endcomponent
