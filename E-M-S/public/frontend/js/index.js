// ----- JS BOOTSTRAP LINk--


    // document.addEventListener("scroll", function () {
    //     var navbar = document.querySelector('.fixed-top');
    //     if (window.scrollY > 0) {
    //         navbar.classList.add("scrolled");
    //     }
    //     else {
    //         navbar.classList.remove("scrolled");
    //     }
    // });


  
// for service cards

// You can add additional JavaScript functionalities here if needed.
        // For now, we've added a simple script to handle the card hover effect.
        // The script is added directly here, but it's recommended to place it in an external .js file.

        // Add an event listener for each card to handle hover effect
        const cards = document.querySelectorAll(".card");
        cards.forEach((card) => {
            card.addEventListener("mouseover", () => {
                card.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.1)";
                card.style.transform = "translateY(-5px)";
            });
            card.addEventListener("mouseout", () => {
                card.style.boxShadow = "none";
                card.style.transform = "translateY(0)";
            });
        });

        // // // // // for portfolio
          // Custom JavaScript for the lightbox functionality
          $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });