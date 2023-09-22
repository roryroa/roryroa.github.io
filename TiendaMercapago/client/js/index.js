//Cargo las imagenes
const shopContent = document.getElementById("shopContent");

const cart = [];

products.forEach((itemProducto) =>{
    const content = document.createElement("div");
    content.className = "card";
    content.innerHTML = `
        <img alt="${itemProducto.productName}" src="${itemProducto.img}" >
        <h3>${itemProducto.productName}</h3>
        <p>${itemProducto.price} $</p>
        `;
        
        shopContent.append(content);

        const buyButton = document.createElement("button");
        //content.className = "buyButton";
        buyButton.innerText = "Comprar";

        content.append(buyButton); 

        buyButton.addEventListener('click', ()=> {
            cart.push({
                id: itemProducto.id,
                productName:  itemProducto.productName,
                price: itemProducto.price,
                quantity: itemProducto.quantity,
                img: itemProducto.img,
            });
            console.log(cart);
        
        });

});
