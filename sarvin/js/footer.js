document.addEventListener("DOMContentLoaded", function () {

    fetch("footer.html")
        .then(function (response) {

            if (!response.ok) {
                throw new Error("footer.html not found");
            }

            return response.text();

        })

        .then(function (data) {

            document.getElementById("footer").innerHTML = data;


            const button =
                document.getElementById("footerSignupButton");

            const email =
                document.getElementById("footerEmail");

            const message =
                document.getElementById("footerSignupMessage");


            button.addEventListener("click", function () {

                if (email.value.trim() === "") {

                    message.innerText =
                        "Please enter your email address.";

                    message.style.display = "block";

                    return;
                }


                message.innerText =
                    "Thank you! Our team will contact you soon.";

                message.style.display = "block";

                email.value = "";

            });

        })

        .catch(function (error) {

            console.error("Footer loading error:", error);

        });

});