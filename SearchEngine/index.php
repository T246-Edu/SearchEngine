<!DOCTYPE html>
<html lang="en">
<?php include "functions.php"; ?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design.css">
  <title>Search engine</title>
</head>

<body style="background: rgba(154,57,163,1);
    background: -moz-linear-gradient(-45deg, rgba(154,57,163,1) 0%, rgba(65,103,168,1) 100%);
    background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(154,57,163,1)), color-stop(100%, rgba(65,103,168,1)));
    background: -webkit-linear-gradient(-45deg, rgba(154,57,163,1) 0%, rgba(65,103,168,1) 100%);
    background: -o-linear-gradient(-45deg, rgba(154,57,163,1) 0%, rgba(65,103,168,1) 100%);
    background: -ms-linear-gradient(-45deg, rgba(154,57,163,1) 0%, rgba(65,103,168,1) 100%);
    background: linear-gradient(135deg, rgba(154,57,163,1) 0%, rgba(65,103,168,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#9a39a3', endColorstr='#4167a8', GradientType=1 );">
  <main>
    <div class="container">
      <h1>Search Engine</h1>
      <h2>Try below!</h2>
      <div class="search-box">
        <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="text" placeholder="Search" id="search" autocomplete="off" name="search">
        </form>
        <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
          <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
          <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
        </svg>
        <div class="go-icon"><i class="fa fa-arrow-right"></i>
        </div>
        <div style="align-items: center; justify-content: center;">
          <?php
          $results = [];
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connection = TABLEConnection("mydb");
            if (isset($_POST["search"]) && (!empty($_POST["search"]))) {
              $search  = explode(" ", test_input($_POST["search"], "mydb"));
              $length = sizeof($search);
              $counter = 0;
              foreach ($search as $s) {
                if (strlen($s) >= 2) {
                  $counter += 1;
                }
              }
              if ($counter == $length) {
                foreach ($search as $searchquery) {
                  $query = "SELECT * FROM data";
                  $searchResult = mysqli_query($connection, $query);
                  $searchNeeded = [];
                  foreach ($searchResult as $sr) {
                    $Names = explode(" ", $sr["COL 1"]);
                    foreach ($Names as $Name) {
                      $Similarity =  similar_text(strtolower($Name), strtolower($searchquery));
                      $iteml = ["name" => $sr["COL 1"], "description" => $sr["COL 2"], "email" => $sr["COL 5"], "race" => $sr["COL 4"], "gender" => $sr["COL 3"]];
                      if (strlen($searchquery) == 3) {
                        if ($Similarity >= 3) {
                          array_push($results, ["score" => round((100 * ($Similarity / strlen($searchquery))), 2), "item" => $iteml]);
                        }
                      } else if (strlen($searchquery) == 2) {
                        if ($Similarity >= 2) {
                          array_push($results, ["score" => round((100 * ($Similarity / strlen($searchquery))), 2), "item" => $iteml]);
                        }
                      } else if (strlen($searchquery) > 3) {
                        if ($Similarity >= 4) {
                          array_push($results, ["score" => round((100 * ($Similarity / strlen($searchquery))), 2), "item" => $iteml]);
                        }
                      }
                    }
                  }
                }
              } else {
                echo "<h1>word length should be 2 or more.</h1>";
              }
            }
          }
          ?>
          <?php
          function array_sort($array, $on, $order = SORT_DESC)
          {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
              foreach ($array as $k => $v) {
                if (is_array($v)) {
                  foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                      $sortable_array[$k] = $v2;
                    }
                  }
                } else {
                  $sortable_array[$k] = $v;
                }
              }

              switch ($order) {
                case SORT_ASC:
                  asort($sortable_array);
                  break;
                case SORT_DESC:
                  arsort($sortable_array);
                  break;
              }

              foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
              }
            }

            return $new_array;
          }
          $GLOBALS["results"] = unique_multidim_array($GLOBALS["results"], "item");
          if ($GLOBALS["results"] == []) {
            echo "<h1>No results found.</h1>";
          } else {
            $GLOBALS["results"] = array_sort($GLOBALS["results"], "score");
            foreach ($GLOBALS["results"] as $item) {
              if ($item["score"] >= 70) {
                $string = "score: ";
                $string .= $item["score"];
                $string .= "<br>";
                foreach ($item["item"] as $it => $value) {
                  $string .= "$it : $value<br>";
                }
                echo "<br><div class='card border-success mb-3' style='max-width: 100%; border-radius: 25px;'><div class='card-body text-success'><h5 class='card-title'></h5><p class='card-text'>$string</p></div></div>";
              }
            }
          } ?>
        </div>
      </div>
    </div>
  </main>
</body>
<script src="index.js"></script>

</html>