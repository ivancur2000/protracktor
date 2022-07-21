
@component('mail::message')

Welcome {{ $user->name }}, the access password assigned to you is as follows:

<p class="text-mutted">
  {{ $password }}
</p>

Do not lose it or share it with anyone

The Protracktor team.
