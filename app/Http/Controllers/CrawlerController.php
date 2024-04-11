<?php

namespace App\Http\Controllers;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerController extends Controller
{
    #[NoReturn] public function scrape(): void
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://edition.cnn.com/europe');

        $articles = $crawler->filter('.layout-no-rail')->each(function (Crawler $node) {
            $titles = [];
            $images = [];

            $node->filter('.container__headline-text')->each(function (Crawler $c) use (&$titles) {
                $titles[] = $c->text();
            });
            $node->filter('.image__container img')->each(function (Crawler $m) use (&$images) {
                $images[] = $m->attr('src');
            });
            return [
                'titles' => $titles,
                'images' => $images
            ];
        });

        dd($articles) ;
    }
}
