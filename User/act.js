
const form = document.getElementById('activity-form');
const nameInput = document.getElementById('name');
const dateInput = document.getElementById('date');
const timeInput = document.getElementById('time');
const locationInput = document.getElementById('location');
const ootdInput = document.getElementById('ootd');
const submitButton = document.getElementById('submit-btn');
const activityItems = document.getElementById('activity-items');
const editButton = document.getElementById('edit-btn');


function addActivity() {
    // Basic data validation (you can add more validation as needed)
    if (!nameInput.value || !dateInput.value || !timeInput.value || !locationInput.value || !ootdInput.value) {
        alert("Please fill in all required fields.");
        return;
    }

    const activity = {
        name: nameInput.value,
        date: dateInput.value,
        time: timeInput.value,
        location: locationInput.value,
        ootd: ootdInput.value,
    };

    activities.push(activity);

    // Display the activity in the list
    displayActivities();

    // Clear the form
    clearForm();

    // Store updated activities in local storage
    localStorage.setItem('activities', JSON.stringify(activities));
}
function editActivity(id, name, date, time, location, ootd) {
    nameInput.value = name;
    dateInput.value = date;
    timeInput.value = time;
    locationInput.value = location;
    ootdInput.value = ootd;

    submitButton.style.display = 'none';
    editButton.style.display = 'block';

    const newAction = `activity/updateActivity.php?id=${id}`;
    form.setAttribute('action', newAction);

    editButton.onclick = function () {
        updateActivityInDatabase();
    };
}
function deleteActivity(id) {
    const confirmDelete = window.confirm("Are you sure you want to delete this activity?");

    if (confirmDelete) {
        window.location.href = `activity/deleteActivity.php?id=${id}`;
    }
}
function updateActivityInDatabase() {
    alert("Activity updated successfully!");
}


document.getElementById("activity-form").addEventListener("submit", function (event) {
    // event.preventDefault();
    alert("Activity added successfully!");
});
function clearForm() {
    nameInput.value = '';
    dateInput.value = '';
    timeInput.value = '';
    locationInput.value = '';
    ootdInput.value = '';
}