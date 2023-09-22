const modalContainer = document.getElementById("modal-container");
const modalOverlay = document.getElementById("modal-overlay");

const cartBtn = document.getElementById("cart-btn");

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

const displayCart = () => {
    modalContainer.innerHTML = "";
    modalContainer.style.display = "block";
    modalOverlay.style.display = "block";

    //Header
    const modalHeader = document.createElement("div");

    const modalClose = document.createElement("div");
    
    modalClose.innerHTML = `
        <span class="close">❌</span>
        <p>Some text in the Modal..</p>
    `;
    
    modalClose.className = "close";
    modalHeader.append(modalClose);

    const modalTitle = document.createElement("div");
    modalTitle.innerHTML = "Cart";
    modalTitle.className = "close";
    modalHeader.append(modalTitle);

    modalClose.addEventListener("click", () => {
        modalContainer.style.display = "none";
        modalOverlay.style.display = "none";
        console.log("?");
    });


    modalContainer.append(modalHeader);

};

cartBtn.addEventListener("click", displayCart);

// When the user clicks on <span> (x), close the modal
//span.onclick = function() {
 //   modalContainer.style.display = "none";
  //  modalOverlay.style.display = "none";
 // }
 modalOverlay.addEventListener("click", () => {
    modalContainer.style.display = "none";
    modalOverlay.style.display = "none";
    console.log("?");
});
  
