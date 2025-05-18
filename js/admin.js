const form = document.querySelector('#myform');
const submit = document.querySelector("#submit");
const message = document.getElementById("msg");

form.addEventListener("click",()=>{
    if(errormessage.style.display=="block")
    errormessage.style.display="none";
})

form.addEventListener("submit" , async (e)=>{
    e.preventDefault();
    const formData = new FormData(form);
    console.log(formData);
    const response = await fetch('./controllers/adminController.php',
        {
            method:"POST",
            body:formData
        }
    );
    const data = await response.text();
    if(data == "success"){
        form.reset();
        message.style.display="block";
        message.style.color="green";
        message.innerHTML="Product added";
    }else{
        form.reset();
        message.style.display="block";
        message.innerHTML="Error";
        message.style.color="#e97070";
    }
    console.log(data);
})


