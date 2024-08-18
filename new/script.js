function selectLocation(name, city) {
    // Store the selected location in localStorage
    localStorage.setItem('selectedLocation', JSON.stringify({ name: name, city: city }));
    
    // Redirect to the date and time selection page
    window.location.href = "selectingtime.php";
}
