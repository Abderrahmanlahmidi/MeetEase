console.log("kayn")
document.getElementById('createRoomButton').addEventListener('click', function() {
    document.getElementById('modalOverlay').classList.remove('hidden');
  });

  document.getElementById('closeModalButton').addEventListener('click', function() {
    document.getElementById('modalOverlay').classList.add('hidden');
  });

  document.getElementById('createRoomForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Handle form submission here
    alert('salle créée avec succès!');
    document.getElementById('modalOverlay').classList.add('hidden');
  });

  // JavaScript to toggle availability status
  document.getElementById('toggleAvailability').addEventListener('click', function(event) {
    event.preventDefault();
    const availabilityStatus = document.getElementById('availabilityStatus');
    if (availabilityStatus.textContent === 'Disponible') {
      availabilityStatus.textContent = 'Non Disponible';
      availabilityStatus.classList.remove('bg-green-500');
      availabilityStatus.classList.add('bg-red-500');
      this.textContent = 'Marquer comme disponible';
    } else {
      availabilityStatus.textContent = 'Disponible';
      availabilityStatus.classList.remove('bg-red-500');
      availabilityStatus.classList.add('bg-green-500');
      this.textContent = 'Marquer comme non disponible';
    }
  });



