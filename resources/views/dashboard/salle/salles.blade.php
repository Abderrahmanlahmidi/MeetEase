<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Salles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">

<!-- Header -->
<header class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-semibold">Réservation de Salles de Conférence</h1>
            <p class="mt-2 text-gray-300">Réservez votre salle de conférence en quelques clics.</p>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-6 py-8">
    <!-- Room Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
       @foreach($salles as $salles)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800">{{$salles->nom}}</h2>
                <p class="mt-2 text-gray-600">Capacité: <span class="font-medium">{{$salles->capacite}} personnes</span></p>
                <p class="mt-2 text-gray-600">Prix: <span class="font-medium">{{$salles->prix}}€/jour</span></p>
                <button
                    onclick="reserveRoom('salle A')"
                    class="mt-4 w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Réserver
                </button>
            </div>
        </div>
        @endforeach
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300">&copy; 2023 Réservation de Salles. Tous droits réservés.</p>
    </div>
</footer>

<script>
</script>
</body>
</html>
