<?php

use yii\db\Migration;

use app\models\Products;
use app\models\Categories;
use app\models\Employees;

class m170209_021811_add_default_data extends Migration
{
    public function up()
    {
        $products = Products::find()->all();
        foreach ($products as $pro) {
            $pro->delete();
        }

        $cats = Categories::find()->all();
        foreach ($cats as $cat) {
            $cat->delete();
        }

        $employees = Employees::find()->all();
        foreach ($employees as $e) {
            $e->delete();
        }

        # TABLA: categories
        foreach ($this->categories as $key => $value) {
            $category = new Categories();
            $category->id = $key;
            $category->name = $value;
            $category->status = "Visible";
            $category->save();
        }

        # TABLA: products
        foreach ($this->products as $index => $p) {
            $product = new Products();
            $product->name = $p['name'];
            $product->category_id = $p["category_id"];
            $product->sku = "aaa".$index.$index.$index;
            $product->save();
        }

        # Tabla: employees
        foreach ($this->employees as $emp) {
            $employee = new Employees();
            $employee->name = $emp['first_name'];
            $employee->last_name = $emp['last_name'];
            $employee->phone = "985478563";
            $employee->email = $emp['email'];
            $employee->supermarket_id = 1;
            $employee->save();
        }
    }

    public function down()
    {
        $products = Products::find()->all();
        foreach ($products as $pro) {
            $pro->delete();
        }

        $cats = Categories::find()->all();
        foreach ($cats as $cat) {
            $cat->delete();
        }

        $employees = Employees::find()->all();
        foreach ($employees as $e) {
            $e->delete();
        }
    }

    public $products = [
        ["name" => "Té Dharamsala", "category_id" => "1"],
        ["name" => "Cerveza tibetana Barley", "category_id" => "1"],
        ["name" => "Sirope de regaliz", "category_id" => "2"],
        ["name" => "Especias Cajun del chef Anton", "category_id" => "2"],
        ["name" => "Mezcla Gumbo del chef Anton", "category_id" => "2"],
        ["name" => "Mermelada de grosellas de la abuela", "category_id" => "2"],
        ["name" => "Peras secas orgánicas del tío Bob", "category_id" => "3"],
        ["name" => "Salsa de arándanos Northwoods", "category_id" => "2"],
        ["name" => "Buey Mishi Kobe", "category_id" => "4"],
        ["name" => "Pez espada", "category_id" => "5"],
        ["name" => "Queso Cabrales", "category_id" => "6"],
        ["name" => "Queso Manchego La Pastora", "category_id" => "6"],
        ["name" => "Algas Konbu", "category_id" => "5"],
        ["name" => "Cuajada de judías", "category_id" => "3"],
        ["name" => "Salsa de soja baja en sodio", "category_id" => "2"],
        ["name" => "Postre de merengue Pavlova", "category_id" => "7"],
        ["name" => "Cordero Alice Springs", "category_id" => "4"],
        ["name" => "Langostinos tigre Carnarvon", "category_id" => "5"],
        ["name" => "Pastas de té de chocolate", "category_id" => "7"],
        ["name" => "Mermelada de Sir Rodney's", "category_id" => "7"],
        ["name" => "Bollos de Sir Rodney's", "category_id" => "7"],
        ["name" => "Pan de centeno crujiente estilo Gustaf's", "category_id" => "8"],
        ["name" => "Pan fino", "category_id" => "8"],
        ["name" => "Refresco Guaraná Fantástica", "category_id" => "1"],
        ["name" => "Crema de chocolate y nueces NuNuCa", "category_id" => "7"],
        ["name" => "Ositos de goma Gumbär", "category_id" => "7"],
        ["name" => "Chocolate Schoggi", "category_id" => "7"],
        ["name" => "Col fermentada Rössle", "category_id" => "3"],
        ["name" => "Salchicha Thüringer", "category_id" => "4"],
        ["name" => "Arenque blanco del noroeste", "category_id" => "5"],
        ["name" => "Queso gorgonzola Telino", "category_id" => "6"],
        ["name" => "Queso Mascarpone Fabioli", "category_id" => "6"],
        ["name" => "Queso de cabra", "category_id" => "6"],
        ["name" => "Cerveza Sasquatch", "category_id" => "1"],
        ["name" => "Cerveza negra Steeleye", "category_id" => "1"],
        ["name" => "Escabeche de arenque", "category_id" => "5"],
        ["name" => "Salmón ahumado Gravad", "category_id" => "5"],
        ["name" => "Vino Côte de Blaye", "category_id" => "1"],
        ["name" => "Licor verde Chartreuse", "category_id" => "1"],
        ["name" => "Carne de cangrejo de Boston", "category_id" => "5"],
        ["name" => "Crema de almejas estilo Nueva Inglaterra", "category_id" => "5"],
        ["name" => "Tallarines de Singapur", "category_id" => "8"],
        ["name" => "Café de Malasia", "category_id" => "1"],
        ["name" => "Azúcar negra Malacca", "category_id" => "2"],
        ["name" => "Arenque ahumado", "category_id" => "5"],
        ["name" => "Arenque salado", "category_id" => "5"],
        ["name" => "Galletas Zaanse", "category_id" => "7"],
        ["name" => "Chocolate holandés", "category_id" => "7"],
        ["name" => "Regaliz", "category_id" => "7"],
        ["name" => "Chocolate blanco", "category_id" => "7"],
        ["name" => "Manzanas secas Manjimup", "category_id" => "3"],
        ["name" => "Cereales para Filo", "category_id" => "8"],
        ["name" => "Empanada de carne", "category_id" => "4"],
        ["name" => "Empanada de cerdo", "category_id" => "4"],
        ["name" => "Paté chino", "category_id" => "4"],
        ["name" => "Gnocchi de la abuela Alicia", "category_id" => "8"],
        ["name" => "Raviolis Angelo", "category_id" => "8"],
        ["name" => "Caracoles de Borgoña", "category_id" => "5"],
        ["name" => "Raclet de queso Courdavault", "category_id" => "6"],
        ["name" => "Camembert Pierrot", "category_id" => "6"],
        ["name" => "Sirope de arce", "category_id" => "2"],
        ["name" => "Tarta de azúcar", "category_id" => "7"],
        ["name" => "Sandwich de vegetales", "category_id" => "2"],
        ["name" => "Bollos de pan de Wimmer", "category_id" => "8"],
        ["name" => "Salsa de pimiento picante de Luisiana", "category_id" => "2"],
        ["name" => "Especias picantes de Luisiana", "category_id" => "2"],
        ["name" => "Cerveza Laughing Lumberjack", "category_id" => "1"],
        ["name" => "Barras de pan de Escocia", "category_id" => "7"],
        ["name" => "Queso Gudbrandsdals", "category_id" => "6"],
        ["name" => "Cerveza Outback", "category_id" => "1"],
        ["name" => "Crema de queso Fløtemys", "category_id" => "6"],
        ["name" => "Queso Mozzarella Giovanni", "category_id" => "6"],
        ["name" => "Caviar rojo", "category_id" => "5"],
        ["name" => "Queso de soja Longlife", "category_id" => "3"],
        ["name" => "Cerveza Klosterbier Rhönbräu", "category_id" => "1"],
        ["name" => "Licor Cloudberry", "category_id" => "1"],
        ["name" => "Salsa verde original Frankfurter", "category_id" => "2"],
    ];

    public $categories = [
        "1" => "Bebidas",
        "2" => "Condimentos",
        "3" => "Frutas/Verduras",
        "4" => "Carnes",
        "5" => "Pescado/Marisco",
        "6" => "Lácteos",
        "7" => "Repostería",
        "8" => "Granos/Cereales",
    ];
    /*
    public $proveedores = [
        "Exotic Liquids",
        "Exotic Liquids",
        "Exotic Liquids",
        "New Orleans Cajun Delights",
        "New Orleans Cajun Delights",
        "Grandma Kelly's Homestead",
        "Grandma Kelly's Homestead",
        "Grandma Kelly's Homestead",
        "Tokyo Traders",
        "Tokyo Traders",
        "Cooperativa de Quesos Las Cabras",
        "Cooperativa de Quesos Las Cabras",
        "Mayumi's",
        "Mayumi's",
        "Mayumi's",
        "Pavlova, Ltd.",
        "Pavlova, Ltd.",
        "Pavlova, Ltd.",
        "Specialty Biscuits, Ltd.",
        "Specialty Biscuits, Ltd.",
        "Specialty Biscuits, Ltd.",
        "PB Knäckebröd AB",
        "PB Knäckebröd AB",
        "Refrescos Americanas LTDA",
        "Heli Süßwaren GmbH & Co. KG",
        "Heli Süßwaren GmbH & Co. KG",
        "Heli Süßwaren GmbH & Co. KG",
        "Plutzer Lebensmittelgroßmärkte AG",
        "Plutzer Lebensmittelgroßmärkte AG",
        "Nord-Ost-Fisch Handelsgesellschaft mbH",
        "Formaggi Fortini s.r.l.",
        "Formaggi Fortini s.r.l.",
        "Norske Meierier",
        "Bigfoot Breweries",
        "Bigfoot Breweries",
        "Svensk Sjöföda AB",
        "Svensk Sjöföda AB",
        "Aux joyeux ecclésiastiques",
        "Aux joyeux ecclésiastiques",
        "New England Seafood Cannery",
        "New England Seafood Cannery",
        "Leka Trading",
        "Leka Trading",
        "Leka Trading",
        "Lyngbysild",
        "Lyngbysild",
        "Zaanse Snoepfabriek",
        "Zaanse Snoepfabriek",
        "Karkki Oy",
        "Karkki Oy",
        "G'day, Mate",
        "G'day, Mate",
        "G'day, Mate",
        "Ma Maison",
        "Ma Maison",
        "Pasta Buttini s.r.l.",
        "Pasta Buttini s.r.l.",
        "Escargots Nouveaux",
        "Gai pâturage",
        "Gai pâturage",
        "Forêts d'érables",
        "Forêts d'érables",
        "Pavlova, Ltd.",
        "Plutzer Lebensmittelgroßmärkte AG",
        "New Orleans Cajun Delights",
        "New Orleans Cajun Delights",
        "Bigfoot Breweries",
        "Specialty Biscuits, Ltd.",
        "Norske Meierier",
        "Pavlova, Ltd.",
        "Norske Meierier",
        "Formaggi Fortini s.r.l.",
        "Svensk Sjöföda AB",
        "Tokyo Traders",
        "Plutzer Lebensmittelgroßmärkte AG",
        "Karkki Oy",
        "Plutzer Lebensmittelgroßmärkte AG",
    ];
    */
    public $employees = [
        ["first_name" => "Harry", "last_name" => "Butler", "email" => "hbutler0@mlb.com"],
        ["first_name" => "Michelle", "last_name" => "Lopez", "email" => "mlopez1@ucoz.ru"],
        ["first_name" => "Richard", "last_name" => "Johnson", "email" => "rjohnson2@free.fr"],
        ["first_name" => "Roy", "last_name" => "White", "email" => "rwhite3@hostgator.com"],
        ["first_name" => "Paul", "last_name" => "Gonzales", "email" => "pgonzales4@lycos.com"],
        ["first_name" => "Brenda", "last_name" => "Jordan", "email" => "bjordan5@prnewswire.com"],
        ["first_name" => "John", "last_name" => "Gomez", "email" => "jgomez6@smugmug.com"],
        ["first_name" => "Samuel", "last_name" => "Simmons", "email" => "ssimmons7@google.cn"],
        ["first_name" => "Lawrence", "last_name" => "Gomez", "email" => "lgomez8@weather.com"],
        ["first_name" => "Beverly", "last_name" => "Willis", "email" => "bwillis9@hostgator.com"],
        ["first_name" => "Joseph", "last_name" => "Grant", "email" => "jgranta@e-recht24.de"],
        ["first_name" => "Ronald", "last_name" => "Hughes", "email" => "rhughesb@pbs.org"],
        ["first_name" => "Evelyn", "last_name" => "Miller", "email" => "emillerc@wikispaces.com"],
        ["first_name" => "Terry", "last_name" => "Fisher", "email" => "tfisherd@deliciousdays.com"],
        ["first_name" => "Eric", "last_name" => "Larson", "email" => "elarsone@china.com.cn"],
        ["first_name" => "Raymond", "last_name" => "Fernandez", "email" => "rfernandezf@purevolume.com"],
        ["first_name" => "Carlos", "last_name" => "Williams", "email" => "cwilliamsg@wix.com"],
        ["first_name" => "Paul", "last_name" => "Rogers", "email" => "progersh@cdc.gov"],
        ["first_name" => "Andrea", "last_name" => "Gomez", "email" => "agomezi@wikipedia.org"],
        ["first_name" => "Harry", "last_name" => "Hall", "email" => "hhallj@fastcompany.com"],
        ["first_name" => "Judy", "last_name" => "Clark", "email" => "jclarkk@topsy.com"],
        ["first_name" => "Janet", "last_name" => "Parker", "email" => "jparkerl@altervista.org"],
        ["first_name" => "Henry", "last_name" => "Evans", "email" => "hevansm@admin.ch"],
        ["first_name" => "Phillip", "last_name" => "Patterson", "email" => "ppattersonn@ft.com"],
        ["first_name" => "Harry", "last_name" => "Fisher", "email" => "hfishero@boston.com"],
        ["first_name" => "Donna", "last_name" => "Kim", "email" => "dkimp@dailymail.co.uk"],
        ["first_name" => "Walter", "last_name" => "Thomas", "email" => "wthomasq@google.ru"],
        ["first_name" => "Julia", "last_name" => "Spencer", "email" => "jspencerr@ibm.com"],
        ["first_name" => "Stephen", "last_name" => "Evans", "email" => "sevanss@msu.edu"],
        ["first_name" => "Lillian", "last_name" => "Palmer", "email" => "lpalmert@amazon.co.jp"],
        ["first_name" => "Eric", "last_name" => "Morris", "email" => "emorrisu@purevolume.com"],
        ["first_name" => "Kevin", "last_name" => "Little", "email" => "klittlev@about.me"],
        ["first_name" => "Clarence", "last_name" => "Peters", "email" => "cpetersw@slideshare.net"],
        ["first_name" => "Rachel", "last_name" => "Matthews", "email" => "rmatthewsx@tripod.com"],
        ["first_name" => "Frances", "last_name" => "Lane", "email" => "flaney@ox.ac.uk"],
        ["first_name" => "Jonathan", "last_name" => "Mcdonald", "email" => "jmcdonaldz@people.com.cn"],
        ["first_name" => "Eugene", "last_name" => "Tucker", "email" => "etucker10@yandex.ru"],
        ["first_name" => "Catherine", "last_name" => "Warren", "email" => "cwarren11@answers.com"],
        ["first_name" => "Roy", "last_name" => "Cunningham", "email" => "rcunningham12@etsy.com"],
        ["first_name" => "Deborah", "last_name" => "Vasquez", "email" => "dvasquez13@jugem.jp"],
        ["first_name" => "Catherine", "last_name" => "Carr", "email" => "ccarr14@fda.gov"],
        ["first_name" => "Christopher", "last_name" => "Richardson", "email" => "crichardson15@blogtalkradio.com"],
        ["first_name" => "Wayne", "last_name" => "Wilson", "email" => "wwilson16@noaa.gov"],
        ["first_name" => "Michael", "last_name" => "Morris", "email" => "mmorris17@wikia.com"],
        ["first_name" => "Tammy", "last_name" => "Henry", "email" => "thenry18@usa.gov"],
        ["first_name" => "Scott", "last_name" => "Nichols", "email" => "snichols19@wsj.com"],
        ["first_name" => "Linda", "last_name" => "Lawrence", "email" => "llawrence1a@smugmug.com"],
        ["first_name" => "Katherine", "last_name" => "Cooper", "email" => "kcooper1b@foxnews.com"],
        ["first_name" => "Jason", "last_name" => "Stone", "email" => "jstone1c@slashdot.org"],
        ["first_name" => "Irene", "last_name" => "Sims", "email" => "isims1d@cyberchimps.com"],
        ["first_name" => "Shawn", "last_name" => "Johnston", "email" => "sjohnston1e@friendfeed.com"],
        ["first_name" => "Shirley", "last_name" => "Willis", "email" => "swillis1f@bizjournals.com"],
        ["first_name" => "Philip", "last_name" => "Jordan", "email" => "pjordan1g@biglobe.ne.jp"],
        ["first_name" => "Kathleen", "last_name" => "Miller", "email" => "kmiller1h@hugedomains.com"],
        ["first_name" => "Amanda", "last_name" => "Scott", "email" => "ascott1i@webnode.com"],
        ["first_name" => "Adam", "last_name" => "Dixon", "email" => "adixon1j@opensource.org"],
        ["first_name" => "Gary", "last_name" => "Castillo", "email" => "gcastillo1k@google.ca"],
        ["first_name" => "Joshua", "last_name" => "Stanley", "email" => "jstanley1l@shop-pro.jp"],
        ["first_name" => "Chris", "last_name" => "Cooper", "email" => "ccooper1m@jugem.jp"],
        ["first_name" => "Juan", "last_name" => "Butler", "email" => "jbutler1n@washingtonpost.com"],
        ["first_name" => "Lori", "last_name" => "Arnold", "email" => "larnold1o@ucsd.edu"],
        ["first_name" => "Louis", "last_name" => "Johnson", "email" => "ljohnson1p@over-blog.com"],
        ["first_name" => "Paul", "last_name" => "Ruiz", "email" => "pruiz1q@un.org"],
        ["first_name" => "Jane", "last_name" => "Burns", "email" => "jburns1r@acquirethisname.com"],
        ["first_name" => "Kevin", "last_name" => "Dean", "email" => "kdean1s@51.la"],
        ["first_name" => "Andrew", "last_name" => "Hayes", "email" => "ahayes1t@wired.com"],
        ["first_name" => "Marilyn", "last_name" => "Myers", "email" => "mmyers1u@linkedin.com"],
        ["first_name" => "Rose", "last_name" => "Fernandez", "email" => "rfernandez1v@myspace.com"],
        ["first_name" => "Jeremy", "last_name" => "Richards", "email" => "jrichards1w@biglobe.ne.jp"],
        ["first_name" => "Angela", "last_name" => "Carpenter", "email" => "acarpenter1x@nytimes.com"],
        ["first_name" => "Steven", "last_name" => "Ryan", "email" => "sryan1y@wikipedia.org"],
        ["first_name" => "Louise", "last_name" => "Jenkins", "email" => "ljenkins1z@unc.edu"],
        ["first_name" => "Donald", "last_name" => "Russell", "email" => "drussell20@list-manage.com"],
        ["first_name" => "Richard", "last_name" => "Reid", "email" => "rreid21@wikia.com"],
        ["first_name" => "Tammy", "last_name" => "Oliver", "email" => "toliver22@paypal.com"],
        ["first_name" => "Jesse", "last_name" => "Harris", "email" => "jharris23@eventbrite.com"],
        ["first_name" => "Rachel", "last_name" => "George", "email" => "rgeorge24@g.co"],
        ["first_name" => "Joe", "last_name" => "Castillo", "email" => "jcastillo25@house.gov"],
        ["first_name" => "Jeffrey", "last_name" => "Perry", "email" => "jperry26@about.com"],
        ["first_name" => "Steve", "last_name" => "Cunningham", "email" => "scunningham27@admin.ch"],
        ["first_name" => "Susan", "last_name" => "Kim", "email" => "skim28@prweb.com"],
        ["first_name" => "Janice", "last_name" => "Gibson", "email" => "jgibson29@msu.edu"],
        ["first_name" => "Cheryl", "last_name" => "Hayes", "email" => "chayes2a@wiley.com"],
        ["first_name" => "Shirley", "last_name" => "Day", "email" => "sday2b@prlog.org"],
        ["first_name" => "Betty", "last_name" => "Sanchez", "email" => "bsanchez2c@opera.com"],
        ["first_name" => "Eric", "last_name" => "Murray", "email" => "emurray2d@comsenz.com"],
        ["first_name" => "Heather", "last_name" => "Mills", "email" => "hmills2e@hexun.com"],
        ["first_name" => "Joseph", "last_name" => "Hunt", "email" => "jhunt2f@51.la"],
        ["first_name" => "Janet", "last_name" => "Andrews", "email" => "jandrews2g@jimdo.com"],
        ["first_name" => "Ralph", "last_name" => "Gibson", "email" => "rgibson2h@vkontakte.ru"],
        ["first_name" => "Adam", "last_name" => "Murray", "email" => "amurray2i@merriam-webster.com"],
        ["first_name" => "Anthony", "last_name" => "Wagner", "email" => "awagner2j@skype.com"],
        ["first_name" => "Dorothy", "last_name" => "Burke", "email" => "dburke2k@angelfire.com"],
        ["first_name" => "Melissa", "last_name" => "Barnes", "email" => "mbarnes2l@sfgate.com"],
        ["first_name" => "Matthew", "last_name" => "Austin", "email" => "maustin2m@springer.com"],
        ["first_name" => "Arthur", "last_name" => "Gutierrez", "email" => "agutierrez2n@wix.com"],
        ["first_name" => "George", "last_name" => "Hughes", "email" => "ghughes2o@msu.edu"],
        ["first_name" => "Shirley", "last_name" => "Meyer", "email" => "smeyer2p@cyberchimps.com"],
        ["first_name" => "Willie", "last_name" => "Anderson", "email" => "wanderson2q@latimes.com"],
        ["first_name" => "Adam", "last_name" => "Bradley", "email" => "abradley2r@google.it"]
    ];

}