<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligibility Evaluator | Robin and Doug Shore Innovation Center</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php include "includes/header.php"; ?>

    <main>

        <section>
            <h2>Summer Student Assistant Eligibility Evaluator</h2>
            <p>
                Use this form to check whether you may qualify for a summer student
                assistant position at the Shore Innovation Center. Select your student
                status, enter your information, and choose your letter grade for each
                required course.
            </p>
            <p>
                Undergraduate students must have an average grade point greater than
                3.2. Graduate students must have an average grade point greater than
                3.7.
            </p>
        </section>

        <section>
            <h2>Eligibility Form</h2>

            <form id="eligibilityForm">
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" name="studentName">
                </div>

                <div class="form-group">
                    <label for="studentEmail">Student Email</label>
                    <input type="email" id="studentEmail" name="studentEmail">
                </div>

                <div class="form-group">
                    <label for="studentStatus">Student Status</label>
                    <select id="studentStatus" name="studentStatus">
                        <option value="">Select your status</option>
                        <option value="undergraduate">Undergraduate</option>
                        <option value="graduate">Graduate</option>
                    </select>
                </div>

                <div id="courseFields" class="course-fields">
                    <p>Please select your student status to view required courses.</p>
                </div>

                <button type="button" id="evaluateButton">Evaluate Eligibility</button>
            </form>

            <div id="result" class="result-box"></div>
        </section>

    </main>

    <?php include "includes/footer.php"; ?>

    <script src="js/eligibility.js"></script>
</body>
</html>
