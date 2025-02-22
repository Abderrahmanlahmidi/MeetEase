<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic');
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
</style>
<!-- Modal Overlay for Updating Role -->
<div id="updateModalOverlay" class="fixed z-40 flex inset-0 bg-black bg-opacity-50  justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-lg font-semibold mb-4">Modifier Role</h2>
        <form  action="{{url('/admin/role/update/'. $item->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="updateId" name="id">
            <div class="mb-4">
                <label for="role_name" class="block text-sm font-medium text-gray-700">Nom de la salle</label>
                <input  value={{$item->role_name}} type="text" id="role_name" name="role_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeUpdateModalButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Annuler</button>
                <button  type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
