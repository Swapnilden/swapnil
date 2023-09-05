document.addEventListener("DOMContentLoaded", function() {
    const calendarDiv = document.getElementById("calendar");
    const selectedSlotParagraph = document.getElementById("selected-slot");
    const emailInput = document.getElementById("email");
    const bookButton = document.getElementById("book-button");
    
    const availability = [
      { id: 1, date: '2023-09-10', time: '10:00 AM - 11:00 AM' },
      { id: 2, date: '2023-09-10', time: '11:30 AM - 12:30 PM' },
    ];
  
    availability.forEach(slot => {
      const slotDiv = document.createElement("div");
      slotDiv.classList.add("time-slot");
      slotDiv.textContent = `${slot.date} - ${slot.time}`;
      
      slotDiv.addEventListener("click", function() {
        selectedSlotParagraph.textContent = `Selected Slot: ${slot.date} - ${slot.time}`;
      });
      
      calendarDiv.appendChild(slotDiv);
    });
  
    bookButton.addEventListener("click", async function() {
      const selectedSlot = selectedSlotParagraph.textContent.replace("Selected Slot: ", "");
      const email = emailInput.value;
  
      if (selectedSlot && email) {
        const response = await fetch("book-appointment.php", {
          method: "POST",
          body: JSON.stringify({ date: selectedSlot.split(" - ")[0], time: selectedSlot.split(" - ")[1], email: email })
        });
  
        const responseData = await response.text();
  
        if (responseData === "Appointment booked successfully!") {
          alert("Appointment booked successfully! Confirmation email sent.");
        } else {
          alert("Error booking appointment. Please try again.");
        }
      }
    });
  });
  