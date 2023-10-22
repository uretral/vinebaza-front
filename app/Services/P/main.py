from request_html import HTMLSession

session = HTMLSession()

r = session.get('https://blog.popstas.ru/')

print(r)
