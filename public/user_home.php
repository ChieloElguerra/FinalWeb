<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Life Activities</title>
    <style>
        /* Add your CSS styles here */
        /* Style for the form container */
#addActivityForm {
    max-width: 400px;
    margin: 0 auto;
}

/* Style for form labels */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Style for form inputs */
input[type="text"],
input[type="date"],
input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Style for the Add Activity button */
button[type="button"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Style for the Add Activity button on hover */
button[type="button"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h1>Manage  Life Activities</h1>

    <!-- Form for adding a new activity -->
   <form id="editActivityForm">
    <input type="hidden" id="editActivityIndex" value="">
    <label for="editActivityName">Name:</label>
    <input type="text" id="editActivityName" required><br>

    <label for="editActivityDate">Date:</label>
    <input type="date" id="editActivityDate" required><br>

    <label for="editActivityTime">Time:</label>
    <input type="time" id="editActivityTime" required><br>

    <label for="editActivityLocation">Location:</label>
    <input type="text" id="editActivityLocation" required><br>

    <label for="editActivityOOTD">OOTD (Outfit of the Day):</label>
    <input type="text" id="editActivityOOTD" required><br>

     <button type="button" onclick="addActivity()">Add Activity</button>
    <button type="button" onclick="updateActivity()">Update Activity</button>
    <button type="button" onclick="cancelEdit()">Cancel</button>
   


</form>

    <!-- Table to display all activities -->
    <h2>All Activities</h2>
    <table id="activityTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>OOTD</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Activity rows will be dynamically added here -->
        </tbody>
    </table>


    <!-- JavaScript code to handle functionality -->
    <script>
       // Function to add a new activity
function addActivity() {
    const name = document.getElementById('activityName').value;
    const date = document.getElementById('activityDate').value;
    const time = document.getElementById('activityTime').value;
    const location = document.getElementById('activityLocation').value;
    const ootd = document.getElementById('activityOOTD').value;

    const activity = {
        name,
        date,
        time,
        location,
        ootd,
    };

    activities.push(activity);

    // Clear input fields
    document.getElementById('activityName').value = '';
    document.getElementById('activityDate').value = '';
    document.getElementById('activityTime').value = '';
    document.getElementById('activityLocation').value = '';
    document.getElementById('activityOOTD').value = '';

    // Refresh the activity table
    displayActivities();
}

// Function to update an activity
function updateActivity() {
    // Get the index of the activity being edited
    const index = document.getElementById('editActivityIndex').value;

    // Update the activity with the edited values
    activities[index].name = document.getElementById('editActivityName').value;
    activities[index].date = document.getElementById('editActivityDate').value;
    activities[index].time = document.getElementById('editActivityTime').value;
    activities[index].location = document.getElementById('editActivityLocation').value;
    activities[index].ootd = document.getElementById('editActivityOOTD').value;

    // Hide the edit form
    document.getElementById('editActivityForm').style.display = 'none';

    // Refresh the activity table
    displayActivities();
}

// Function to cancel the edit and hide the edit form
function cancelEdit() {
    // Clear the values in the edit form
    document.getElementById('editActivityIndex').value = '';
    document.getElementById('editActivityName').value = '';
    document.getElementById('editActivityDate').value = '';
    document.getElementById('editActivityTime').value = '';
    document.getElementById('editActivityLocation').value = '';
    document.getElementById('editActivityOOTD').value = '';

    // Hide the edit form
    document.getElementById('editActivityForm').style.display = 'none';
}


    </script>
</body>
</html>
