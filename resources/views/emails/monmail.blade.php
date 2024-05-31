<x-mail::message>
# Introduction

Bonjour!  <br>
Voici le nom de Projet : {{$nomProjet}}
<br>
Réference du projet : {{$refProjet}}
<br>


voici les description : {{$description}}
{{-- <x-mail::button :url="''">
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
