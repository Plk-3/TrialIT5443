const courses = {
    undergraduate: [
        "CSE 3203 Mobile System Overview",
        "IT 4213 Mobile Web Development",
        "IT 3203 Introduction to Web Development",
        "CSE 3153 Database Systems"
    ],
    graduate: [
        "IT 7113 Data Visualization",
        "IT 6713 Business Intelligence",
        "IT 7133 Cloud Architecture and Technology",
        "IT 6823 Information Security Concepts"
    ]
};

const gradePoints = {
    A: 4.0,
    B: 3.0,
    C: 2.0,
    D: 1.0,
    F: 0.0
};

document.getElementById("studentStatus").addEventListener("change", displayCourses);
document.getElementById("evaluateButton").addEventListener("click", evaluateEligibility);

function displayCourses() {
    const status = document.getElementById("studentStatus").value;
    const courseFields = document.getElementById("courseFields");

    courseFields.innerHTML = "";

    if (status === "") {
        courseFields.innerHTML = "<p>Please select your student status to view required courses.</p>";
        return;
    }

    const selectedCourses = courses[status];

    selectedCourses.forEach(function(course, index) {
        const group = document.createElement("div");
        group.className = "form-group";

        const label = document.createElement("label");
        label.setAttribute("for", "grade" + index);
        label.textContent = course;

        const select = document.createElement("select");
        select.id = "grade" + index;
        select.name = "grade" + index;

        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Select grade";
        select.appendChild(defaultOption);

        const grades = ["A", "B", "C", "D", "F"];

        grades.forEach(function(grade) {
            const option = document.createElement("option");
            option.value = grade;
            option.textContent = grade;
            select.appendChild(option);
        });

        group.appendChild(label);
        group.appendChild(select);
        courseFields.appendChild(group);
    });
}

function evaluateEligibility() {
    const name = document.getElementById("studentName").value.trim();
    const email = document.getElementById("studentEmail").value.trim();
    const status = document.getElementById("studentStatus").value;
    const result = document.getElementById("result");

    result.innerHTML = "";
    result.className = "result-box";

    if (name === "") {
        result.textContent = "Please enter your student name.";
        result.classList.add("not-eligible");
        return;
    }

    if (email === "") {
        result.textContent = "Please enter your student email.";
        result.classList.add("not-eligible");
        return;
    }

    if (status === "") {
        result.textContent = "Please select your student status.";
        result.classList.add("not-eligible");
        return;
    }

    const selectedCourses = courses[status];
    let totalPoints = 0;

    for (let i = 0; i < selectedCourses.length; i++) {
        const gradeSelect = document.getElementById("grade" + i);

        if (!gradeSelect || gradeSelect.value === "") {
            result.textContent = "Please select a grade for every required course.";
            result.classList.add("not-eligible");
            return;
        }

        totalPoints += gradePoints[gradeSelect.value];
    }

    const average = totalPoints / selectedCourses.length;
    const requiredAverage = status === "undergraduate" ? 3.2 : 3.7;

    if (average > requiredAverage) {
        result.classList.add("eligible");
        result.innerHTML =
            "<h3>Congratulations, " + name + "!</h3>" +
            "<p>Your calculated average grade point is <strong>" + average.toFixed(2) + "</strong>.</p>" +
            "<p>You may continue to the Milestone 3 student assistant application form.</p>" +
            "<p><a href=\"application.php\">Continue to Application Form</a></p>";
    } else {
        result.classList.add("not-eligible");
        result.innerHTML =
            "<h3>Thank you for your interest, " + name + ".</h3>" +
            "<p>Your calculated average grade point is <strong>" + average.toFixed(2) + "</strong>.</p>" +
            "<p>You do not currently meet the minimum grade average requirement for this position.</p>";
    }
}
