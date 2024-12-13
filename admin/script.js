function populateUpdateForm(id, name, type, location, description) {
    document.getElementById('update-form-section').style.display = 'block';
    document.getElementById('update-id').value = id;
    document.getElementById('update-name').value = name;
    document.getElementById('update-type').value = type;
    document.getElementById('update-location').value = location;
    document.getElementById('update-description').value = description;
}

