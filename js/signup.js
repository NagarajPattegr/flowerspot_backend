const form = document.querySelector('#myform');
const submit = document.querySelector("#submit");
const errormessage = document.getElementById("error");


form.addEventListener("submit" , async (e)=>{
    e.preventDefault();
    const formData = new FormData(form);
    // console.log(formData);
    const response = await fetch('./controllers/signupController.php',
        {
            method:"POST",
            body:formData
        }
    );
    const data = await response.text();
    if(data == "success"){
        location.href="login.php";
    }else{
        errormessage.style.display="block";
        errormessage.innerHTML=data;
    }
})