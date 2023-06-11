<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
include_once('simple_html_dom.php');

$infile = $argv[1];
$fp = file($infile);

if(count($fp))
    {
     $data="Domain\tSeo_Performance\tTraffic_Rank\tOverall_Score\tVisitors_per_months\tPage_views_per_months\tAlexa_rank\n";
        foreach($fp as $url)
        {
            $d=trim(preg_replace('#^http//#i','',$url));
            $d=preg_replace('#^www.#i','',$d);
            $url="http://www.mustat.com/$d";
            
            $html = file_get_html($url);
            
            //Mustat SEO performance        
            $seo=trim($html->find("li[class=rating-seo]",0)->children(2)->plaintext);
            
            //Mustat Traffic       
            $traffic=trim($html->find("li[class=rating-traffic]",0)->children(2)->plaintext);
            
            //Mustat score/ oberall rating        
            $score=trim($html->find("span[class=value]",0)->plaintext);
           
            //Visitors per months        
            $visitors=$html->find("table[class=horizontal]",0)->children(1)->children(1)->children(3)->plaintext;
            
            //Page view per months        
            $pageviews=$html->find("table[class=horizontal]",0)->children(1)->children(0)->children(3)->plaintext;
            
            //Alexa rank
            $alexa_rank=preg_replace('/#/', '', ($html->find("section[class=bsection clear]",2)->children(2)->children(0)->children(1)->children(1)->plaintext));
            
           $data.="$d\t$seo\t$traffic\t$score\t$visitors\t$pageviews\t$alexa_rank\n";           
        }
    }
    file_put_contents("output.tsv", $data);
    echo $data;
   // php website_rank_checker url.txt     

?>
