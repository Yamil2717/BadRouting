ButtonRegister = document.getElementById('ButtonRegister');
ButtonRegister.addEventListener('click', UserRegisterClick);

ButtonChangePassword = document.getElementById('ButtonChangePassword');
ButtonChangePassword.addEventListener('click', ChangePasswordClick);

ButtonDeleteUser = document.getElementById('ButtonDeleteUser');
ButtonDeleteUser.addEventListener('click', DeleteUserClick);

let UserRegister = document.getElementById('user-register');
let ChangePassword = document.getElementById('change-password');
let DeleteUser = document.getElementById('delete-user');

function UserRegisterClick() {
    if(ChangePassword.style.display === 'block') {
        UserRegister.style.display = 'block';
        ChangePassword.style.display = 'none';
    } 
    else if (DeleteUser.style.display === 'block') {
        UserRegister.style.display = 'block';
        DeleteUser.style.display = 'none';
    } 
    else if (UserRegister.style.display === 'block') {
        UserRegister.style.display = 'none';
    } 
    else {
        UserRegister.style.display = 'block';
    }
}

function ChangePasswordClick() {
    if(UserRegister.style.display === 'block') {
        ChangePassword.style.display = 'block';
        UserRegister.style.display = 'none';
    }
    else if (DeleteUser.style.display === 'block') {
        ChangePassword.style.display = 'block';
        DeleteUser.style.display = 'none';
    }
    else if (ChangePassword.style.display === 'block') {
        ChangePassword.style.display = 'none';
    }
    else {
        ChangePassword.style.display = 'block';
    }
}

function DeleteUserClick() {
    if(ChangePassword.style.display === 'block') {
        DeleteUser.style.display = 'block';
        ChangePassword.style.display = 'none';
    }
    else if (UserRegister.style.display === 'block') {
        DeleteUser.style.display = 'block';
        UserRegister.style.display = 'none';
    }
    else if (DeleteUser.style.display === 'block') {
        DeleteUser.style.display = 'none';
    }
    else {
        DeleteUser.style.display = 'block';
    }
}