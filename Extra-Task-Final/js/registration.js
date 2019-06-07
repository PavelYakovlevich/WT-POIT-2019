let password_input = document.getElementById('password');
let login_input = document.getElementById('login');
let registration_button = document.getElementById('registartion-end-button');

login_input.onchange = () =>{
    EnableRegistrationButton();
}

password_input.onchange = () =>{
    EnableRegistrationButton();
}

login_input.onkeypress = () =>{
    registration_button.disabled = true;
}

password_input.onkeypress = () =>{
    registration_button.disabled = true;
}

function EnableRegistrationButton(){
    let right_inputs = true;
    let content = login_input.value;
    let some_var = 0;

    if(content !== ''){
        let loginRegExp = new RegExp('[A-Za-z]+[A-Za-z0-9]{7,20}');
        if(loginRegExp.test(content)){
            login_input.setAttribute('class', 'input_right');
        } else{
            login_input.setAttribute('class', 'input_wrong');
            right_inputs &= false;
        }
        some_var++;
    }

    content = password_input.value;
    if(content !== ''){
        let passwordRegExp = new RegExp('[A-Za-z]+[A-Za-z0-9]{4,50}');
        console.log('login_input on change');
        if(passwordRegExp.test(content)){
            password_input.setAttribute('class', 'input_right');
        } else{
            password_input.setAttribute('class', 'input_wrong');
            right_inputs &= false;
        }
        some_var++;
    }

    if(right_inputs && some_var === 2){
        registration_button.disabled = false;
    } else{
        registration_button.disabled = true;    
    }
}
