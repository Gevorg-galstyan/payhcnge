@component('mail::message')

Name : {{$name}}<br>
Email : {{$email}}<br>
Phone : {{$phone}}<br>
Subject : {{$subject}}<br>
Text : {{$text}}<br>


{{ config('app.name') }}
@endcomponent
