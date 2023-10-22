from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
import time
import sys

service = Service()
options = webdriver.ChromeOptions()
options.add_argument("--window-size=1280,1200")


driver = webdriver.Chrome(service=service, options=options)
# driver.get("https://www.vivino.com/palazzo-nobile-chianti-classico-riserva/w/2089733?year=2016&price_id=24429311")
driver.get('https://winestyle.ru/products/Familia-Bastida-Alceo-Tempranillo-La-Mancha-DO-2021.html')

path = '/home/murin/_dev/_Denis/vinobaza/vinobaza-front/html5.txt'
# sys.stdout = open(path, 'w')

print(driver.page_source)
