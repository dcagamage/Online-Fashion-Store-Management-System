/*// Section switching
const navButtons = document.querySelectorAll('.navbar button');
const sections = document.querySelectorAll('.section');

navButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    navButtons.forEach(btn => btn.classList.remove('active'));
    sections.forEach(sec => sec.classList.remove('active'));

    button.classList.add('active');
    sections[index].classList.add('active');
  });
});



// Profile editing
const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const profileInputs = document.querySelectorAll('#profileForm input');
const successMessage = document.getElementById('successMessage');

editBtn.addEventListener('click', () => {
  profileInputs.forEach(input => input.disabled = false);
  editBtn.classList.add('d-none');
  saveBtn.classList.remove('d-none');
});

document.getElementById('profileForm').addEventListener('submit', function (e) {
  e.preventDefault();

  saveBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Saving...`;
  saveBtn.disabled = true;

  setTimeout(() => {
    profileInputs.forEach(input => input.disabled = true);

    saveBtn.innerHTML = 'Save Changes';
    saveBtn.disabled = false;
    saveBtn.classList.add('d-none');
    editBtn.classList.remove('d-none');

    // Show success message
    successMessage.classList.remove('d-none');
    successMessage.classList.add('fade', 'show');

    // Hide after 3 seconds
    setTimeout(() => {
      successMessage.classList.remove('show');
      successMessage.classList.add('d-none');
    }, 3000);
  }, 1500);
});
*/

// Profile Edit/Save Toggle
const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const inputs = document.querySelectorAll('#profileForm input');

editBtn.addEventListener('click', () => {
  inputs.forEach(input => input.disabled = false);
  editBtn.classList.add('d-none');
  saveBtn.classList.remove('d-none');
});

document.getElementById('profileForm').addEventListener('submit', (e) => {
  e.preventDefault();
  inputs.forEach(input => input.disabled = true);
  saveBtn.classList.add('d-none');
  editBtn.classList.remove('d-none');

  alert('✅ Profile updated successfully!');
});




