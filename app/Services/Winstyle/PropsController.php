<?php


namespace App\Services\Winstyle;


use App\Http\Controllers\Controller;
use App\Models\Parser\ParserLog;
use Symfony\Component\DomCrawler\Crawler;

class PropsController extends Controller
{
    public static function blockCollapsed($nodeShort,$entity = '',$ses_id = 0){
        try {
            $domen = 'https://winestyle.ru';
/*            $link = CasperController::simple($domen.$nodeShort);
            $crawler = new Crawler($link);
            $text = $crawler->filter('.text-block-collapsible')->html();
            return self::cleanWinestyle($text);*/
            return 'test';
        } catch (\Exception $error){
            return null;

//            return ParserLog::create([
//                'code'    => $error->getCode(),
//                'message' => $error->getMessage(),
//                'node'    => '.text-block-collapsible',
//                'url'     => $nodeShort,
//                'entity'  => $entity,
//                'ses_id'  => $ses_id,
//            ]);
        }

    }

    public static function h1($nodeShort,$entity = '',$ses_id = 0){
        try {
//            $crawler = new Crawler(self::getHTML($nodeShort));
            $domen = 'https://winestyle.ru';
            $crawler = new Crawler(CasperController::simple($domen.$nodeShort));
            return $crawler->filter('h1')->eq(0)->text();
        } catch (\Exception $error){
            return ParserLog::create([
                'code'    => $error->getCode(),
                'message' => $error->getMessage(),
                'node'    => 'h1',
                'url'     => $nodeShort,
                'entity'  => 'title',
                'ses_id'  => $ses_id,
            ]);
        }

    }



    public static function cleanWinestyle($text){
        $text = explode(PHP_EOL,$text);
        foreach ($text as $k => $node)  {
            if(strpos($node,'Winestyle') || strpos($node,'в нашем каталоге')){
                unset($text[$k]);
            }
        }
        return implode(PHP_EOL,$text);
    }
}
