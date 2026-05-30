<h1>Admin Panel</h1>

<form action="/admin/store" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="certificate_code" placeholder="Code">
    <input type="text" name="name" placeholder="Name">
    <input type="date" name="birth_date">
    <input type="text" name="course" placeholder="Course">

    <input type="file" name="certificate_image">

    <button type="submit">
        Tambah Sertifikat
    </button>
</form>

<hr>

@foreach($certificates as $cert)

<p>{{ $cert->name }}</p>

@endforeach