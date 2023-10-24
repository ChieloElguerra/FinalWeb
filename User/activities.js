// Define an array to store activities, initially checking local storage for any stored data
let activities = JSON.parse(localStorage.getItem('activities')) || [];

// Get form elements
const form = document.getElementById('activity-form');
const nameInput = document.getElementById('name');
const dateInput = document.getElementById('date');
const timeInput = document.getElementById('time');
const locationInput = document.getElementById('location');
const ootdInput = document.getElementById('ootd');
const submitButton = document.getElementById('submit-btn');
const activityItems = document.getElementById('activity-items');
const editButton = document.getElementById('edit-btn');



// Function to add an activity
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

// Function to display activities as a table
function displayActivities() {
    activityItems.innerHTML = '';

    if (activities.length === 0) {
        return;
    }

    const table = document.createElement('table');
    table.classList.add('activity-table');

    // Create table header
    const headerRow = table.insertRow(0);
    const headers = ['Name', 'Date', 'Time', 'Location', 'OOTD', 'Actions'];

    for (let i = 0; i < headers.length; i++) {
        const headerCell = document.createElement('th');
        headerCell.textContent = headers[i];
        headerRow.appendChild(headerCell);
    }

    // Create table rows with data
    for (let i = 0; i < activities.length; i++) {
        const activity = activities[i];
        const row = table.insertRow(i + 1);

        const nameCell = row.insertCell(0);
        nameCell.textContent = activity.name;

        const dateCell = row.insertCell(1);
        dateCell.textContent = activity.date;

        const timeCell = row.insertCell(2);
        timeCell.textContent = activity.time;

        const locationCell = row.insertCell(3);
        locationCell.textContent = activity.location;

        const ootdCell = row.insertCell(4);
        ootdCell.textContent = activity.ootd;

        const actionCell = row.insertCell(5);

        // Create the "Edit" button
        const editButton = document.createElement('button');
        editButton.classList.add('btn');
        editButton.classList.add('btn-primary');
        editButton.textContent = 'Edit';
        editButton.onclick = function () {
            editActivity(i);
        };
        actionCell.appendChild(editButton);

        // Create the "Delete" button
        const deleteButton = document.createElement('button');
        deleteButton.classList.add('btn');
        deleteButton.classList.add('btn-danger');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = function () {
            deleteActivity(i);
        };
        actionCell.appendChild(deleteButton);
    }

    activityItems.appendChild(table);

    // Store the updated activities in local storage after displaying
    localStorage.setItem('activities', JSON.stringify(activities));
}

// Function to edit an activity
function editActivity(index) {
    const activity = activities[index];
    nameInput.value = activity.name;
    dateInput.value = activity.date;
    timeInput.value = activity.time;
    locationInput.value = activity.location;
    ootdInput.value = activity.ootd;

    submitButton.style.display = 'none';
    editButton.style.display = 'block';

    // Update the activity on edit
    editButton.onclick = function () {
        // Update the activity in the array
        activities[index] = {
            name: nameInput.value,
            date: dateInput.value,
            time: timeInput.value,
            location: locationInput.value,
            ootd: ootdInput.value,
        };

        // Update the displayed activities
        displayActivities();

        // Update the database (you can add an AJAX request here)
        updateActivityInDatabase(index);

        clearForm();

        submitButton.style.display = 'block';
        editButton.style.display = 'none';
    };
}

// Function to update an activity in the database (you can customize this)
function updateActivityInDatabase(index) {
    const activity = activities[index];

    // Show an alert to indicate successful update (you can customize this)
    alert("Activity updated successfully!");
}

// Function to delete an activity
function deleteActivity(index) {
    const confirmDelete = window.confirm("Are you sure you want to delete this activity?");
    
    if (confirmDelete) {
        activities.splice(index, 1); // Remove the activity from the array
        displayActivities(); // Update the displayed activities
    }
}



// Initial display of activities
displayActivities();

// Rest of your code for edit and form submission...
// JavaScript Functionality For the Add Activity
document.getElementById("activity-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form data
    const formData = new FormData(event.target);

    // Make an AJAX request to activities.php
    fetch("activities.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            alert("Activity added successfully!");
            // You can add more code here to update the UI if needed
        } else {
            alert("Failed to add activity. Please try again.\nError: " + data.error);
        }
    })
    .catch((error) => {
        console.error("Error:", error);


    });
});

// ... (your existing code)

// Function to clear the form
function clearForm() {
    nameInput.value = '';
    dateInput.value = '';
    timeInput.value = '';
    locationInput.value = '';
    ootdInput.value = '';
}

// Add event listener for form submission
form.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission
    addActivity();
    
    // Clear the form after adding activity
    clearForm();
});

// ... (your existing code continues)

