export default function getOfferService() {
  //b2b get offer popup logic form
  //check if container exist on the page
  if (document.querySelector(".form_container.b2b_offer")) {
    // const productSelect = document.getElementById("product");
    // const quantityInput = document.getElementById("quantity");
    // const productList = document.getElementById("product-list");
    // const butttonHook = document.getElementById("button-hook");
    // const nameInput = document.getElementById("name");
    // const emailInput = document.getElementById("email");
    // const form = document.querySelector(".form_container form");
    // const orderButton = document.getElementById("order-button");
    // let addButton;
    // console.log("TEst form");
    // const addProduct = () => {
    //   const productValue = productSelect.value;
    //   const quantityValue = quantityInput.value;

    //   if (productValue !== "" && quantityValue !== "") {
    //     const productItem = document.createElement("div");
    //     productItem.innerHTML = `${productValue} x ${quantityValue}`;
    //     productList.appendChild(productItem);

    //     productSelect.value = "";
    //     quantityInput.value = "";

    //     if (!addButton) {
    //       const addProductDiv = document.createElement("div"); // create new div element
    //       addButton = document.createElement("button");
    //       addButton.textContent = "Add another product";
    //       addButton.addEventListener("click", addProduct);
    //       addProductDiv.appendChild(quantityInput); // append quantity input and button to div
    //       addProductDiv.appendChild(addButton);
    //       document.body.appendChild(addProductDiv); // append div to body
    //     }
    //   }
    // }; 

    // productSelect.addEventListener("change", () => {
    //   if (
    //     productSelect.value !== "" &&
    //     quantityInput.value !== "" &&
    //     !addButton
    //   ) {
    //     const addProductDiv = document.createElement("div"); // create new div element
    //     addButton = document.createElement("button");
    //     addButton.textContent = "Add another product";
    //     addButton.addEventListener("click", addProduct);
    //     // addProductDiv.appendChild(quantityInput); // append quantity input and button to div
    //     butttonHook.appendChild(addButton);
    //   }
    // });

    // quantityInput.addEventListener("change", () => {
    //   if (
    //     productSelect.value !== "" &&
    //     quantityInput.value !== "" &&
    //     !addButton
    //   ) {
    //     const addProductDiv = document.createElement("div"); // create new div element
    //     addButton = document.createElement("button");
    //     addButton.textContent = "Add another product";
    //     addButton.addEventListener("click", addProduct);
    //     // addProductDiv.appendChild(quantityInput); // append quantity input and button to div
    //     butttonHook.appendChild(addButton);
    //   }
    // });

    // nameInput.addEventListener("input", () => {
    //   console.log("CHange");
    //   if (nameInput.value) {
    //     nameInput.classList.remove("error");
    //   }
    // });

    // emailInput.addEventListener("input", () => {
    //   console.log("CHange");
    //   if (emailInput.value) {
    //     emailInput.classList.remove("error");
    //   }
    // });

    // orderButton.addEventListener("click", (event) => {
    //   console.log("Name value");

    //   event.preventDefault(); // prevent page refresh
    //   let products = Array.from(productList.children)
    //     .map((item) => item.textContent.trim())
    //     .join("\n");

    //   const send_email_url =
    //     "/wp-content/themes/blankslate-child/lib/send-email.php";
    //   const send_email_url_prod =
    //     "https://www.test404studio.pl/eliksir-w-butelce/wp-content/themes/blankslate-child/lib/send-email.php";
    //   const nameValue = document.getElementById("name").value;
    //   const emailValue = document.getElementById("email").value;

    //   //check if there is only one product
    //   if (products.length == 0) {
    //     products = productSelect.value + " X " + quantityInput.value;
    //   }

    //   // Validate name
    //   if (nameValue.trim() === "") {
    //     nameInput.classList.add("error");
    //     nameInput.focus();
    //     return;
    //   }

    //   // Validate email
    //   if (emailValue.trim() === "") {
    //     emailInput.classList.add("error");
    //     emailInput.focus();
    //     return;
    //   }

    //   // Validate product and quantity
    //   const productValue = productSelect.value;
    //   const quantityValue = quantityInput.value;

    //   if (productValue === "") {
    //     productSelect.focus();
    //     productSelect.classList.add("error");
    //     return;
    //   }

    //   if (quantityValue.trim() === "" || parseInt(quantityValue) <= 0) {
    //     alert("Please enter a valid quantity");
    //     quantityInput.focus();
    //     return;
    //   }

    //   // Form is valid, send data using fetch
    //   if (form.reportValidity()) {
    //     //prepare data
    //     const data = {
    //       name: nameValue,
    //       email: emailValue,
    //       products: products,
    //     };

    //     fetch(send_email_url_prod, {
    //       method: "POST",
    //       headers: {
    //         "Content-Type": "application/json",
    //       },
    //       body: JSON.stringify(data),
    //     })
    //       .then((response) => {
    //         if (!response.ok) {
    //           throw new Error("Error sending email");
    //         }
    //         // Handle successful email send here
    //         console.log("Email sent successfully");
    //       })
    //       .catch((error) => {
    //         // Handle error here
    //         console.error(error);
    //       });
    //   }
    // });
    //trigger popup

    const getOfferButton = document.querySelector(".get_offer");
    const popupContainer = document.querySelector(".popup_container");
    const closeButton = document.querySelector(".close_popup");

    if (getOfferButton) {
      console.log("IF")
      getOfferButton.addEventListener("click", () => {
        popupContainer.classList.add("show");
      });

      popupContainer.addEventListener("click", (event) => {
        if (event.target === popupContainer) {
          popupContainer.classList.remove("show");
        }
      });

      closeButton.addEventListener("click", (event) => {
        if (event.target === closeButton) {
          popupContainer.classList.remove("show");
        }
      });
    }
  } else {
    console.log("error");
  }
}
