let inputEmail = document.querySelector('#email');
let inputPassword = document.querySelector('#password');
let inputName = document.querySelector('#nom');
const roleInputs = document.querySelectorAll('input[name="role"]');

inputEmail.addEventListener('keyup', () => {
    let valueInput = inputEmail.value.trim();
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (emailRegex.test(valueInput)) {
        inputEmail.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        inputEmail.classList.add('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
    } else {
        inputEmail.classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        inputEmail.classList.remove('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
    }
});

inputPassword.addEventListener('keyup', () => {
    let valueInput = inputPassword.value.trim(); 

    if (valueInput.length >= 8) {
        inputPassword.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        inputPassword.classList.add('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
    } else {
        inputPassword.classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        inputPassword.classList.remove('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
    }
});

inputName.addEventListener('keyup', () => {
    const valueInputName = inputName.value.trim();

    if (valueInputName.length < 6) {
        inputName.classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        inputName.classList.remove('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
    } else {
        inputName.classList.add('border-gray-200', 'focus:ring-teal-500', 'focus:border-teal-500');
        inputName.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
    }
});