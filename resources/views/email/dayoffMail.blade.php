<!DOCTYPE html>
<html>
<head>
    <title>
        MG Consulting Icazə bildirişi !
    </title>
</head>
<body>
<center>
    <h1>
        Yeni icazə bildirişi !
        <br/>
        <b> Status : {{ $data['status'] }} </b>
    </h1>
    <br/>
    <h2>Adı və Soyadı : <b> {{ $data['name'] }} </b></h2>
    <h2>İcazə səbəbi : <b> {{ $data['desc'] }} </b></h2>
    <h2>İcazə tipi : <b> {{ $data['dayoff_type'] }} </b></h2>
    <h2>Başlanğıc günü : <b> {{ $data['start_date'] }} </b></h2>
    <h2>Bitiş günü : <b> {{ $data['end_date'] }} </b></h2>
    <h2>Günlərin sayı : <b> {{ $data['total_of_days'] }} </b></h2>
    <h2>Icazənin yaradılma vaxtı : <b> {{ $data['created_at'] }} </b></h2>
</center>
</body>
</html>
