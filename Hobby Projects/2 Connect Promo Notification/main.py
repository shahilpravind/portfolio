from bs4 import BeautifulSoup
import fbchat
import requests
import time


CONNECT_UNAME = ""  # connect account user
CONNECT_PASS = ""  # connect account password
FB_UNAME = ""  # fb acc to send msg from
FB_PASS = ""  # fb acc pass 
FRIEND_NAME = ""  # fb acc to send promo details to (name as on fb)

DELAY = 24 * 3600  # seconds

HEADERS = {'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36'}

CONNECT_CRED = {'txtUsername': CONNECT_UNAME, 'txtPassword': CONNECT_PASS}
CONNECT_LOGIN = 'http://my.connect.com.fj/includes/login.php'
CONNECT_HOME = 'http://my.connect.com.fj'

is_promo = False


def send_msg(text):
    try:
        client = fbchat.Client(FB_UNAME, FB_PASS, max_tries=2)

        global is_promo
        friends = client.searchForUsers(FRIEND_NAME)

        for person in friends:
            if person.is_friend and person.first_name == FRIEND_NAME.split(' ')[0] and person.last_name == FRIEND_NAME.split(' ')[-1]:
                break

        text = "*Connect 4G Promotion:* \n\n" + text
        client.send(fbchat.Message(text=text), thread_id=person.uid, thread_type=fbchat.models.ThreadType.USER)
    
        is_promo = True
    except Exception as e:
        print("Messaging failed.")
        print(e)
    finally:
        client.logout()


while True:
    with requests.Session() as sess:
        req = sess.post(CONNECT_LOGIN, headers=HEADERS, data=CONNECT_CRED)
        req = sess.get(CONNECT_HOME, headers=HEADERS)

        soup = BeautifulSoup(req.content, 'html.parser')
        promo = soup.find_all('p', class_='widget-description')

        if 'sorry' in promo[0].text:
            if is_promo:
                is_promo = False
        else:
            if not is_promo:
                send_msg(promo[0].text)

        time.sleep(DELAY)