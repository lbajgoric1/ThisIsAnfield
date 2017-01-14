# &#x1F497;This is Anfield

# Lejla Bajgorić, 16338

Stranica posvećena engleskom nogometnom klubu Liverpool. Sadržavat će osnovne informacije o klubu, kao i klupskim igračima, stadionu, ...

# &#x1F4D7;Spirala 1: 
- Kreirane su skice kako će se stranice prikazati na pretraživačima kao i mobilnim uređajima
- Kreirane su html stranice koje su:
    + stilizirane css-om; 
    + responzivne i posjeduju grid-view izgled; 
    + izgled za mobilne uređaje je postignut korištenjem media query-a;
    + stranice sadrže html forme
    + svaka stranica sadrži meni koji je funkcionalan;
    + konzistentne, sa poravnatim elementima.
    
# &#x1F4D8;Spirala 2:
- Polja na formi na stranici <i> anfield.html </i> ima JavaScript validaciju. Ostale forme (na stranici <i> takmicenja.html </i> i <i> momcad.html</i>) su funkcionalne. <b> </b>
- Kreiran je dropdown meni koristeći JavaScript, tako da stavka <i>Takmičenja </i> i <i> Momčad </i>na glavnom meniju sadrže dodatne podstranice.
- Kreirana je galerija slika koristeći JavaScript.
- Koristeži Ajax podstranice se učitavaju bez reload-a cijele stranice.

# &#x1F4D9;Spirala 3:
- Koristeći PHP napravljena je serializaciju podataka u XML fajlove (osim podataka vezanih za odbrambene, vezne i napadače; napravljena je serijalizacija golmana te je serijalizacija drugih tipova igrača analoga toj.)
- Adminu je omogućen unos, izmjena i brisanje novosti. Prikaz novosti je u sklopu <i>Početne</i> stranice i u sklopu brisanja novosti (listbox ispisuje sve novosti). Podaci admin-a nalaze se u xml fajlu.
- Podaci koji se unose su validirani i u PHP-u i u JS-u, paženo je na XSS ranjivost napisanog koda.
- Adminu je omogućen download podataka (iz XML-a) u obliku CSV fajla.
- Omogućeno je generisanje pdf fajla na osnovu podataka iz XML-a.
- Omogućena je pretraga novosti po poljima <i>Naslov</i> i <i>Sadržaj</i>.

# &#x1F53B;Lista fajlova:
  + <b>Html folder</b> - sadrži html stranice <br>
  + <b>Php folder</b> - sadrži php stranice <br>
  + <b>Css folder</b> - sadrži css fajlove<br>
  + <b>JavaScript folder</b> - sadrži js fajlove <br>
  + <b>Mockup folder</b> - sadrži skice stranica kako izgledaju na browseru odnosno mobilnom uređaju<br>
  + <b>Slike folder</b> - sadrži sve slike koje su potrebne da bi se prikazale stranice<br>
  
# &#x1F534;Bug
  + Kada se odaberu <i>Takmičenja</i> i <i>Momčad</i> stavka na meniju prikažu se oba pripadajuća padajuća menija. 
