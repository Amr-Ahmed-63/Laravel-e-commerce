

<form action="{{ route("admin.user") }}" method="POST">
    @csrf

    <input type="text" name="name" id="">
    <input type="password" name="password" id="">
</form>
