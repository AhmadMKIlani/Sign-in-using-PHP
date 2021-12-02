$("#signup").click(function() {
    $("#first").fadeOut("fast", function() {
    $("#second").fadeIn("fast");
    });
    });
    
    $("#signin").click(function() {
    $("#second").fadeOut("fast", function() {
    $("#first").fadeIn("fast");
    });
    });
    
    
      
             $(function() {
               $("form[name='login']").validate({
                 rules: {
                   
                   email: {
                     required: true,
                     email: true
                   },
                   password: {
                     required: true,
                     
                   }
                 },
                  messages: {
                   email: "Please enter a valid email address",
                  
                   password: {
                     required: "Please enter password",
                    
                   }
                   
                 },
                 submitHandler: function(form) {
                   form.submit();
                 }
               });
             });
             
    
    
    $(function() {
      
      $("form[name='registration']").validate({
        rules: {
          firstname: "required",
          lastname: "required",
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        },
        
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          },
          email: "Please enter a valid email address"
        },
      
        submitHandler: function(form) {
          form.submit();
        }
      });
    });

// -------------------------------------------------------------------
// validation from the frontend with JS

const email = document.getElementById("email");
const pNumber = document.getElementById("mNumber");
const passWord = document.getElementById("password");
const firstName =  document.getElementById("firstname");
const lastName =  document.getElementById("lastName");

const first= document.getElementById("first-feild"); 
const secondFeild = document.getElementById("second-feild"); 
const thirdFeild = document.getElementById("third-feild"); 
const fourthFeild = document.getElementById("fourth-feild"); 
const fifthFeild = document.getElementById("fifth-feild"); 

const form = document.querySelector("form");

let mistake;


let emailRegex =  /^[a-zA-Z0-9._-]+@(hotmail|gmail|yahoo).com$/;
let phoneRegex = /077[0-9]{7}/;
let passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!%*#?&])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,8}$/;


function checkIfEmpty(){
    try{
        if(email.value === ""){
                mistake="email";
        }else if(pNumber.value === ""){
            mistake="pNumber";
        }else if(passWord.value ===""){
            mistake= "passWord";
        }
            throw "this field is required";
    }catch(error){
          show(error);
    }
}

function show(message){

if (mistake === "email"){
    first.innerText = message;
}else if (mistake === "pNumber"){
    secondFeild.innerText = message;
}else if (mistake === "passWord"){
    thirdFeild.innerText = message;
}
}

email.addEventListener("blur" , validation);
pNumber.addEventListener("blur" , validation);
passWord.addEventListener("blur" , validation);


function validation(){
    try{
        if(email.value != ""){
            if(emailRegex.test(email.value)){
                first.innerText = "";
            }else{
                throw "this email is the wrong format";
            }

        }else{
            checkIfEmpty();
        }
        if(pNumber.value != ""){
            if(phoneRegex.test(pNumber.value)){
                secondFeild.innerText = "";
            }else{
                throw "this number is the wrong format";
            }

        }else{
            checkIfEmpty();
        }

        if(passWord.value != ""){
            if(passwordRegex.test(passWord.value)){
                thirdFeild.innerText = "";
            }else{
                throw "the password needs to be fixed";
            }

        }else{
            checkIfEmpty();
        }


    }catch(error){
        show(error);
    }
}


form.addEventListener("submit" ,(e)=>{
    // e.preventDefault();
    if(first.innerText === "" && secondFeild.innerText === "" && thirdFeild.innerText === ""&& terms.checked) {
          
    }else{
        firstCheck.innerText = "terms and conditions are not checked";
    }
})


    