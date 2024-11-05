<x-mail::message>
# Alert pojazdu: {{ $name }}
<br>
Twój pojazd o nazwie {{ $name }} opuścił obszar startowy! <br>
<h2>Zapis danych: {{ $data }}</h2>
Jeżeli uważasz, że istnieje zagrożenie kliknij przycisk poniżej.
<x-mail::button :url="$id" color="success">
    Sprawdź lokalizację
</x-mail::button>

</x-mail::message>
