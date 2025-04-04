const url =new URLSearchParams(window.location.search)
const id = url.get('user_id');
const container = document.querySelector(".cartcontainer");
async function getCartItems() {
    try {
        const response = await fetch(`./controllers/cartcontroller.php?id=${id}`
        );
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        console.log("Cart data:", data);
        return data;
    } catch (error) {
        console.error("Error fetching cart items:", error);
    }
}
async function renderItems(){
    container.innerHTML='';
    const items = await getCartItems();
    const card = document.createElement("div");
    card.classList.add("card");
    console.log(items);
    items.forEach((item ,index) => {
        card.innerHTML += `
    <img src="${item.image}" alt="${item.flower_name}" class="card-img">
    <div class="card-content">
        <h3 class="card-title">${item.flower_name}</h3>
        <p class="card-type"> ${item.type}</p>
        <p class="card-price">Price: ${item.price}</p>
                  <button class="view" id="${index}">View</button>
                <button class="remove" id="${item.cart_id}">Remove</button>
    </div>
`;
container.appendChild(card);
    });
}

document.addEventListener("DOMContentLoaded", async(e) => {
    e.preventDefault();
    const items = await getCartItems();
    renderItems();
container.addEventListener("click",async(e)=>{
    if(e.target.classList.contains("remove")){
        console.log(e.target.getAttribute("id"));
        fetch(`./controllers/cartcontroller.php?id=${e.target.getAttribute("id")}`,
            {
                method:"DELETE",
            }
        ).then(res=>res.text())
        .then(data=>alert(data))
        .catch(err=>alert("error"));
        renderItems();
    }
    if(e.target.classList.contains("view")){
    const item = items.filter((item,index)=>index == e.target.getAttribute("id"));
    // console.log(item[0].flower_name)
    location.href=`product.php?name=${encodeURIComponent(item[0].flower_name)}&price=${encodeURIComponent(item[0].price)}&description=${encodeURIComponent(item[0].description)}&link=${encodeURIComponent(item[0].image)}&pid=${encodeURIComponent(item[0].flower_id)}&type=${encodeURIComponent(item[0].type)}"`.trim();
    }
})
    });