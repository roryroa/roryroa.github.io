//Cargo las imagenes
const shopContent = document.getElementById("shopContent");

productos.forEach((itemProducto) =>{
    const content = document.createElement("div");
    content.className = "card";
    content.innerHTML = `
        <img src="${itemProducto.img}" >
        <h3>${itemProducto.productName}</h3>
        <p>${itemProducto.price} $</p>
        `;
        
        shopContent.append(content);

        const buyButton = document.createElement("button");
        content.className = "buyButton";
        buyButton.innerText = "Comprar";

        content.append(buyButton); 

});
