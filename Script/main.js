$(document).ready(function () {
  // Remove any event handler that prevents the default form submission for the login form
  $(".login-form").off("submit");

  // ========== LOGIN FORM VALIDATION ==========
  $(".login-form").on("submit", function (e) {
    e.preventDefault();

    const data = {
      username: $(".login-form input[name='username']").val().trim(),
      password: $(".login-form input[name='password']").val().trim()
    };

    console.log("Username:", data.username); // Debugging
    console.log("Password:", data.password); // Debugging

    if (!data.username || !data.password) {
      alert("Please fill in all fields.");
      return;
    }

    $.ajax({
      url: "login.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(data),
      success: function (res) {
        const response = JSON.parse(res);
        if (response.status === "success") {
          alert("Login successful!");
          window.location.href = "index.php";
        } else {
          alert(response.message);
        }
      },
      error: function () {
        alert("An error occurred while processing your request.");
      }
    });
  });



  // ========== REGISTRATION FORM VALIDATION ==========
  // NOT REQUIRED FOR THIS PROJECT





  // ========== CONTACT FORM VALIDATION ==========
  // Remove any previous submit handlers to prevent double submission
  $(".contact-form").off("submit");
  $(".contact-form").on("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();  // Add this to prevent any other handlers

    const data = {
      name: $(".contact-form input[name='name']").val().trim(),
      email: $(".contact-form input[name='email']").val().trim(),
      phone: $(".contact-form input[name='phone']").val().trim(),
      message: $(".contact-form textarea[name='message']").val().trim()
    };


    if (!data.name || !data.email || !data.phone || !data.message) {
      alert("Please fill in all fields.");
      return;
    }

    $.ajax({
      url: "contact.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(data),
      success: function (res) {
        // If response is string, try to parse
        let response = res;
        if (typeof res === 'string') {
          try {
            response = JSON.parse(res);
          } catch (e) {
            alert("Unexpected response from server.");
            return;
          }
        }
        if (response.status === "success") {
          alert("Message sent successfully!");
          $(".contact-form")[0].reset(); // Reset the form
        } else {
          alert(response.message || "An error occurred.");
        }
      },
      error: function (xhr) {
        let msg = "An error occurred while processing your request.";
        if (xhr.responseText) {
          try {
            const err = JSON.parse(xhr.responseText);
            if (err.message) msg = err.message;
          } catch (e) {}
        }
        alert(msg);
      }
    });
  });
  

  // ========== ADD TO CART ==========
  $(".add-to-cart").on("click", function () {
    // Get the product details
    const productCard = $(this).closest(".product-card");
    const name = productCard.find(".product-name").text();
    const priceText = productCard.find(".product-price").text();
    const price = parseFloat(priceText.replace("Rs. ", ""));
    const image = productCard.find("img").attr("src"); // Get the image URL

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Check if the item already exists in the cart
    const existingItem = cart.find((item) => item.name === name);
    if (existingItem) {
      // If it exists, increase the quantity
      existingItem.quantity += 1;
    } else {
      // If it doesn't exist, create a new cart item object
      const cartItem = { name, price, image, quantity: 1 };
      cart.push(cartItem);
    }

    // Save the updated cart back to localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    // Update the cart count in the navbar
    $("#cart-count").text(
      cart.reduce((total, item) => total + item.quantity, 0)
    );

    alert(`${name} has been added to your cart!`);
  });

  // Cart Page Functionality
  if (window.location.pathname.includes("cart.php")) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    updateCartUI();

    function updateCartUI() {
      $("#cart-items").empty();
      let total = 0;

      cart.forEach((item, index) => {
        total += item.price * item.quantity;
        $("#cart-items").append(`
                    <tr>
                        <td class="tdimg"><img src="${item.image}" alt="${item.name}" class="cart-item-image"></td>
                        <td>${item.name}</td>
                        <td>Rs. ${item.price}</td>
                        <td>
                            <button class="decrease-quantity" data-index="${index}">-</button>
                            <span class="quantity">${item.quantity}</span>
                            <button class="increase-quantity" data-index="${index}">+</button>
                        </td>
                    </tr>
                `);
      });

      $("#total-price").text(total);
      $("#cart-count").text(
        cart.reduce((total, item) => total + item.quantity, 0)
      );
    }

    $(document).on("click", ".increase-quantity", function () {
      const index = $(this).data("index");
      cart[index].quantity += 1;
      localStorage.setItem("cart", JSON.stringify(cart));
      updateCartUI();
    });

    $(document).on("click", ".decrease-quantity", function () {
      const index = $(this).data("index");
      if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;
      } else {
        cart.splice(index, 1);
      }
      localStorage.setItem("cart", JSON.stringify(cart));
      updateCartUI();
    });

    $("#pay-now").on("click", function () {
      if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
      }
      alert("Order placed successfully!");
      localStorage.removeItem("cart");
      cart = [];
      updateCartUI();
    });
  }

  // Update cart count in navbar on all pages
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  $("#cart-count").text(cart.reduce((total, item) => total + item.quantity, 0));
});
