<h1 align="center">Sylius</h1>

Installed plugins
-----------------
* [Sylius Standard Edition](https://github.com/Sylius/Sylius-Standard): Sylius is the first decoupled eCommerce platform based on Symfony and Doctrine.
* [CMS](https://github.com/BitBagCommerce/SyliusCmsPlugin): This plugin allows you to add dynamic blocks with images, text or HTML to your storefront as well as pages and FAQs section.
* [Admin Order Creation](https://github.com/Sylius/AdminOrderCreationPlugin): Creating (and copying) orders in the administration panel.

System Requirements
-------------------

* [Docker](https://docs.docker.com/install/#server)
* [Docker Compose](https://docs.docker.com/compose/install/)

Installation
------------

```bash
$ mkdir ~/surprizemi
$ cd ~/surprizemi
$ git clone git@github.com:dperkosan/sylius.git
$ cd sylius
$ docker-compose up
```

In order to install fresh DB, run this commands:

```bash
$ docker-compose exec php php bin/console doctrine:schema:update --force
$ docker-compose exec php php bin/console sylius:fixtures:load 
```
- admin: http://127.0.0.1/admin (sylius/sylius)
- shop:  http://127.0.0.1

To connect to DB (db name is sylius):

```bash
$ docker-compose exec mysql mysql -u sylius -pnopassword
```

Troubleshooting
---------------

If something goes wrong, errors & exceptions are logged at the application level:

```bash
$ docker-compose exec php tail -f var/log/prod.log
$ docker-compose exec php tail -f var/log/dev.log
```