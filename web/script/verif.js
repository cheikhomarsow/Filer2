            window.onload = function(){
                console.log('Sahra');
                var errorBlock = document.getElementById('errorBlock');
              
                function passwordValidation(password){
                    var paternpassword =/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                    return paternpassword.test(password);
                }

                function passwordValue(password){
                    var passwordValue = document.forms['form'].elements['password'].value;
                    return passwordValue;
                }

                function passwordVerifValue(verifpassword){
                    var passwordVerifValue = document.forms['form'].elements['verifpassword'].value;
                    return passwordVerifValue;
                }

                document.forms['form']['username'].focus();
                var paternpassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
                var passwordVerifValidator = document.querySelector("#spanVerifPassword");
                var comparePassword = document.querySelector("#comparePassword");
                var passwordValidator = document.querySelector("#spanPassword");
                var registerForm = document.forms['form'];

                registerForm.elements['password'].addEventListener("change", function(){

                    if(passwordValidation(this.value)===false){
                       passwordValidator.innerHTML = '<p id="passwordFalse">at least one number, one lowercase, one uppercase letter and six characters</p>';
                   }
                   else{
                       passwordValidator.innerHTML = '<img class="icon" src="assets/img/delete.png" alt="">';
                   }
               })

                /*registerForm.elements['verifpassword'].addEventListener("change", function(){

                    if(passwordVerifValue(this.value)!=passwordValue(this.value)){
                       passwordVerifValidator.innerHTML = '<img class="icon" src="assets/img/wrong.png" alt="">';
                   }
                   else{
                       passwordVerifValidator.innerHTML = '<img class="icon" src="assets/img/right.png" alt="">';
                   }
               })*/

                document.forms['form'].onsubmit = function(){
                  console.log('Hi sahra');
                    errorBlock.innerHTML = '';
                    var formValid = true;
                    var username = this.elements['username'].value;
                    var lastname = this.elements['lastname'].value;
                    var password = this.elements['password'].value;
                    var passwordCheck = this.elements['verifpassword'].value;
                    var myEmail = this.elements['email'].value;
                    var paternemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    var paternpassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
                    console.log(username);
                    if(username.length === 0){
                        formValid = false;
                        errorBlock.innerHTML = '<p id="done"> Please refer your username</p> ';
                    }
                    if(lastname.length === 0){
                        formValid = false;
                        errorBlock.innerHTML = '<p id="done"> Please refer your lastname</p> ';
                    }

                    if(paternpassword.test(password)==false){
                        formValid = false;
                        errorBlock.innerHTML += '<p id="done">at least one number, one lowercase, one uppercase letter and six characters </p>';
                    }

                    if(password !== passwordCheck){
                        formValid = false;
                        errorBlock.innerHTML += '<p id="done">Your password and his verification are not the same</p>';
                    }

                    if(paternemail.test(myEmail)==false){
                        formValid = false;
                        errorBlock.innerHTML += '<p id="done">Wrong email</p>';
                    }

                    if(formValid === false) {
                        return false;
                    }
                    return true;
                };


            };