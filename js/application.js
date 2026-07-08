// Client-side validation for research assistant application form

document.getElementById("applicationForm").addEventListener("submit", function(event) {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const level = document.querySelector("input[name='level']:checked");
    const interests = document.querySelectorAll("input[name='interests[]']:checked");
    const experience = document.getElementById("experience").value;
    const statement = document.getElementById("statement").value.trim();

    let errorMessage = "";

    if (name === "") {
        errorMessage += "Please enter your full name.\n";
    }

    if (email === "") {
        errorMessage += "Please enter your student email.\n";
    }

    if (!level) {
        errorMessage += "Please select your student level.\n";
    }

    if (interests.length === 0) {
        errorMessage += "Please select at least one research interest.\n";
    }

    if (experience === "") {
        errorMessage += "Please select your programming experience level.\n";
    }

    if (statement === "") {
        errorMessage += "Please enter your application statement.\n";
    }

    if (errorMessage !== "") {
        alert(errorMessage);
        event.preventDefault();
    }
});
