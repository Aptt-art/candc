// Gestion du menu mobile
document.addEventListener("DOMContentLoaded", function () {
    // Ajoutez ici votre JavaScript
  });
  
  // Gestion du calendrier de réservation
  class Reservation {
    constructor() {
      this.selectedDate = new Date();
      this.selectedTime = null;
    }
  
    init() {
      // Initialisation du calendrier
      this.initCalendar();
      this.initTimeSlots();
    }
  
    initCalendar() {
      // Implémentez votre logique de calendrier ici
    }
  
    initTimeSlots() {
      const timeSlots = document.querySelectorAll(".time-slot");
      timeSlots.forEach((slot) => {
        slot.addEventListener("click", () => this.selectTimeSlot(slot));
      });
    }
  
    selectTimeSlot(slot) {
      this.selectedTime = slot.dataset.time;
      // Mise à jour de l'UI
    }
  }
  
  // Initialisation si on est sur la page de réservation
  if (document.querySelector(".reservation-page")) {
    const reservation = new Reservation();
    reservation.init();
  }
  