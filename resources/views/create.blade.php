<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
    
        <button type="submit">ENVIAR</button>
    </form>    
</body>
</html>
