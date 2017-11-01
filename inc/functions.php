
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

function findBooks($interest)
{
    
    
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
            
              CURLOPT_URL => "http://api.walmartlabs.com/v1/search?apiKey=d5stkbf6kze5gbq2va7pmjvu&lsPublisherId={Your%20LinkShare%20Publisher%20Id}&query=$interest",
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
    //$item="items";
    //$thumbnailImage="thumbnailImage";
   
    for ($i = 0; $i < 99; $i++) 
    {
        
            $imageURLs[] = $data['items'][$i]['thumbnailImage'];
            $i++;
            $imageURLs[] = $data['items'][$i]['name'];
            
             //$config['images']['base_url']
             //$imageURLs[]=$data['images'][$i]['base_url'];
             //$imageURLs[]+=$data['images'][$i]['secure_base_url'];
             //$imageURLs[]+=$data['images'][$i]['backdrop_sizes'];
             
           // echo "<br>";
           // echo $imageURLs[$i];
    }
    $err = curl_error($curl);
    curl_close($curl);
    
    return $imageURLs;
    }
?>