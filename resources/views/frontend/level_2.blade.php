@php
    $result = str_replace('{wallet_1}', $from_valute->name, $text->translate()->text);
    $result = str_replace('{dramapanak}', $from_valute->wallet, $result);
    $result = str_replace('{N}', session('order.zapros_id'), $result);


@endphp

<div class="text-center mb-3">
    {!! $result !!}
    
    <div class='mt-5'>
         <table class="table table-dark table-hover last-tabel">
        <tbody>
            <tr class="black">
                <td>No:</td>
                <td>Փոխանակման ուղղությունը</td>
                <td>Վճարվող գումարը</td>
                <td>Ստացվող գումարը</td>
                <td>Վճարման դրամապանակը</td>
                <td>Ստացման դրամապանակը</td>
            </tr>
            <tr>
                <td> {{ session('order.zapros_id')}}</td>
                <td>{{session('order.poxanakum')}}</td>
                <td> {{session('order.ktam')}}</td>
                <td>{{session('order.kstanam')}}</td>
                <td>{{session('order.ktam_kashelok')}}</td>
                <td>{{session('order.kstanam_kashelok')}}</td>
            </tr>
        </tbody>
    </table>
    </div>


</div>