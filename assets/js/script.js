document.getElementById('addUserButton').addEventListener('click', () => {
    document.querySelector('.addUserWrapper').classList.add('active');

    document.querySelector('.addUserWrapper .close-icon').addEventListener('click', () => {
        document.querySelector('.addUserWrapper').classList.remove('active');
    });

    document.getElementById('createAccountForm').addEventListener('submit', (event) => {
        event.preventDefault();
    
        let name = document.getElementById('nameInput').value;
        let username = document.getElementById('usernameInput').value;
        let email = document.getElementById('emailInput').value;
        let city = document.getElementById('cityInput').value;
        let street = document.getElementById('streetInput').value;
        let zipCode = document.getElementById('zipCodeInput').value;
        let phone = document.getElementById('phoneInput').value;
        let companyName = document.getElementById('companyNameInput').value;
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./partials/addUser.php", false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            document.querySelector('.actionConfirmationWrapper').classList.remove('active');
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let response = xhr.responseText;
                    console.log(response);
                } else {
                    console.log(xhr.responseText);
                }
            }
        };
        xhr.send(
                "name=" + name + 
                "&username=" + username + 
                "&email=" + email + 
                "&city=" + city + 
                "&street=" + street + 
                "&zipCode=" + zipCode + 
                "&phone=" + phone + 
                "&companyName=" + companyName
                );
        location.reload();
    });
});

const removeUser = (element) => {
    let string = element.id;
    let elementId = string.split('_')[1];
    
    document.querySelector('.actionConfirmationWrapper').classList.add('active');

    document.querySelector('.actionConfirmationWrapper .close-icon').addEventListener('click', () => {
        document.querySelector('.actionConfirmationWrapper').classList.remove('active');
    });

    document.getElementById('cancelDeleting').addEventListener('click', () => {
        document.querySelector('.actionConfirmationWrapper').classList.remove('active');
    });
    
    document.getElementById('continueDeleting').addEventListener('click', () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./partials/deleteUser.php", false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            document.querySelector('.actionConfirmationWrapper').classList.remove('active');
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let response = xhr.responseText;
                    console.log(response);
                } else {
                    console.log(xhr.responseText);
                }
            }
        };
        xhr.send(
                "id=" + elementId
                );
        location.reload();
    });
};