<?php

    function test($interest) 
        {
                
                $curl = curl_init();
                $key=getenv('movie_key');
                
                curl_setopt_array($curl, array(
            
                
                  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=8e56967b0a4b849899773bc9ad998665&query=$interest&page=1&include_adult=false",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => array(
            "cache-control: no-cache"
          ),
                ));
               $jsonData = curl_exec($curl);
        $data = json_decode($jsonData, true); //true makes it an array!
        $pic_path="https://image.tmdb.org/t/p/w500";
        
        $imageURLs = array();
        for ($i = 0; $i < 99; $i++) 
        {
                $imageURLs[]="https://image.tmdb.org/t/p/w500" . $data['results'][$i]['poster_path'];
                
                 //$config['images']['base_url']
                 //$imageURLs[]=$data['images'][$i]['base_url'];
                 //$imageURLs[]+=$data['images'][$i]['secure_base_url'];
                 //$imageURLs[]+=$data['images'][$i]['backdrop_sizes'];
                 
               
               // echo $imageURLs[$i];
        }
        $err = curl_error($curl);
        curl_close($curl);
        
        return $imageURLs;
    }
    
    function trending($something)
    {
         $curl = curl_init();
                $key=getenv('movie_key');
                
                curl_setopt_array($curl, array(
            
                
                  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=8e56967b0a4b849899773bc9ad998665&query=$something&page=1&include_adult=false",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => array(
            "cache-control: no-cache"
          ),
                ));
               $jsonData = curl_exec($curl);
        $data = json_decode($jsonData, true); //true makes it an array!
        $pic_path="https://image.tmdb.org/t/p/w500";
        
        $imageURLs = array();
        for ($i = 0; $i < 99; $i++) 
        {
                $imageURLs[]=$data['results'][$i]['title'];
                
                 //$config['images']['base_url']
                 //$imageURLs[]=$data['images'][$i]['base_url'];
                 //$imageURLs[]+=$data['images'][$i]['secure_base_url'];
                 //$imageURLs[]+=$data['images'][$i]['backdrop_sizes'];
                 
               
               // echo $imageURLs[$i];
        }
        $err = curl_error($curl);
        curl_close($curl);
        
        return $imageURLs;
        
    }

    function displayMovies() {
        global $conn;
        $sql = "SELECT * FROM `db_movie` WHERE 1 ";
        
        if (isset($_GET['submit'])) {
            $namedParamaters = array();
            
            $namedParamaters[':movieName'] = $_GET['movieSelect'];
            $sql .= ' AND movieName = :movieName';
        }
                
        $statement = $conn->prepare($sql);
        $statement->execute($namedParamaters);
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
        //This will return an array of movie info
        foreach($movies as $movies){
            echo "<tr>";
            echo"<td>".''.$movies['movieName'].''."</td>"; 
            echo"<td>".''.$movies['movieGenre'].''."</td>"; 
            echo"<td>".''.$movies['movieYear'].''."</td>"; 
            echo"<td>";
            echo "<div class='container2'>";
              echo "<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>Preview</button>";
              echo " ";
              echo "<button type='button' class='btn btn-success btn-sm'>Add to Cart</button>";
              echo "<div class='modal fade' id='myModal' role='dialog'>";
            $name = replaceAll($movies['movieName']); 
            $pic = movieInfo($name);
            $info = overView($name);
            echo "<div class='container2' >";
            echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#".''.$name.''."'>Open Modal</button>";
            
              echo "<div class='modal fade' id='".''.$name.''."' role='dialog'>";
                echo "<div class='modal-dialog'>";
                
                  echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                      echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                      echo "<h3>".''.$movies['movieName'].''."</h3>";
                      echo "<h4 class='modal-title'> ".$movies['movieName']."</h4>";
                      echo $movies['movieName'];
                    echo "</div>";
                    echo "<div class='modal-body'>";
                      echo "<p><img src='".''.$pic[0].''."' width='200'></p>";
                      echo "<p>".''.$info[0].''."</p>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                      echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                    echo "</div>";
                  echo "</div>";
                  
                echo "</div>";
              echo "</div>";
  
            echo "</div>";
            echo"</td>"; 
            echo"</tr>";
            
        }
    }
    function movieInfo($something) 
    {
            
            $curl = curl_init();
            $key=getenv('movie_key');
            
            curl_setopt_array($curl, array(
        
            
              CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=8e56967b0a4b849899773bc9ad998665&query=$something&page=1&include_adult=false",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => array(
        "cache-control: no-cache"
      ),
            ));
           $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
     $imageURLs = array();
        for ($i = 0; $i < 1; $i++) 
        {
                $imageURLs[]="https://image.tmdb.org/t/p/w500" . $data['results'][$i]['poster_path'];
                
                 //$config['images']['base_url']
                 //$imageURLs[]=$data['images'][$i]['base_url'];
                 //$imageURLs[]+=$data['images'][$i]['secure_base_url'];
                 //$imageURLs[]+=$data['images'][$i]['backdrop_sizes'];
                 
               
               // echo $imageURLs[$i];
        }
        $err = curl_error($curl);
        curl_close($curl);
        
        return $imageURLs;
}
function overView($something) 
    {
            
            $curl = curl_init();
            $key=getenv('movie_key');
            
            curl_setopt_array($curl, array(
        
            
              CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=8e56967b0a4b849899773bc9ad998665&query=$something&page=1&include_adult=false",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => array(
        "cache-control: no-cache"
      ),
            ));
           $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
     $imageURLs = array();
        for ($i = 0; $i < 1; $i++) 
        {
                $imageURLs[]=$data['results'][$i]['overview'];
                
                 //$config['images']['base_url']
                 //$imageURLs[]=$data['images'][$i]['base_url'];
                 //$imageURLs[]+=$data['images'][$i]['secure_base_url'];
                 //$imageURLs[]+=$data['images'][$i]['backdrop_sizes'];
                 
               
               // echo $imageURLs[$i];
        }
        $err = curl_error($curl);
        curl_close($curl);
        
        return $imageURLs;
}
function insertToShopCart($movie)
{
     global $conn;
    $sql = "INSERT INTO db_checkout FROM `db_movie` WHERE 1 ";
        
}
    
function replaceAll($text) 
    { 
        $text = strtolower(htmlentities($text)); 
        $text = str_replace(get_html_translation_table(), "-", $text);
        $text = str_replace(" ", "-", $text);
        $text = preg_replace("/[-]+/i", "-", $text);
        return $text;
    }
    
?>