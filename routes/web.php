<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return "Practice make perfect.";
});
Route::get('/algoritma', function () {
    #Soal 1 a
    echo '<h3>Soal 1a</h3>';
    $num = 8;
    for ($i=$num; $i >= 1; $i--){
        for ($j = $i; $j >= 1; $j--){
            echo $j;
        }
        echo "<br>";
    }
    
    // ==============================================
    echo '<h3>Soal 1b</h3>';
    $sisi = 7;
    for($i=0; $i < $sisi; $i++)
    {
        for($j=0; $j < $sisi; $j++)
        {
            if( $i==0 || $i == $sisi-1)
            {
                echo "&nbsp#&nbsp";
            }else{
                if( ($j == 0) || ($j == $sisi-1) ) 
                {
                    echo "&nbsp#&nbsp";
                }
                elseif( ( $j == $i ) || ($i == $sisi - ($j+1) ) ){
                    echo "&nbsp#&nbsp";
                }else{
                    echo "&nbsp&nbsp&nbsp&nbsp";
                }
            }
        }
        echo "<br>";
    }

    // ============================================
    // Soal 2
    echo '<h3>Soal 2</h3>';
    $n = (string) 1345679;
    for($m = 0; $m < strlen($n); $m++){
        echo str_pad($n[$m], strlen($n) - $m, "0", STR_PAD_RIGHT);
        echo "<br>";
    }

    
    

});
