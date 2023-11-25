<?php

namespace App\Classes;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

abstract class VivinoSelenium
{
    protected ChromeOptions $chromeOptions;
    protected DesiredCapabilities $capabilities;
    public RemoteWebDriver $driver;
    public array $output = [];


    /**
     * java -Dwebdriver.chrome.driver="/home/murin/_dev/_Denis/vinobaza/vinobaza-front/public/chromedriver" -jar public/selenium-server-standalone-4.0.0-alpha-2.jar -port 4545
 * @param string $localServerHost
     */
    public function __construct(string $localServerHost = 'http://localhost:4545/wd/hub')
    {
//        sleep(5);
        $this->chromeOptions = new ChromeOptions();
        $this->chromeOptions->addArguments(['user-agent=Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36']);
        $this->chromeOptions->addArguments(['--disable-blink-features=AutomationControlled']);
        $this->chromeOptions->addArguments(['--headless']);
        $this->chromeOptions->addArguments(['--no-sandbox']);
        $this->chromeOptions->addArguments(['--disable-dev-shm-usage']);
        $this->chromeOptions->addArguments(['--disable-extensions']);
        $this->chromeOptions->addArguments(['--disable-in-process-stack-traces']);
        $this->chromeOptions->addArguments(["--disable-logging"]);
        $this->chromeOptions->addArguments(["--log-level=3"]);

        $this->capabilities = DesiredCapabilities::chrome();
        $this->capabilities->setCapability(ChromeOptions::CAPABILITY, $this->chromeOptions);
        $this->driver = RemoteWebDriver::create($localServerHost, $this->capabilities, 5000);

    }


    /**
     * @param $url
     * //$this->driver->get("https://intoli.com/blog/not-possible-to-block-chrome-headless/chrome-headless-test.html");
     * @return callable
     */
    function jqueryAjaxFinished($url): callable
    {
        return static function ($driver) use ($url) {
            return $driver->executeScript(<<< JS
            let response = await fetch("https://www.vivino.com/api/{$url}");
            let commits = await response.json();
            return commits;
            JS
            );
        };
    }

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    protected function callVivinoApi($url)
    {
        return $this->driver->wait()->until($this->jqueryAjaxFinished($url));
    }

    /**
     * @param $jsString
     * @return \Closure
     */
    protected function callJs($jsString)
    {
        return static function ($driver) use ($jsString) {
            return $driver->executeScript(<<< JS
            {$jsString}
            JS
            );
        };
    }

    function jqueryAjaxGrape($id): callable
    {
        return static function ($driver) use ($id) {
            return $driver->executeScript(<<< JS
            await fetch("https://www.vivino.com/grapes/{$id}").then(response => response.text()).then(text => {
            const parser = new DOMParser;
            const htmlDocument = parser.parseFromString(text, "text/html");
            const section = htmlDocument.documentElement.querySelector(".wrap");
            section.querySelectorAll('script').forEach(function (el) {
                if (el.innerHTML.includes(' window.__PRELOADED_STATE__.grape')) {
                    var code = el.innerHTML; eval(code);
                }
                });
            });
            return window.__PRELOADED_STATE__.grape;
            JS
            );
        };
    }


}
