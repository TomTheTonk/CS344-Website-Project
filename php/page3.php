<html>

<head> 
  <link rel="stylesheet" type="text/css" href="../css/page3.css">
  <link rel="stylesheet" type="text/css" href="../css/root.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Company Search</title>
  <meta name="description" content="Discover wonderful business partners to help your business run smoother and improve productivity.">
  <meta name="keywords" content="outsource, out source, ">
  <meta name="author" content="Allen Martin">
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
                <li class="nav-list"><a class="nav-link" href="page3.php">Company Search</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page4.html">Contact Us</a></li>
            </ul>

        </div>
    </nav>

  <section class="nav-content-wrap">

    <header class="content-banner">
        <button id="toggleNav" class="toggle-button">☰</button> 
    </header>
    <div class="content-header">
        <div>
            <form action="" mehod="get">
                <input type="text" class="company-search-box" name="company-keyword">
                <input type="submit" class="search-submit">
            </form>
        </div>

    </div>
    <div class="companys-content">
            <?php
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $xml = simplexml_load_file("../xml/company_data.xml") or die("Error: Not Working");
            $company_count = $xml->count();
            foreach($xml as $company_data) {
                echo '<div class=\'company-details\'>';
                echo '<div class=\'company-header\'>';
                echo '<a href=\'#\' class=\'company-link\'>' . $company_data->NAME . '</a>';
                echo '<div class=\'header-details\'>' . $company_data->CITY . ', ' . $company_data->STATE . '</div>';
                echo '<div class=\'header-details\'>';
                $rating = $company_data->RATING;
                for ($i = 0; $i < 5; $i++) {
                    if ($rating >= 0.6) {
                        echo'<span class=\'fa fa-star checked\'></span>';
                        $rating--;
                    } else {
                        echo'<span class=\'fa fa-star\'></span>';
                    }
                }
                echo ' ' . $company_data->RATING . ' (' . $company_data->REVIEWS . ')</div>';
                echo '</div>';
                echo '<div class=\'company-section\'>';
                echo '<div class=\'section-header\'>Description</div>';
                echo '<div class=\'\'>' . $company_data->PITCH . '</div>';
                echo '</div>';
                echo '<div class=\'company-section\'>';
                echo '<div class=\'section-header\'>Services</div>';
                echo '<ul class=\'services-list\'>';
                foreach($company_data->SERVICES->SERVICE as $service_data) {
                    echo '<li class=\'service-main\'>' . $service_data->MAIN;
                    $services_array = explode("\n", $service_data->SUB);
                    foreach($services_array as $service) {
                        echo '<li class=\'serive-sub\'>' . $service . '</li>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '<div class=\'company-section\'>';
                echo '<div class=\'section-header\'>Pricing</div>';
                echo '<div class=\'\'>Starting at ' . $company_data->COST_PLAN . '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </ul>
    </div>
  </section>



  <script src="../js/toggleNav.js"></script>
</body>

</html>