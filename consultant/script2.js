const workingHours = [];
const breaks = [];
const daysOff = [];

function saveWorkingHours() {
  const startHour = document.getElementById("startHour").value;
  const endHour = document.getElementById("endHour").value;
  workingHours.push(`${startHour}-${endHour}`);
  displayAvailabilitySummary();
}

function saveBreaks() {
  const breakStart = document.getElementById("breakStart").value;
  const breakEnd = document.getElementById("breakEnd").value;
  breaks.push(`${breakStart}-${breakEnd}`);
  displayAvailabilitySummary();
}

function saveDaysOff() {
  const dayOff = document.getElementById("dayOff").value;
  daysOff.push(dayOff);
  displayAvailabilitySummary();
}

function displayAvailabilitySummary() {
  document.getElementById("workingHours").textContent = workingHours.join(", ");
  document.getElementById("breaks").textContent = breaks.join(", ");
  document.getElementById("daysOff").textContent = daysOff.join(", ");
}
