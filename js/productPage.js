document.addEventListener("DOMContentLoaded", () => {
    const buy = document.getElementById("buyNowBtn");
    const d = new URLSearchParams(window.location.search)
    const name = document.getElementById("productName").innerHTML = d.get('name')
    const price = document.getElementById("productPrice").innerHTML += `${d.get('price')}`;
    const type = document.getElementById("productType").innerHTML =`${d.get('description')}`
    const productDescription = document.getElementById("productDescription").innerHTML =`Type:${d.get('type')}`
    const pid=d.get('pid')
    document.getElementById("productImage").setAttribute("src", d.get('link'))
    const uid = document.getElementById('session').innerText;
    
    document.getElementById("buyNowBtn").setAttribute("href", `../Checkout/Checkout.html?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}&type=${encodeURIComponent(type)}&link=${encodeURIComponent(d.get('link'))}&pid=${encodeURIComponent(pid)}`)
    document.getElementById("addToCartBtn").setAttribute("href", `../Cart/cart.html?name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}&type=${encodeURIComponent(type)}&link=${encodeURIComponent(d.get('link'))}&pid=${encodeURIComponent(pid)}`)
    
    
    document.getElementById("submit").addEventListener("click",async ()=>{
         const comment=document.getElementById("reviewText").value;
         const response = await fetch("./controllers/productController.php",
            {
                method:"POST",
                headers:{
                    'Content-Type':"application/json"
                },
                body:JSON.stringify({
                    commentText:comment,
                    flowerId:pid,
                    id:uid,
                    price:price
                })
            }
         );
         const data =await response.text();
    })
    const commentSection = document.getElementById("review-section");

    setInterval(()=>{
        async function getComments() {
            try {
                const response = await fetch(`./controllers/productController.php?flowerId=${pid}`);
                const comments = await response.json();
        
                if (comments.length > 0) {
                    commentSection.innerHTML = ""; 
        
                    comments.forEach(comment => {
                        const commentCard = document.createElement("div");
                        commentCard.classList.add("comment-card");
        
                        commentCard.innerHTML = `
                            <div class="comment-content">
                                <p><strong>${comment.user_name}</strong></p>
                                <p>${comment.comment}</p>
                                <small>${comment.date}</small>
                            </div>
                        `;
        
                        commentSection.appendChild(commentCard);
                    });
                } else {
                    commentSection.innerHTML = "<p>No comments yet.</p>";
                }
            } catch (error) {
                console.error("Failed to fetch comments:", error);
            }
        }
        
        getComments();
        
    },1000);
    document.getElementById("addToCartBtn").addEventListener("click",async (e)=>{
        e.preventDefault();
        const response = await fetch("./controllers/cartcontroller.php",
            {
                method:"POST",
                headers:{
                    'Content-Type':"application/json"
                },
                body:JSON.stringify({
                    flowerId:pid,
                    id:uid
                })
            }
         );
         const data =await response.text();
         if(data == 'Sucess'){
            location.href=`cart.php?user_id=${uid}`;
         }
    });
    buy.addEventListener("click" , (e)=>{
        location.href = `checkout.php?fid=${pid}&user_id=${uid}&price=${price}`;
    })
    })
    