
<!-- DAVID SERRANO PALAZÓN -->

<?php include_once("utiles.php") ?>

<?php
    $loggedIn = TRUE;

    $datos_contacto = "David Serrano Palazon";

    $categorias = [
        "etb" => "Elite Trainer Box",
        "sellado" => "Producto Sellado",
        "coleccionista" => "Coleccionista",
        "mazos" => "Mazos de Juego",
        "juego_rapido" => "Listo para Jugar",
        "sobres" => "Sobres de Expansión",
        "expansiones" => "Expansiones",
        "latas" => "Latas Metálicas",
        "cajas" => "Cajas Coleccionables",
        "promos" => "Cartas Promocionales",
        "booster_box" => "Cajas Booster",
        "competitivo" => "Competitivo",
        "premium" => "Edición Premium",
        "ultra" => "Ultra Premium",
        "mini" => "Mini Latas",
        "union" => "Cartas V-Union",
        "crown_zenith" => "Crown Zenith",
        "pokeball" => "Diseño Poké Ball",
        "vmx" => "VMAX Collection"
    ];

    // 1. Leer los dos ficheros JSON
    $json1 = file_get_contents("productos1.json");
    $json2 = file_get_contents("productos2.json");
    
    // 2. Pasar a arrays asociativos
    $array1 = json_decode($json1, true);
    $array2 = json_decode($json2, true);

    // 3. Fusionar en un único array
    $prod = array_merge($array1, $array2);

    $productos = cambia_fecha($prod);

    //Array que contiene los productos con su información
    // $productos = [
    //     [
    //         "id" =>     1,
    //         "titulo" => "ETB Escarlata & Púrpura",
    //         "descripcion" => "Caja de Entrenador Élite con \n 9 sobres, dados y accesorios.",
    //         "imagen" => "https://sunnystore.es/cdn/shop/files/Sin-titulo20020202022020-Photoroom_3ae68d90-50e0-455a-8d9f-4fbe5b650906.jpg?v=1753183376&width=1946",
    //         "precio" => "49.99€",
    //         "fecha" => "15/02/2023",
    //         "categorias" => ["etb","sellado","coleccionista"]
    //     ],
    //     [
    //         "id" => 2,
    //         "titulo" => "Mazo Pikachu V",
    //         "descripcion" => "Mazo de 60 cartas listo para jugar con Pikachu V.",
    //         "imagen" => "https://m.media-amazon.com/images/I/81pzo5IxBCL.jpg",
    //         "precio" => "16.99€",
    //         "fecha" => "01/09/2022",
    //         "categorias" => ["mazos","sellado","juego_rapido"]
    //     ],
    //     [
    //         "id" => 3,
    //         "titulo" => "Sobre Escarlata",
    //         "descripcion" => "Sobre de 10 cartas de la expansión Escarlata.",
    //         "imagen" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdwvR--X9soW079LnECLXc5MoNnSlu5onHuA&s",
    //         "precio" => "4.50€",
    //         "fecha" => "12/03/2023",
    //         "categorias" => ["sobres","sellado","expansiones"]
    //     ],
    //     [
    //         "id" => 4,
    //         "titulo" => "Lata Charizard V",
    //         "descripcion" => "Lata metálica con carta promo Charizard V y sobres.",
    //         "imagen" => "https://images.stockx.com/images/Pokemon-TCG-25th-Anniversary-Celebrations-Tin-Lances-Charizard-V.jpg?fit=fill&bg=FFFFFF&w=1200&h=857&q=60&dpr=1&trim=color&updated_at=1630695020",
    //         "precio" => "24.99€",
    //         "fecha" => "20/06/2022",
    //         "categorias" => ["latas","sellado","coleccionista"]
    //     ],
    //     [
    //         "id" => 5,
    //         "titulo" => "Caja Regieleki V",
    //         "descripcion" => "Caja especial con promo Regieleki V y sobres.",
    //         "imagen" => "https://m.media-amazon.com/images/I/7154G5-4LDL._UF350,350_QL50_.jpg",
    //         "precio" => "21.99€",
    //         "fecha" => "01/05/2023",
    //         "categorias" => ["cajas","promos","sellado"]
    //     ],
    //     [
    //         "id" => 6,
    //         "titulo" => "Deck Zacian V",
    //         "descripcion" => "Mazo competitivo de Zacian V, listo para jugar.",
    //         "imagen" => "https://m.media-amazon.com/images/I/51314iGzGfL._UF1000,1000_QL80_.jpg",
    //         "precio" => "14.99€",
    //         "fecha" => "14/09/2022",
    //         "categorias" => ["mazos","competitivo","juego_rapido"]
    //     ],
    //     [
    //         "id" => 7,
    //         "titulo" => "Mini Lata Paldea",
    //         "descripcion" => "Mini lata con 2 sobres y carta de arte Paldea.",
    //         "imagen" => "https://dam.elcorteingles.es/producto/www-001044850500578-00.jpg",
    //         "precio" => "12.99€",
    //         "fecha" => "10/04/2023",
    //         "categorias" => ["latas","mini","coleccionista"]
    //     ],
    //     [
    //         "id" => 8,
    //         "titulo" => "Premium Charizard UPC",
    //         "descripcion" => "Caja Ultra Premium Charizard con promos y accesorios.",
    //         "imagen" => "https://m.media-amazon.com/images/I/81PEl1s1G9L._UF894,1000_QL80_.jpg",
    //         "precio" => "129.99€",
    //         "fecha" => "18/11/2022",
    //         "categorias" => ["premium","ultra","coleccionista"]
    //     ],
    //     [
    //         "id" => 9,
    //         "titulo" => "ETB Astral Radiance",
    //         "descripcion" => "Caja de Entrenador Élite expansión Astral Radiance.",
    //         "imagen" => "https://m.media-amazon.com/images/I/61C6B4fH1XL.jpg",
    //         "precio" => "44.99€",
    //         "fecha" => "20/05/2022",
    //         "categorias" => ["etb","expansiones","sellado"]
    //     ],
    //     [
    //         "id" => 10,
    //         "titulo" => "Booster Box Escarlata",
    //         "descripcion" => "Caja de 36 sobres Escarlata y Púrpura.",
    //         "imagen" => "https://m.media-amazon.com/images/I/91hUKX-tu5L.jpg",
    //         "precio" => "144.99€",
    //         "fecha" => "15/03/2023",
    //         "categorias" => ["booster_box","expansiones","sellado"]
    //     ],
    //     [
    //         "id" => 11,
    //         "titulo" => "Mazo Mewtwo V",
    //         "descripcion" => "Deck temático con Mewtwo V listo para jugar.",
    //         "imagen" => "https://m.media-amazon.com/images/I/71HBVYi6xZL.jpg",
    //         "precio" => "15.99€",
    //         "fecha" => "11/07/2022",
    //         "categorias" => ["mazos","juego_rapido","competitivo"]
    //     ],
    //     [
    //         "id" => 12,
    //         "titulo" => "Colección Paldea",
    //         "descripcion" => "Caja con promos de starters Paldea y 3 sobres.",
    //         "imagen" => "https://m.media-amazon.com/images/I/81wAaziGm2L.jpg",
    //         "precio" => "19.99€",
    //         "fecha" => "06/01/2023",
    //         "categorias" => ["cajas","promos","coleccionista"]
    //     ],
    //     [
    //         "id" => 13,
    //         "titulo" => "Caja Morpeko V-Union",
    //         "descripcion" => "Caja con Morpeko V-Union y accesorios de juego.",
    //         "imagen" => "https://m.media-amazon.com/images/I/91D0mvXzO-L.jpg",
    //         "precio" => "29.99€",
    //         "fecha" => "01/04/2022",
    //         "categorias" => ["cajas","union","coleccionista"]
    //     ],
    //     [
    //         "id" => 14,
    //         "titulo" => "Elite Trainer Crown Zenith",
    //         "descripcion" => "Caja de Entrenador Élite expansión Crown Zenith.",
    //         "imagen" => "https://m.media-amazon.com/images/I/61S0G8AHUtL._UF894,1000_QL80_.jpg",
    //         "precio" => "59.99€",
    //         "fecha" => "20/01/2023",
    //         "categorias" => ["etb","crown_zenith","sellado"]
    //     ],
    //     [
    //         "id" => 15,
    //         "titulo" => "Mini Lata Crown Zenith",
    //         "descripcion" => "Mini lata con 2 sobres Crown Zenith y arte coleccionable.",
    //         "imagen" => "https://m.media-amazon.com/images/I/51j66wQqX5L._UF1000,1000_QL80_.jpg",
    //         "precio" => "13.99€",
    //         "fecha" => "01/02/2023",
    //         "categorias" => ["latas","mini","crown_zenith"]
    //     ],
    //     [
    //         "id" => 16,
    //         "titulo" => "Premium Zacian & Zamazenta",
    //         "descripcion" => "Caja Ultra Premium de Zacian & Zamazenta.",
    //         "imagen" => "https://www.bea.swiss/images/product/large/5095.jpg",
    //         "precio" => "119.99€",
    //         "fecha" => "18/11/2021",
    //         "categorias" => ["premium","ultra","coleccionista"]
    //     ],
    //     [
    //         "id" => 17,
    //         "titulo" => "Poké Ball Tin",
    //         "descripcion" => "Lata Poké Ball con 3 sobres y moneda metálica.",
    //         "imagen" => "https://m.media-amazon.com/images/I/712lK-hmHfL._UF1000,1000_QL80_.jpg",
    //         "precio" => "14.99€",
    //         "fecha" => "12/06/2022",
    //         "categorias" => ["latas","pokeball","coleccionista"]
    //     ],
    //     [
    //         "id" => 18,
    //         "titulo" => "Booster Box Crown Zenith",
    //         "descripcion" => "Caja con 36 sobres expansión Crown Zenith.",
    //         "imagen" => "https://www.cardtrader.com/uploads/blueprints/image/312742/crown-zenith-booster-bundle-crown-zenith.jpg",
    //         "precio" => "149.99€",
    //         "fecha" => "25/01/2023",
    //         "categorias" => ["booster_box","crown_zenith","sellado"]
    //     ],
    //     [
    //         "id" => 19,
    //         "titulo" => "Deck Inteleon VMAX",
    //         "descripcion" => "Mazo temático Inteleon VMAX con cartas listas para jugar.",
    //         "imagen" => "https://m.media-amazon.com/images/I/71YcKxCtPYL.jpg",
    //         "precio" => "17.99€",
    //         "fecha" => "14/10/2021",
    //         "categorias" => ["mazos","vmx","juego_rapido"]
    //     ],
    //     [
    //         "id" => 20,
    //         "titulo" => "Caja Pikachu VMAX",
    //         "descripcion" => "Caja con promos Pikachu V y VMAX más sobres.",
    //         "imagen" => "https://mundodistorsion.es/wp-content/uploads/2025/04/pikachu-vmax.webp",
    //         "precio" => "29.99€",
    //         "fecha" => "06/02/2022",
    //         "categorias" => ["cajas","promos","coleccionista"]
    //     ],
    // ];































?>

