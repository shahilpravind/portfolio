from bs4 import BeautifulSoup
import html
import requests
import webview

UNAME = ''
PASSW = ''


def format_logs(logs):
    entries = '''
        <table>
            <tr>
                <th>Remaining</th>
                <th>Topped Up</th>
                <th>Expiration</th>
            </tr>
            <tr>
                <td colspan="3"> <hr> </td>
            </tr>
    '''

    min_expiry = 365
    for i in logs:
        entries += "<tr>"
        entries += '<td>' + i[3] + '</td>'
        entries += '<td>' + i[4] + '</td>'
        entries += '<td>' + i[5] + '</td>'
        entries += "</tr>"
        
        expiry = int(i[5].split(' ')[0])
        if expiry < min_expiry:
            min_expiry = expiry

    entries += '''
        </table>
    '''

    return entries


def get_data(req):
    soup = BeautifulSoup(req.content, 'html.parser')
    lists = soup.find_all('li', class_='processed-pct')

    data = ''
    for i in lists:
        if 'Top Up Data:' in i.getText().strip():
            data = i
            break

    return data.find('span').getText()


def get_promo(req):
    soup = BeautifulSoup(req.content, 'html.parser')
    promos = soup.find_all('p', class_='widget-description')

    promo = promos[0].text
    promo = promo.strip().split()
    promo = " ".join(promo)

    return promo


def get_logs(req):
    soup = BeautifulSoup(req.content, 'html.parser')
    table = soup.find('table', id='tableSortableRes')
    table_rows = table.find_all('tr')

    logs = []
    for i in range(len(table_rows)-1, 0, -1):
        cols = table_rows[i].find_all('td')
        col_data = [col.text.strip() for col in cols]
        
        if col_data[3] != '0 MB' and col_data[5] != 'Expired':
            logs.append(col_data)
            
    return logs


def get_info():
    connect_data = ''
    promo = ''
    logs = []
    
    headers = {
        'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36'
    }

    with requests.Session() as sess:
        url = 'http://my.connect.com.fj/includes/login.php'
        post_data = {'txtUsername': UNAME, 'txtPassword': PASSW}
        req = sess.post(url, headers=headers, data=post_data)

        url = 'http://my.connect.com.fj'
        req = sess.get(url, headers=headers)
        connect_data = get_data(req)
        promo = get_promo(req)

        url = 'http://my.connect.com.fj/shop.php'
        req = sess.get(url, headers=headers)
        logs = get_logs(req)

    return connect_data, promo, logs


def get_webpage():
    connect_data, promo, logs = get_info()
    logs = format_logs(logs)

    data_values = connect_data.split(' / ')
    percent_data = int(float(data_values[0].split(' ')[0]) / float(data_values[1].split(' ')[0]) * 100)

    soup = BeautifulSoup(open("webpage/index.html"), "html.parser")
    soup.find('div', id='data-percent').string = str(percent_data)
    soup.find('p', id='data1').string = data_values[0]
    soup.find('p', id='data2').string = data_values[1]
    soup.find('p', id='promo-elem').string = promo
    soup.find('div', id='shop-elem').string = logs

    return html.unescape(str(soup))


def main(window):
    webpage = get_webpage()
    window.load_html(webpage)


def start():
    window = webview.create_window('Connect 4G', 'webpage/loading.html', width=500, height=720)
    webview.start(main, window)


if __name__ == "__main__":
    start()

