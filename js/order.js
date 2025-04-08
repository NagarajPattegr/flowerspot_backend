const url =new URLSearchParams(window.location.search)
const id = url.get('user_id');
const container = document.querySelector(".ordercontainer");
async function getOrderItems() {
    try {
        const response = await fetch(`./controllers/ordercontroller.php?id=${id}`
        );
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        console.log("Order data:", data);
        return data;
    } catch (error) {
        console.error("Error fetching cart items:", error);
    }
}
async function  renderOrders(){
    const items = await getOrderItems();
    items.forEach(item => {
        const card = document.createElement("div");
        card.classList.add("card");
    
        card.innerHTML += `
            <img src="${item.image}" alt="${item.flower_name
            }" class="card-img">
            <div class="card-content">
                <h3 class="card-title">${item.flower_name}</h3>
                <p class="card-type"> ${item.type}</p>
                <p class="card-price">Price: ${item.price}</p>
            </div>
        `;
    
        container.appendChild(card); 
    });
}
document.addEventListener("DOMContentLoaded",()=>{
renderOrders();
})