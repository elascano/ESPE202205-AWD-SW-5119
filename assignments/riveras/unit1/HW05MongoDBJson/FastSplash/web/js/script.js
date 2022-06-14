function validateCI() {
    var cad = document.getElementById("ci").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longCheck = longitud - 1;
    var message = "";

    if (cad !== "" && longitud == 10){
        if(isNaN(cad))
        {
            alert("A valid CI must only contain numbers and no letters");	
            return false;
        }
        else{
            for(var i = 0; i < longCheck; i++){
                if (i%2 === 0) {
                    var aux = cad.charAt(i) * 2;
                    if (aux > 9) aux -= 9;
                    total += aux;
                } else {
                    total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
                }
            }

            total = total % 10 ? 10 - total % 10 : 0;

            if (cad.charAt(longitud-1) == total) {
                return true;
            }else{
                alert("You must enter an Ecuadorian CI");	
                return false;				
            }
        }
    }
    else{
        alert("The CI must not have more than 10 digits");
        return false;
    }
}

function validateEcCI(cad){
    cad.trim();
    var total = 0;
    var longitud = cad.length;
    var longCheck = longitud - 1;
    var message = "";
    var flag = false;

    if (cad !== "" && longitud == 10){
        if(isNaN(cad))
        {
            message += " - CI must only contain numbers and no letters\n";	
            flag = false;
        }
        else{
            for(var i = 0; i < longCheck; i++){
                if(i == 0) {
                    let firstNumbers = parseInt(cad.charAt(i)) * 10 + parseInt(cad.charAt(i+1));
                    if(firstNumbers >= 25){
                        message += " - CI doesn't correspond to any Ecuadorian province\n";
                        flag = false;
                    }
                }
                if (i%2 === 0) {
                    var aux = cad.charAt(i) * 2;
                    if (aux > 9) aux -= 9;
                    total += aux;
                } else {
                    total += parseInt(cad.charAt(i));
                }
            }

            total = total % 10 ? 10 - total % 10 : 0;

            if (cad.charAt(longitud-1) == total) {
                flag = true;
            }else{
                message += " - CI must be ecuadorian\n";	
                flag = false;			
            }
        }
    }
    else{
        message += " - CI must have 10 digits\n";
        flag = false;
    }
    return [message, flag];
}

function getDate(adition){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    }

    date = (yyyy + parseInt(adition)) + '-' + mm + '-' + dd;
    return date;
}

document.getElementById("bornDate").setAttribute("min",getDate("-100"));
document.getElementById("bornDate").setAttribute("max",getDate("0"));

function validateDate(date){
    var today = new Date();
    var yyToday = today.getFullYear();

    var dateArr = date.split("-");
    var yyDate = dateArr[0];
    return ((yyToday - yyDate) < 100) && (yyToday >= yyDate);
}

document.getElementById("save").addEventListener("click",function(){
    var firstName = document.getElementById("firstName");
    var lastName = document.getElementById("lastName");
    var ci = document.getElementById("ci");
    var bornDate = document.getElementById("bornDate");
    var email = document.getElementById("email");
    var flag = false;
    var message = "!!Error!!\n\n";

    nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;
    emailRegex = /^^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if(firstName.value == "" || lastName.value == "" || ci.value == "" || bornDate.value == ""){
        message += " * There can be no blank fields\n";
    } 

    if(!nameRegex.test(firstName.value)){
        message += " - The first name field accepts just letters and spaces\n";
        firstName.focus();
        flag = true;
    }

    if(!nameRegex.test(lastName.value)){
        message += " - The last name field accepts just letters and spaces\n";
        lastName.focus();
        flag = true;
    }

    if(!validateEcCI(ci.value)[1]){
        ci.focus();
        flag = true;
    }

    if(!validateDate(bornDate.value)) {
        message += " - The date cannot be passed today or before 100 years\n"
        bornDate.focus();
        flag = true;
    }  
    message += validateEcCI(ci.value)[0];

    if(!emailRegex.test(email.value)) {
        message += " - The email must follow the format: example@exp.ex\n"
        email.focus();
        flag = true;
    } 

    if(!flag){
        //alert("Saved Correctly");
        document.getElementById("form1").submit();
    } else {
        alert(message);
    }
    flag = false;
})