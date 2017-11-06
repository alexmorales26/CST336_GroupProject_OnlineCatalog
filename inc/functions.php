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
    
    function trending()
    {
         $curl = curl_init();
                $key=getenv('movie_key');
                
                curl_setopt_array($curl, array(
            
                
                  CURLOPT_URL => "https://api.themoviedb.org/3/movie/top_rated?api_key=8e56967b0a4b849899773bc9ad998665&language=en-US&page=1",
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
            echo"<td> <a href='html_images.asp'>Preview</a> </td>"; 
            echo"</tr>"; 
        }
    }
    
?>