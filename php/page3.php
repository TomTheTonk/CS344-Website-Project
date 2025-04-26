<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/page3.css">
    <link rel="stylesheet" type="text/css" href="../css/root.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Company Search</title>

    <meta name="description" content="Discover wonderful business partners to help your business run smoother and improve productivity.">
    <meta name="keywords" content="outsource, out source, company, advanced manufacturing, oursourcing, marketing, fabrication, support, management">
    <meta name="author" content="Allen Martin">
</head>

<body>
    <a class="skip-to-content-link" href="#content" tabindex="1">Skip to content</a>
    <a class="skip-to-content-link" href="../html/page5.html" tabindex="1">Accessibility Statement</a>
    <nav class="nav-side">
        <div class="side-scroll">
            <div class="side-nav-search">
                <img src="../media/Logo.jpg" class="logo" alt="Advanced Manufacturing">
                <h1> Advanced Manufacturing </h1>
            </div>



        </div>
        <div class="menu-vertical">
            <ul>
                <li class="nav-list"><a class="nav-link" href="../html/home.html"  tabindex="1">Home</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page1.html" tabindex="1">Our Approach to Outsourcing</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page2.html" tabindex="1">FAQ</a></li>
                <li class="nav-list"><a class="nav-link" href="page3.php" tabindex="1">Company Search</a></li>
                <li class="nav-list"><a class="nav-link" href="../html/page4.html" tabindex="1">Contact Us</a></li>
            </ul>

        </div>
    </nav>

    <section class="nav-content-wrap">

        <header class="content-banner">
            <button id="toggleNav" class="toggle-button fa fa-bars"></button>
        </header>
        <main id="content">
            <div class="content-header">
                <div><h1>Company Search</h1></div>

                <div>
                    <form action="" mehod="get">

                        <input type="text" class="company-search-box" name="company-keyword" autocomplete="off" tabindex="1">


                        <input type="submit" class="search-submit">
                    </form>
                </div>

            </div>
            <div class="companys-content">
                <?php
                //Required PHP files
                require 'company.php';
                require 'service.php';

                //Quick sort function to sort array of companies
                function quickSort($array) {
                    $length = count($array);
                
                    if ($length <= 1) {
                        return $array;
                    } else {
                        $pivot = $array[0];
                        $left = $right = array();
                
                        for ($i = 1; $i < $length; $i++) {
                            if (strcmp($array[$i]->get_name(), $pivot->get_name()) < 0) {
                                $left[] = $array[$i];
                            } else {
                                $right[] = $array[$i];
                            }
                        }
                
                        return array_merge(
                            quickSort($left), 
                            array($pivot), 
                            quickSort($right)
                        );
                    }
                }
                

                //Load XML
                $xml = simplexml_load_file("../xml/company_data.xml") or die("Error: Not Working");
                $company_count = $xml->count();

                //Variables to determine how many for loop body for company display
                if (isset($_GET['per_page']) && !empty($_GET['per_page'])) {
                    $per_page = $_GET['per_page'];
                } else {
                    $per_page = 2;
                }
                $max_pages = round($company_count / $per_page);
                if (isset($_GET['page']) && !empty($_GET['page'])) {
                    $page = $_GET['page'] > $max_pages ? $max_pages : $_GET['page'];
                } else {
                    $page = 1;
                }
                $left = true;

                // Generates an array of all data in xml file
                $company_xml = $xml->COMPANY;
                $company_array = [];
                foreach($company_xml as $company) {
                    $company_object = new company();
                    $company_object->set_name($company->NAME);
                    $company_object->set_city($company->CITY);
                    $company_object->set_state($company->STATE);
                    $company_object->set_rating($company->RATING);
                    $company_object->set_review_count($company->REVIEWS);
                    $company_object->set_pitch($company->PITCH);
                    $services_array = [];
                    foreach($company->SERVICES->SERVICE as $service) {
                        $service_object = new service();
                        $service_object->set_main($service->MAIN);
                        $service_object->set_sub($service->SUB);
                        array_push($services_array, $service_object);
                    }
                    $company_object->set_services($services_array);
                    array_push($company_array, $company_object);
                    $company_object->set_cost_plan($company->COST_PLAN);
                }

                $company_array = quickSort($company_array);

                // Loop to display all job data from the company_data array
                for ($index_companies = ($page - 1) * $per_page; $index_companies < $page * $per_page && $index_companies < $company_count; $index_companies++) {
                    $company_data = $company_array[(int)$index_companies];
                    echo '<div class=\'company-details';
                    if ($left) {
                        echo ' left';
                        $left = false;
                    } else {
                        echo ' right';
                        $left = true;
                    }
                    echo '\'>';
                    echo '<div class=\'company-header\'>';
                    echo '<a href=\'\' class=\'company-link\'>' . $company_data->get_name() . '</a>';
                    echo '<div class=\'header-details\'>' . $company_data->get_city() . ', ' . $company_data->get_state() . '</div>';
                    echo '<div class=\'header-details\'>';
                    $rating = $company_data->get_rating();
                    for ($index_rating = 0; $index_rating < 5; $index_rating++) {
                        if ($rating >= 1) {
                            echo '<span class=\'fa fa-star checked\'></span>';
                            $rating--;
                        } else {
                            echo '<span class=\'fa fa-star\'></span>';
                        }
                    }
                    echo ' ' . $company_data->get_rating() . ' (' . $company_data->get_review_count() . ')</div>';
                    echo '</div>';
                    echo '<div class=\'company-section\'>';
                    echo '<div class=\'section-header\'>Description</div>';
                    $pitch_array = explode("\n", $company_data->get_pitch());
                    for ($index_pitch = 0; $index_pitch < count($pitch_array); $index_pitch++) {
                        if ($index_pitch != count($pitch_array) - 1) {
                            echo '<div class=\'section-body\'>' . $pitch_array[$index_pitch] . '</div>';
                        } else {
                            echo '<div class=\'sub-section-header section-body\'>' . $pitch_array[$index_pitch] . '</div>';
                        }
                    }
                    echo '</div>';
                    echo '<div class=\'company-section\'>';
                    echo '<div class=\'section-header\'>Services</div>';
                    echo '<ul class=\'services-list\'>';
                    foreach ($company_data->get_services() as $service_data) {
                        echo '<li class=\'service-section-header no-bullet\'>' . $service_data->get_main() . '</li>';
                        $services_array = explode("\n", $service_data->get_sub());
                        foreach ($services_array as $service) {
                            echo '<li class=\'service-sub\'>' . $service . '</li>';
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                    echo '<div class=\'company-section\'>';
                    echo '<div class=\'section-header\'>Pricing</div>';
                    $pricing_array = explode("\n", $company_data->get_cost_plan());
                    echo '<div class=\'section-body\'>Starting at ' . $pricing_array[0] . '</div>';
                    if (1 < count($pricing_array)) {
                        echo '<div class=\'section-body\'>' . $pricing_array[1] . '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="pagination-section">
                <?php
                echo '<div class=\'page-selector\'>';
                if ($page == 2) {
                    echo '<a href=\'?page=' . 1 . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>&lt;</a>';
                    echo '<a href=\'?page=' . 1 . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>' . 1 . '</a>';
                } elseif ($page > 2) {
                    echo '<a href=\'?page=' . $page - 1 . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>&lt;</a>';
                    for ($i = 2; $i > 0; $i--) {
                        echo '<a href=\'?page=' . $page - $i . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>' . $page - $i . '</a>';
                    }
                }
                //JS to stop jumping
                echo '<a href=\'#\' class=\'pagination-page-current pagination\' tabindex=\'1\'>' . $page . '</a>';
                if ($page < $max_pages) {
                    if ($page == 1) {
                        $pagination_options = 4;
                    } elseif ($page == 2) {
                        $pagination_options = 3;
                    } else {
                        $pagination_options = 2;
                    }
                    for ($i = 1; $i + $page <= $max_pages && $i <= $pagination_options; $i++) {
                        echo '<a href=\'?page=' . $page + $i . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>' . $page + $i . '</a>';
                    }
                    echo '<a href=\'?page=' . $page + 1 . '&per_page=' . $per_page . '\' class=\'pagination-page pagination\' tabindex=\'1\'>></a>';
                }
                echo '</div>';
                echo '<div class=\'select-div\'>';
                echo 'Companies per page ';
                echo '<label>';
                echo '<select class=\'per-page-selector\' onChange=\'window.location.href=this.value\' autocomplete=\'off\'>';
                for ($per_page_var = 1; $per_page_var < 4; $per_page_var++) {
                    if ($per_page_var * 2 == $per_page) {
                        echo '<option selected=\'selected\' value=\'?page=' . $page . '&per_page=' . $per_page_var * 2 . '\'>' . $per_page_var * 2 . '</option>';
                    } else {
                        echo '<option value=\'?page=' . $page . '&per_page=' . $per_page_var * 2 . '\'>' . $per_page_var * 2 . '</option>';
                    }
                }
                echo '</select>';
                echo '</label>';
                echo '</div>';
                ?>
            </div>
        </main>
    </section>



    <script src="../js/toggleNav.js"></script>
</body>

</html>