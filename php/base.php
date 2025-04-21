
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/root.css">
    <link rel="stylesheet" type="text/css" href="../css/submitted.css">
</head>

<body>
<div class="grid-for-nav">
    <nav class="nav-side">
        <div class="side-scroll">
            <div class="side-nav-search">
                <img src="../media/Logo.jpg" class="logo" alt="image"> 
                <h1> Advanced Manufacturing </h1>
            </div>

            

        </div>
        <div class="menu-vertical">
            <ul>
                <li class="nav-list"><a class="nav-link" href="home.html">Home</a></li>
                <li class="nav-list"><a class="nav-link" href="page1.html">Our Approach to Outsourcing</a></li>
                <li class="nav-list"><a class="nav-link" href="page2.html">FAQ</a></li>
                <li class="nav-list"><a class="nav-link" href="page3.html">Job Search</a></li>
                <li class="nav-list"><a class="nav-link" href="page4.html">Contact Us</a></li>
            </ul>

        </div>
    </nav>
</div>
<section class="nav-content-wrap">

    <!--Do your work here -->
    <section>
        <h3>FORM SUBMITTED</h3>
        <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $client = htmlspecialchars($_POST["Client"]);
        $address = htmlspecialchars($_POST["Address"]);
        echo '<section class="formSubmit">';
        echo '<p><strong>Client Name:</strong>'.$client.'</p>';
        echo '<p><strong>Address:</strong>'. $address.'</p>';
        echo "</section>";
    } else {
        echo "<p>Please submit the form first.</p>";
    }
    ?>

    </section>
</section>
</body>

</html>


