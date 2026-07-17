<?php
$pageTitle = "Research Assistant Application";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<?php include "includes/header.php"; ?>

<main>

<section>

<h2>Research Assistant Application</h2>

<p>
Thank you for your interest in becoming a student research assistant at the Robin and Doug Shore Innovation Center.
Please complete the application below. All required fields must be completed before submitting your application.
</p>

</section>

<section>

<form id="applicationForm"
      action="process_application.php"
      method="post">

<div class="form-group">

<label for="name">
    Full Name <span class="required">*</span>
</label>

<input
type="text"
id="name"
name="name">

</div>


<div class="form-group">

<label for="email">
    Student Email <span class="required">*</span>
</label>

<input
type="email"
id="email"
name="email">

</div>


<div class="form-group">

<label>
    Student Level <span class="required">*</span>
</label>

<input
type="radio"
name="level"
value="Undergraduate">

Undergraduate

<input
type="radio"
name="level"
value="Graduate">

Graduate

</div>


<div class="form-group">

<label>
    Research Interests <span class="required">*</span>
</label>

<br>

<input
type="checkbox"
name="interests[]"
value="Cybersecurity">

Cybersecurity

<br>

<input
type="checkbox"
name="interests[]"
value="Artificial Intelligence">

Artificial Intelligence

<br>

<input
type="checkbox"
name="interests[]"
value="Data Analytics">

Data Analytics

<br>

<input
type="checkbox"
name="interests[]"
value="Robotics">

Robotics

</div>


<div class="form-group">

<label for="experience">
    Programming Experience <span class="required">*</span>
</label>

<select
id="experience"
name="experience">

<option value="">Select One</option>

<option>Beginner</option>

<option>Intermediate</option>

<option>Advanced</option>

</select>

</div>


<div class="form-group">

<label for="statement">
    Why would you like to become a research assistant?
    <span class="required">*</span>
</label>

<textarea
id="statement"
name="statement"
rows="6"></textarea>

</div>


<input
type="submit"
value="Submit Application">

<input
type="reset"
value="Reset Form">

</form>

</section>

</main>

<?php include "includes/footer.php"; ?>

<script src="js/application.js"></script>

</body>

</html>
