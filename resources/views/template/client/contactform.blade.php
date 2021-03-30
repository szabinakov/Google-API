@component('mail::message')
# Subject: {{$subject}}

From: {{$name}}
<br/>
Email: {{$email}}
<br/>
Message: {{$message}}


@endcomponent
