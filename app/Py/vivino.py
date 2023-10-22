from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
import time
import sys

stdout_fileno = sys.stdout

service = Service()
options = webdriver.ChromeOptions()
options.add_argument("--headless")
options.add_argument("--disable-dev-shm-usage")
options.add_argument("--no-sandbox")
# options.add_argument('--profile-directory=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/app/Py/')
# options.add_argument("user-data-dir=/home/murin/_dev/_Denis/vinobaza/vinobaza-front/app/Py/v_env");
options.add_argument("--window-size=1280,1200")


driver = webdriver.Chrome(service=service, options=options)
# driver.get("https://www.vivino.com/palazzo-nobile-chianti-classico-riserva/w/2089733?year=2016&price_id=24429311")
driver.get('https://winestyle.ru/products/Familia-Bastida-Alceo-Tempranillo-La-Mancha-DO-2021.html')

path = '/home/murin/_dev/_Denis/vinobaza/vinobaza-front/html10.txt'
sys.stdout = open(path, 'w')

print(driver.page_source)

stdout_fileno.write('iuuiui iuiuiui')

sys.stdout.close()

sys.stdout = stdout_fileno