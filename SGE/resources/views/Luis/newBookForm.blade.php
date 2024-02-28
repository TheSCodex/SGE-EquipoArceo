<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Libro</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl p-6 shadow-md">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat">Agregar Nuevo Libro</h1>
        <form action="#" method="post">
            <div class="mb-4">
                <label for="name_book" class="block text-gray-700 font-montserrat mb-2">Nombre:</label>
                <input type="text" id="name_book" name="name_book" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el nombre del libro">
            </div>
            <div class="mb-4">
                <label for="author_book" class="block text-gray-700 font-montserrat mb-2">Autor:</label>
                <input type="text" id="author_book" name="author_book" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el autor del libro">
            </div>
            <div class="mb-4">
                <label for="isbn_book" class="block text-gray-700 font-montserratmb-2">ISBN:</label>
                <input type="text" id="isbn_book" name="isbn_book" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" required placeholder="Introduce el ISBN del libro">
            </div>
            <div class="mb-4">
                <label for="id_students" class="block text-gray-700font-montserrat mb-2">Matrículas:</label>
                <textarea id="id_students" name="id_students" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" required placeholder="Introduce la o las matriculas de los estudiantes que han entregado el libro"></textarea>
            </div>
            <div class="mb-4">
                <label for="aggregation_date" class="block text-gray-700font-montserrat mb-2">Fecha de Adición:</label>
                <input type="date" id="aggregation_date" name="aggregation_date" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required>
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Añadir libro</button>
            </div>
        </form>
    </div>
</body>
</html>
