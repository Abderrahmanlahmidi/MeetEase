<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Salles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

<!-- Navbar -->
<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <!-- Logo -->
                <a href="#" class="flex items-center py-4 px-2">
                    <span class="font-semibold text-gray-500 text-lg">Réservation de Salles</span>
                </a>
            </div>
            <!-- Navbar Links -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500">Accueil</a>
                <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500">Mes Réservations</a>
                <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500">Contact</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="bg-blue-500 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Réservez votre salle en quelques clics</h1>
        <p class="text-lg mb-8">Trouvez la salle parfaite pour vos réunions, conférences ou événements.</p>
    </div>
</div>

<!-- Main container -->
<div class="p-6" id="salles">
    <h1 class="text-2xl font-semibold mb-6">Salles Disponibles</h1>

    <!-- Room Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($salles as $salle)
        <!-- Example Room Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
              <h2 class="text-xl font-semibold mb-2">{{$salle->nom}}</h2>
              <p class="text-gray-600 mb-2">Capacité: {{$salle->capacite}} personnes</p>
              <p class="text-gray-600 mb-4">Prix: {{$salle->prix}}/heure</p>
              <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 reserveButton">Réserver</button>
        </div>
        <!-- Add more room cards here -->
    @endforeach
    </div>
</div>

<!-- Reservation Modal -->
<div id="reservationModal" class="fixed z-40 flex inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-lg font-semibold mb-4">Réserver une salle</h2>
        <form id="reservationForm" action="/reserver" method="post">
            @csrf
            <input type="hidden" id="salleId" name="salle_id">
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" name="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Heure de début</label>
                <input type="time" id="start_time" name="start_time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Heure de fin</label>
                <input type="time" id="end_time" name="end_time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeReservationModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Annuler</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Réserver</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4">À propos</h3>
                <p class="text-gray-400">Nous offrons des salles de conférence modernes et bien équipées pour vos réunions et événements.</p>
            </div>
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                <ul class="text-gray-400">
                    <li class="mb-2"><a href="#" class="hover:text-blue-500">Accueil</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-blue-500">Mes Réservations</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-blue-500">Contact</a></li>
                </ul>
            </div>
            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="text-gray-400">
                    <li class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i>123 Rue de Paris, France</li>
                    <li class="mb-2"><i class="fas fa-phone mr-2"></i>+33 123 456 789</li>
                    <li class="mb-2"><i class="fas fa-envelope mr-2"></i>contact@reservation.com</li>
                </ul>
            </div>
            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2023 Réservation de Salles. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
    // Open Reservation Modal
    document.querySelectorAll('.reserveButton').forEach(button => {
        button.addEventListener('click', function() {
            const salleId = this.getAttribute('data-id');
            const salleNom = this.getAttribute('data-nom');

            document.getElementById('salleId').value = salleId;
            document.getElementById('reservationModal').classList.remove('hidden');
        });
    });

    // Close Reservation Modal
    document.getElementById('closeReservationModal').addEventListener('click', function() {
        document.getElementById('reservationModal').classList.add('hidden');
    });
</script>
</body>
</html>
