const form = document.querySelector('#myform');
const submit = document.querySelector("#submit");
const errormessage = document.getElementById("error");

form.addEventListener("submit" , async (e)=>{
    e.preventDefault();
    const formData = new FormData(form);
    console.log(formData);
    const response = await fetch('./controllers/loginController.php',
        {
            method:"POST",
            body:formData
        }
    );
    const data = await response.text();
    console.log(data);
    if(data == "success"){
        location.href="index.php";
    }
    else if(data == "admin"){
        location.href="admin.php";
    }
    else{
        errormessage.style.display="block";
        errormessage.innerHTML=data;
    }
})
