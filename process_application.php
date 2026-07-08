<?php
// Server-side validation and processing for the research assistant application

$errors = [];

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$level = $_POST["level"] ?? "";
$interests = $_POST["interests"] ?? [];
$experience = $_POST["experience"] ?? "";
$statement = trim($_POST["statement"] ?? "");

if ($name === "") {
    $errors[] = "Full name is required.";
}

if ($email === "") {
    $errors[] = "Student email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Student email must be a valid email address.";
}

if ($level === "") {
    $errors[] = "Student level is required.";
}

if (empty($interests)) {
    $errors[] = "At least one research interest must be selected.";
}

if ($experience === "") {
    $errors[] = "Programming experience level is required.";
}

if ($statement === "") {
    $errors[] = "Application statement is required.";
}

function cleanInput($data) {
    return htmlspecialchars($data, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Confirmation | Robin and Doug Shore Innovation Center</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<?php include "includes/header.php"; ?>

<main>
    <section>
        <?php if (!empty($errors)) : ?>

            <h2>Application Error</h2>
            <p>
                Your application could not be processed because some required
                information was missing or invalid.
            </p>

            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo cleanInput($error); ?></li>
                <?php endforeach; ?>
            </ul>

            <p>
                <a href="application.php">Return to the application form</a>
            </p>

        <?php else : ?>

            <h2>Application Submitted Successfully</h2>
            <p>
                Thank you, <?php echo cleanInput($name); ?>. Your research assistant
                application has been received. For this class project, the information
                is displayed below instead of being stored in a database.
            </p>

            <table>
                <tr>
                    <th>Application Item</th>
                    <th>Submitted Response</th>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td><?php echo cleanInput($name); ?></td>
                </tr>
                <tr>
                    <td>Student Email</td>
                    <td><?php echo cleanInput($email); ?></td>
                </tr>
                <tr>
                    <td>Student Level</td>
                    <td><?php echo cleanInput($level); ?></td>
                </tr>
                <tr>
                    <td>Research Interests</td>
                    <td>
                        <?php
                        $cleanInterests = array_map("cleanInput", $interests);
                        echo implode(", ", $cleanInterests);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Programming Experience</td>
                    <td><?php echo cleanInput($experience); ?></td>
                </tr>
                <tr>
                    <td>Application Statement</td>
                    <td><?php echo cleanInput($statement); ?></td>
                </tr>
            </table>

        <?php endif; ?>
    </section>
</main>

<?php include "includes/footer.php"; ?>

</body>
</html>
