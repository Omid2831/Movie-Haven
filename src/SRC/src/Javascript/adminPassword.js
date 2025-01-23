document.getElementById("passwordSubmit").addEventListener("click", function(){
    var enteredPass = document.getElementById("adminPassword").value;
    if(enteredPass == "admin"){
        window.location.replace("../features/unansweredQuestions.php");
    }else{
        window.alert("wrong password");
    }
});