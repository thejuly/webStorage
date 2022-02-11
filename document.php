<?php
    // $doc_team = $_POST['doc_team'];
    $doc_team = $_GET['doc_team'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="icon" href="https://meditation-lab.com/wp-content/uploads/2019/06/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Maitree|Mali|Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css.css">

    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1 style="font-size: 45px; color: #0083a1; font-family: 'Mali', cursive; text-align: center;"><?php 
            echo '<button onclick="goBack()" type="reset" class="me-3 btn btn-info" id="btn"> <<  </button>';
            echo $doc_team;?></h1>
        <h1>

        <script>
        function goBack() {
        window.history.back();
        }
        </script>
        <hr style="margin: 20px;">
        <?php 
            $url_app_script = 'https://script.google.com/macros/s/AKfycbwoVg_w1TRpwh6i1Qg7J2C9kDkLTGz8vxin2QmzPedEHF-c6Mr5lgOuKwzRa1nGXY9EAw/exec';
            
            $rnt_data = c_url($url_app_script, $doc_team);
            $rnt_data = json_decode($rnt_data, true);
            // echo $rnt_data[0];print_r($rnt_data[0]);echo$rnt_data[0]['docName']
            // echo gettype($rnt_data);echo '<br>';
            // $jObj = json_decode($rnt_data);
            // echo gettype($rnt_data);echo '<br>';
            // $rnt_data = json_decode($rnt_data, true);
            // echo gettype($rnt_data);echo '<br>';
            // printDoc($rnt_data);


        ?>


                <?php
                    foreach ($rnt_data as $i=>$values) {
                        // echo $values['docName'].'  a  '; echo $values['docURL'].'<br>';
                        if($values['docURL']){
                            echo '<li class="ms-4"><a href="'. $values['docURL'].'" target="_blank"> 
                                 <span> '. $values['docName'].'</span></a> 
                                 &nbsp (Type: '.$values['docArea'].', By: '.$values['docBy'].')</li>';

                            // echo $values['docName'].'     ';echo $values['docURL'].'<br>';

                        }else{
                            // echo '<hr />';
                            echo '<H4 class="ms-3 mt-5">'.$values['docName'].'</H4>';
                            
                        }

                        
                        

                        foreach ($values as $value) {
                            // $j = $i+1;

                        }

                    }
                ?>


        <!-- <p>aa</p> -->
    </div>

    <footer class="card bg-secondary text-white text-center p-3 mt-5">
        <span>
            Copyright © 2022
            <a href="#" target="_blank" class="text-white"></a>
            All Right Reserved (By: Jutatip)
        </span>
    </footer>

</body>
</html>




















<?php
        function printSheet($data) {
            foreach ($data as $values) {
                foreach ($values as $value) {
                    echo "$value <br>";
                }
            }

        }

        function printDoc($data) {
            foreach ($data as $values) {
                foreach ($values as $value) {
                    echo "$value <br>";
                }
            }
            
        }

        function c_url($url_app_script, $req='DCS_PM12') {
            $url = $url_app_script.'?req='.$req;
            // echo $url;
    
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $header = ['Content-Type: application/json'];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
            $response = curl_exec($curl);
            // echo $response . "<br>";
            curl_close($curl);
    
            // $txt_split = explode(",",$response);
    
            // $data = json_decode($response);

            //$uuid = $data->wo;
            //echo $data->uuid . "<br>";
            //echo $uuid. "<br>";
    
        
            $data = $response;
            return $data;
          }
    ?>