<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
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
<!-- Main container -->
<div class="grid grid-cols-12 h-screen">
    <!-- Sidebar -->
    <aside id="default-sidebar" class="col-span-2 w-64 bg-gray-50 p-4 h-screen transition-transform border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <h2 class="text-lg font-semibold text-gray-700 dark:text-white mb-4">Dashboard</h2>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="/admin/salle" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Salles
                    </a>
                </li>
                <li>
                    <a href="/admin/role" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Roles
                    </a>
                </li>
                <li>
                    <a href="/admin/utilisateur" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="/admin/reservation" class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                        Reservation
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main content area -->
    <div class="col-span-10 p-6">
        <!-- Create New User Button -->
        <button id="createUserButton" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
            Ajouter un utilisateur
        </button>

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Prénom</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Âge</th>
                    <th scope="col" class="px-6 py-3">Rôle</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Example Data -->
                @foreach($utilisateurs as $utilisateur)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{$utilisateur->nom}}
                      </th>
                      <td class="px-6 py-4">
                          {{$utilisateur->prenom}}
                      </td>
                      <td class="px-6 py-4">
                         {{$utilisateur->email}}
                      </td>
                      <td class="px-6 py-4">
                          {{$utilisateur->age}}
                      </td>
                      <td class="px-6 py-4">
                          {{$utilisateur->role->role_name}}
                      </td>
                      <td class="px-6 py-4">
                          <a href={{'/admin/utilisateur/edit/'. $utilisateur->id}}  class="text-blue-600 hover:underline modifierButton cursor-pointer">Modifier</a>

                          <form method="post" action="{{url('/admin/utilisateur/delete/'. $utilisateur->id)}}" class="inline">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4" value="Supprimer" />
                          </form>

                      </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Overlay for Creating/Updating User -->
<div id="userModalOverlay" class="fixed z-40 flex inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-lg font-semibold mb-4" id="modalTitle">Ajouter un utilisateur</h2>
        <form id="userForm" action="/admin/utilisateur" method="post">
            @csrf
            <input type="hidden" id="userId" name="id">
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="age" class="block text-sm font-medium text-gray-700">Âge</label>
                <input type="number" id="age" name="age" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="age" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Rôle</label>
                <select id="role_id" name="role_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="9">Utilisateur</option>
                    <option value="10">Administrateur</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeUserModalButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Annuler</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
<!-- JavaScript -->
<script>
    document.getElementById('createUserButton').addEventListener('click', function() {
        document.getElementById('userModalOverlay').classList.remove('hidden');
    });
    document.getElementById('closeUserModalButton').addEventListener('click', function() {
        document.getElementById('userModalOverlay').classList.add('hidden');
    });
</script>
</body>
</html>
