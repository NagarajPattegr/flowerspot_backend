document.addEventListener("DOMContentLoaded", async function () {
    const container = document.querySelector('.container');
    let flowers = [];


    async function fetchFlowers() {
        try {
            const response = await fetch('./controllers/indexController.php');
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            flowers = await response.json(); 
            console.log("Flowers data:", flowers);
            renderProduct(flowers); 
        } catch (error) {
            console.error('Error fetching flower data:', error);
        }
    }

    await fetchFlowers(); 


    document.getElementById("Decoration").addEventListener("click", () => {
        const decorationFlowers = flowers.filter(val => val.type === "Decoration");
        setActiveButton("Decoration");
        renderProduct(decorationFlowers);
    });

    document.getElementById("Gift").addEventListener("click", () => {
        const giftFlowers = flowers.filter(val => val.type === "Gift");
        setActiveButton("Gift");
        renderProduct(giftFlowers);
    });

    document.getElementById("All").addEventListener("click", () => {
        setActiveButton("All");
        renderProduct(flowers);
    });

    function setActiveButton(activeId) {
        document.getElementById("Decoration").style.transform = activeId === "Decoration" ? "scale(1.1)" : "scale(1)";
        document.getElementById("Gift").style.transform = activeId === "Gift" ? "scale(1.1)" : "scale(1)";
        document.getElementById("All").style.transform = activeId === "All" ? "scale(1.1)" : "scale(1)";
    }

    function renderProduct(flowers) {
        container.innerHTML = ""; 

        flowers.forEach(flower => {
            let box = document.createElement('div');
            box.classList.add("card");
            box.setAttribute("id", flower.flower_id);

            box.innerHTML = `<a href="./product.php?name=${encodeURIComponent(flower.flower_name)}&price=${encodeURIComponent(flower.price)}&description=${encodeURIComponent(flower.description)}&link=${encodeURIComponent(flower.image)}&pid=${encodeURIComponent(flower.flower_id)}&type=${encodeURIComponent(flower.type)}"><img src="${flower.image}" class="image" alt="${flower.flower_name}"><p class="name">${flower.flower_name}</p><p class="price">₹${flower.price}</p></a>`.trim();

            container.appendChild(box);
        });
    }
});
