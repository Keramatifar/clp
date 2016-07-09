<?php
include("autoloader.php");
use \NlpTools\Tokenizers\WhitespaceTokenizer;
use \NlpTools\Similarity\JaccardIndex;
use \NlpTools\Similarity\CosineSimilarity;
use \NlpTools\Similarity\Simhash;
use Tga\SimHash\Fingerprint;
$s1 = $s2 = '';
    $s1 = $_POST['text1'];
    //$s2 = $_POST['text2'];
    $stopword=
    [
        'in'    
       ,'about'    
       ,'always'    
       ,'after'    
       ,'again'    
       ,'all'    
       ,'are'    
       ,'am'    
       ,'is'    
       ,'on'
       ,'was'   
       ,'were'   
       ,'can'   
       ,'could'   
       ,'should'   
       ,'where'   
       ,'as'   
       ,'by'   
       ,'but'   
       ,'do'   
       ,'does'   
       ,'done'   
       ,'did'   
       ,'every'   
       ,'ever'   
       ,'just'   
       ,'it'   
       ,'its'   
       ,'what'   
       ,'want'   
       ,'they'   
       ,'year'   
       ,'we'   
       ,'them'   
       ,'your'   
       ,'yours'   
       ,'yet'   
       ,'up'   
       ,'under'   
       ,'us'   
       ,'well'   
       ,'untill'   
       ,'any'   
       ,'another'   
       ,'across'   
       ,'anything'   
       ,'ever'   
       ,'everyday'   
       ,'above'   
       ,'a'   
       ,'at'   
       ,'ask'   
       ,'be'   
       ,'became'   
       ,'being'   
       ,'best'   
       ,'better'   
       ,'between'   
       ,'big'   
       ,'both'   
       ,'cannot'   
       ,'certain'   
       ,'clear'   
       ,'end'   
       ,'early'   
       ,'each'   
       ,'everybody'   
       ,'everywhere'   
       ,'everything'   
       ,'during'   
       ,'clearly'   
       ,'certainly'   
       ,'although'   
       ,'already'   
       ,'large'   
       ,'once'   
       ,'only'   
       ,'open'   
       ,'or'   
       ,'of'   
       ,'off'   
       ,'old'   
       ,'older'   
       ,'oldest'   
       ,'other'   
       ,'quite'   
       ,'rather'   
       ,'right'   
       ,'room'   
       ,'rooms'   
       ,'said'   
       ,'see'   
       ,'seemed'   
       ,'seeming'   
       ,'seems'   
       ,'several'   
       ,'show'   
       ,'showed'   
       ,'smal'   
       ,'smaler'   
       ,'smallest'   
       ,'new'   
       ,'use'   
       ,'used'   
       ,'uses'   
       ,'well' 
       ,'to' 
       ,'' 
        
    ];
    $fs1 = explode(' ',$s1);
  
    foreach($stopword as $word)
    {
      //  $fs1 = str_replace($word, '', $fs1);
      $i = array_search($word, $fs1);
    
      if($i > 0)
      {
         // echo "$word Found and removed from s1<hr>";
          unset($fs1[$i]);
      }
      
    }
   //s echo $fs1;
    $s1 = implode(' ', $fs1); 
  //  echo $s1;
 //  echo'<hr>';
  //  $s2 = implode(' ', $fs2);
  //  echo $s2 ;
     
    
    $tok = new WhitespaceTokenizer();
    $simhash = new Simhash(16); // 16 bits hash

    $setA = $tok->tokenize($s1);
  //  $setB = 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Lang" content="en">
        <meta name="author" content="">
        <meta http-equiv="Reply-to" content="@.com">
        <meta name="generator" content="PhpED 8.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="creation-date" content="09/06/2012">
        <meta name="revisit-after" content="15 days">
        <title>Simhash</title>
        <link rel="stylesheet" type="text/css" href="http://masterfile.ir/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://masterfile.ir/mrkf.css">
        <link rel="stylesheet" type="text/css" href="http://font.masterfile.ir/font.css">
    </head>
    <body>
        <div class="row">
            <div class="container bg-warning" style="margin-top: 100px;">
                <form action="" method="post">

                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Text 1</h3>
                            </div>
                            <div class="panel-body">
                                <textarea class="form-control" name="text1" rows="3"><?=$s2;?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Result</h3>
                            </div>
                            <div class="panel-body">
                                
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                    <div class="col-md-12">
                        <?php
                        if(isset($_POST['submit']))
                        {

                            ?>
                            <div class="col-md-6"><div class="alert alert-success" role="alert">
                            <?php
$db = mysqli_connect('localhost','root','', 'python');
$result = mysqli_query($db, "SELECT * FROM article");

                                    ?>
                                   
                                 
                                    
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                
                            </div>

                            <div class="col-md-4 text-center"> 
                              
                            </div>
                            <div class="col-md-4"> 
                            <?php
                            while($row =  mysqli_fetch_assoc($result))
                                {                               
                           ?>

                                <div class="alert alert-success" role="alert">
                                
                                 <?php
                                 $body = $tok->tokenize($row['Body']);
                                   $sh =  $simhash->similarity(
                                        $setA,
                                        $body
                                    );
                                    $sh *=100;
                                    ?>
                                 <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow=" <?=$sh;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$sh;?>%;">
                                          Similarity HASH:  <?=$row['ID'];?> -  <?=$sh;?>%
                                        </div>
                                    </div>
                                   
                                </div>
                           <?php } ?>
                            </div>
                            <div class="col-md-4"> 
                                <div class="alert alert-danger" role="alert"><b> Simhash Text2:</b>
                                    <?=
                                    $simhash->simhash($setB)
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="http://masterfile.ir/jquery.min.js"></script>
        <script type="text/javascript" src="http://masterfile.ir/bootstrap.min.js"></script>
    </body>
</html>
?>