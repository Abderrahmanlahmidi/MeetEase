<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Resevation</title>
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
        <!-- Table -->
        <!-- Manage Reservations -->
        <!-- Main content area -->
        <div class="col-span-10 p-6">
            <!-- Reservations Page -->
            <h1 class="text-2xl font-semibold mb-6">Gestion des Réservations</h1>
            <!-- Pending Reservations Table -->
            <div class="mb-8">
                <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nom de la Salle</th>
                            <th scope="col" class="px-6 py-3">Utilisateur</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Heure Debut</th>
                            <th scope="col" class="px-6 py-3">Heure Fin</th>
                            <th scope="col" class="px-6 py-3">Statut</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Example Row -->
                        @foreach($reservations as $reservation)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{$reservation->salle->nom}}</td>
                            <td class="px-6 py-4">{{$reservation->utilisateur->prenom}}</td>
                            <td class="px-6 py-4">{{$reservation->date_reservation}}</td>
                            <td class="px-6 py-4">{{$reservation->heure_debut}}</td>
                            <td class="px-6 py-4">{{$reservation->heure_fin}}</td>
                            <td class="px-6 py-4">
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded">{{$reservation->status }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <button  class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Valider</button>
                                <button  class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Annuler</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<script>

</script>
</body>
</html>
