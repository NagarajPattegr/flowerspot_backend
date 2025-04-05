document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Example dynamic values — replace with actual values from your app context
        const fid = new URLSearchParams(window.location.search).get("fid");
        const price = new URLSearchParams(window.location.search).get("price");
        const user_id =  new URLSearchParams(window.location.search).get("user_id")

  
        const formData = new FormData(form);

        const actionUrl = `./controllers/orderController.php?fid=${encodeURIComponent(fid)}&price=${encodeURIComponent(price)}&user_id=${encodeURIComponent(user_id)}`;

        fetch(actionUrl, {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            if(result == "success"){
            alert("Order placed successfully!");
            }else{
            console.log(result);
            alert(result);
            }
        })
        .catch(error => {
            alert("Error placing order.");
            console.error("Error:", error);
        });
    });
});
