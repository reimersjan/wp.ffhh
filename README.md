# wp.ffhh Dokumentation (german)

<img src="https://raw.githubusercontent.com/reimersjan/wp.ffhh/master/assets/wpffhh-logo.jpg" width="200" height="200" alt="wp.ffhh logo"/>

wp.ffhh ist eine WordPress Multisite auf einem Raspberry Pi, erreichbar innerhalb von [Freifunk Hamburg](https://hamburg.freifunk.net) & InterCity-VPN.

Das Ziel ist, dass jede/r sich einfach und unkompliziert eine WordPress-Seite einrichten kann. So ähnlich wie auf wordpress.com, nur ohne Premium-Shit, durchgehend kostenfrei und innerhalb von Freifunk.

## Erreichbarkeit

wp.ffhh ist **NICHT** im Internet erreichbar. In Hamburg ist es möglich http://wp.ffhh im Browser aufzurufen, wenn man mit dem **WLAN _hamburg.freifunk.net_** verbunden ist. Aus anderen Städten / Freifunk-Communities ist es ebenfalls möglich wp.ffhh aufzurufen, allerdings nur wenn die Community ans [InterCity-VPN](http://freifunk.net/blog/2014/02/das-intercity-vpn/) angeschlossen ist.

## Konfiguration

![photo of the running Raspberry Pi](https://raw.githubusercontent.com/reimersjan/wp.ffhh/master/assets/photo.jpg)

#### Hardware

- Raspberry Pi Model B
 - CPU: 700 MHz
 - RAM: 512 MB
 - SD: 32 GB
- ~~TP-Link TL-WDR3600~~ mit [Freifunk Hamburg Firmware](https://hamburg.freifunk.net/anleitung#firmware)
 - momentan TP-Link TL-WR841N

#### Software

- OS: Raspbian
- Apache2
 - mod_rewrite
- PHP
 - php-apc (Caching)
- MySQL
- WordPress Multisite mit folgenden Plugins:
 - [Multi-Site Site List Shortcode](https://wordpress.org/plugins/multi-site-site-list-shortcode/)
 - [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/)
 - [WP-Mail-SMTP](https://wordpress.org/plugins/wp-mail-smtp/)
 - [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)
- **Konfigurationsdateien in [server-files](https://github.com/reimersjan/wp.ffhh/tree/master/server-files)**

#### Domain  

Eintrag in [github.com/freifunkhamburg/dhcp-static/static.conf](https://github.com/freifunkhamburg/dhcp-static/blob/master/static.conf)

```
host wp {
        hardware ethernet b8:27:eb:ec:c7:ae;
        fixed-address 10.112.0.8;
}
```

## Status

[@wpffhh auf Twitter](https://twitter.com/wpffhh) ist der Status-Kanal für den Dienst. Falls wp.ffhh mal down oder länger offline sein sollte, steht es dort.

## Screenshot

![Screenshot](https://raw.githubusercontent.com/reimersjan/wp.ffhh/master/assets/screenshot-2015-06-16.png)
