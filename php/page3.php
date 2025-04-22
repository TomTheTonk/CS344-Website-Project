<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/root.css">
  <title>Job Search</title>
</head>

<body>
    <nav class="nav-side">
        <div class="side-scroll">
            <div class="side-nav-search">
                <img src="../media/Logo.jpg" class="logo" alt="image"> 
                <h1> Advanced Manufacturing </h1>
            </div>

            

        </div>
        <div class="menu-vertical">
            <ul>
            <li class="nav-list"><a class="nav-link" href="../html/home.html">Home</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page1.html">Our Approach to Outsourcing</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page2.html">FAQ</a></li>
                <li class="nav-list"><a class="nav-link" href="page3.php">Job Search</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page4.html">Contact Us</a></li>
            </ul>

        </div>
    </nav>

  <section class="nav-content-wrap">

    <header class="content-banner">
                
    </header>
    <div class="content-header">
        <div>
            <form>
                <input type="text" id="search-bar">
                <input type="submit" id="submit-button">
            </form>
        </div>

    </div>
    <div class="content">
        <ul class="jobs-list">
            <?php
            $xml = simplexml_load_file("../xml/job_data.xml") or die("Error: Not Working");
            foreach($xml as $jobData) {
                echo '<li> <div>';
                echo '<div class\'job-header\'><div class=\'job-title\'>' . $jobData->TITLE . '</div>';
                echo '<a href=\'#\'>' . $jobData->COMPANY . '</a><br>';
                echo $jobData->CITY . ', ' . $jobData->STATE . '</div>';
                echo '<div class=\'job-section\'><div class=\'section-header\'>Job Details</div><div class=\'sub-section-header\'>Pay</div>' . $jobData->SALARY . '<div class=\'sub-section-header\'>Job Type</div>' . $jobData->TYPE . '</div>';
                echo '<div class=\'job-section\'><div class=\'section-header\'>Full Job Description</div><div class=\'description-header\'>' . $jobData->TITLE . '</div>' . $jobData->DESCRIPTION . '<div class=\'description-header\'>Responsibilities</div><ul class=\'description-list\'>';
                $responsibilitiesArray = explode("\n", $jobData->RESPONSIBILITIES);
                foreach($responsibilitiesArray as $responsibilities) {
                    echo '<li>' . $responsibilities . '</li>';
                }
                echo '</ul><div class=\'description-header\'>Qualifications</div><ul class=\'description-list\'>';
                $qualificationsArray = explode("\n", $jobData->QUALIFICATIONS);
                foreach($qualificationsArray as $qualification) {
                    echo '<li>' . $qualification . '</li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '</div> </li>';
                echo '<br>';
            }
            ?>
        </ul>
    </div>
  </section>




</body>

</html>