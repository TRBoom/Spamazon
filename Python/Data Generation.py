import random
import datetime
import urllib.request

word_url = "http://svnweb.freebsd.org/csrg/share/dict/words?view=co&content-type=text/plain"
response = urllib.request.urlopen(word_url)
long_txt = response.read().decode()
WORDS = long_txt.splitlines()

upper_words = [word for word in WORDS if word[0].isupper()]
name_words  = [word for word in upper_words if not word.isupper()]

start_date = datetime.date(2000, 1, 1)
end_date = datetime.date(2021, 1, 1)
time_between_dates = end_date - start_date
days_between_dates = time_between_dates.days

price=['1.99','2.50','2.99','4.99','9.99','14.99','19.99','24.49','29.75','40.00','44.95','60.00','129.95','253.14','322.65']
joiner=[' of the ',' in ',' for ',' ',' of ',' and ']
subject=['Math','Cooking','Science','Adventure','History','Art','Romance','Computers','Sci-fi','Comedy']
bookcount=2000
for i in range(1000,bookcount,1):
    random_number_of_days = random.randrange(days_between_dates)
    random_date = start_date + datetime.timedelta(days=random_number_of_days)
    print("insert into book values ('{}', '{}{}{}',{},'{}','{}');".format(
        str(i),random.choice(WORDS).capitalize(),random.choice(joiner),
        random.choice(WORDS).capitalize(),random.choice(price),random.choice(subject),random_date))

for j in range(10000,10100,1):
    rand_name   = ' '.join([random.choice(name_words) for i in range(2)])
    print("insert into author values ('{}','{}', '{} got her start on the mean streets of New Haven, penning novels for passersby.');".format(
        rand_name,str(j),rand_name))
for l in range(1000,bookcount,1):
    print("insert into wroteBy values ('{}','{}');".format(
        str(l),random.randrange(10000,10100)))


