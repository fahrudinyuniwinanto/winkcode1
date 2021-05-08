# Winkcode 1 Framework #

Build with Codeigniter 3.1.9 + Harviacode

### Features ###

* Auth
* Access Management
* CRUD Generator include template (localhost/winkcode1/crud)
* Suport master detail form
* Lookup data (example on Management Users>Users menu, on group button input)

### How do I get set up? ###

* copy paste project folder
* import DB (path: assets/db/)
* setup base_url on config.php, and set your database.php 

### How to use CRUD Generator? ###
* clone Winkcode 1 to your localhost
* import database on assets/db/
* login on localhost/winkcode1/auth (user: dev, pass: dev123)
* comment defined('BASEPATH') or exit('No direct script access allowed'); line on config/database.php
* go to localhost/winkcode1/harviacode
* choose table want to generate
* generate model, controller and view (use default name)
* go to localhost/winkcode1/master_access
* create master as your table (ex: tabel siswa): M_SISWA
* go to localhost/winkcode1/user_access, turn on for developer group with your access M_SISWA you have created before.
* set your menu on localhost/winkcode1/sy_menu (can be multiple level)
* lauch your new page: localhost/winkcode1/siswa
* drinking the coffe :)


### Copyright ###

* Free to use (dont remove watermark on footerpage)

Thanks for contributing
### Documentation is <a href="https://www.youtube.com/watch?v=qo5MI1_EB5M" target="_blank">here</a> ###

try also <a href="https://github.com/fahrudinyuniwinanto/winkcode2" target="_blank">Winkcode 2 Framework</>



