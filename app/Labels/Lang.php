<?php
namespace App\Labels;

class Lang {
    public function __construct(){}

    public static function _t($key,$lang){
        $file = base_path('app/Labels/' . $lang . '.php');
        if (file_exists($file)) {
            include $file;
            if (isset($labels[md5($key)])) {
                return $labels[md5($key)];
            }else{
                //recorremos app/Labels y insertamos la key en el fichero
                $files = glob(base_path('app/Labels/*.php'));
                foreach($files as $file){
                    if (file_exists($file) && $file != base_path('/app/Labels/lang.php')) {
                        //incluimos una nueva linea en el archivo en cada idioma
                        $fp = fopen($file, 'a');
                        fwrite($fp, '$labels[\''.md5($key).'\'] = \''.$key."';\r"."\n");
                        fclose($fp);
                    }
                }
            }
        }

        return $key;
    }
}$labels['1544dd6651ff589742960b93ade44b1b'] = 'PROGRAMA';
$labels['038bf1c4988273b7592db3c9df766327'] = 'SRC';
$labels['c412240f3bda9d755279e0c148e1a68c'] = 'FOTOS';
$labels['fa16a5c139e9e67187ea79230ef32f03'] = 'EN LA CIUDAD';
$labels['a9ca24fa9ae5bd33b230aca623a50895'] = '¡BIENVENIDOS A LA WEB DE NUESTRA BODA!';
$labels['fdca16c1a744111fe60a44ca53fce052'] = 'ESTAMOS ILUSIONADOS DE PODER COMPARTIR ESTE DIA TAN ESPECIAL CON VOSOTROS.';
$labels['d631afbfff8965a8bead3fd821b52807'] = 'EN ESTA PÁGINA IREMOS COMPARTIENDO TODA LA INFORMACIÓN QUE NECESITAS. ¡TE ESPERAMOS EN SEVILLA!';
$labels['586cd7c00fe070c3f57d349e8f1f292b'] = 'Programa';
$labels['d8eb2c94275e8f09c3aacd79f22713d9'] = 'Ceremonia';
$labels['5b246c47428a679280068aa1f0304742'] = 'Almuerzo';
$labels['605dbb79458ca47b8d3fc8ce11d0393f'] = 'Aperitivo';
$labels['86bd1a95e7862bb61c376ba41449bb07'] = 'Fiesta';
$labels['72465cf3c4ee1ecf561ca0a20eb88ac3'] = 'LIBRO DE FIRMAS';
$labels['ebffa26d2cf883409b24b132e0ba4342'] = 'Alojamiento';
$labels['64a022f150e6f4860a7faa316d4955fd'] = 'HOTEL (5 ESTRELLAS)';
$labels['8f118c13a0ea7b7fb081935cfe84b821'] = 'HOTEL (4 ESTRELLAS)';
$labels['2aaa8b2cf59f8b92b76b970829eba460'] = 'HOTEL (BED & BREAKFAST)';
$labels['97843e300a7037df4f01603e93a05ef8'] = 'En la Ciudad...';
$labels['4c38e677222f5ae565e8d90a1c59bf37'] = 'SEVILLA, CAPITAL DEL IMPERIO ALMOHADE, AL ANDALÚS, QUE LLEGÓ A EXTENDERSE DESDE CATALUÑA HASTA LIBIA';
$labels['c971a961bbccf6746ae168c749b86571'] = 'DURANTE 8 SIGLOS, ESTA CIUDAD INTERIOR, LA ÚNICA CON PUERTO DE ESPAÑA, CONSERVA UN PATRIMONIO CULTURAL';
$labels['e1f8071b278c88aee2730c5e384f93cd'] = 'Y ARQUITECTÓNICO DE UNA RIQUEZA INCOMPARABLE SU CASCO HISTÓRICO ES EL MÁS GRANDE DE ESPAÑA Y';
$labels['da5e249e467eb96393ccbfe82a2c6eb2'] = 'UNO DE LOS MÁS GRANDES DE EUROPA, JUNTO A VENECIA Y GÉNOVA.';
$labels['8a2b0cc036d89d2efeabc2849f2a8e3e'] = 'INTO ÚTIL';
$labels['57edd23016f11728bcbc60d585d152bf'] = 'TRANSPORTE AÉREO';
$labels['34f6f1d7eb749bbbeb24e7235933dad6'] = 'El aeropuerto de Sevilla es internacional.';
$labels['6d2db852db429d439114eedd0e96152b'] = 'Vuelos directos a países como Suiza, Alemania, Francia,';
$labels['540144cc7421e4b8474b6a44ca6bb501'] = 'Italia y Reino Unido, entre otros.';
$labels['1c497f30449441c7042d76dd6477f5fe'] = 'El aeropuerto dispone de terminal de aviación privada.';
$labels['bd740c2f6f94e6e8151c343764210669'] = 'TREN';
$labels['83063e1da5c382896943333330d615bf'] = 'Renfe AVE Madrid-Sevilla: 2.5 horas. Frecuencia diaria.';
$labels['a1c6e16007b994c44e2ce1b1f9311c47'] = 'Distancia a Villa Luisa: 15 minutos.';
$labels['068b84fbefb149e932863f949ea00e78'] = 'ESTETICA';
$labels['e1e6170f59021b58c77c4496840bccbf'] = '(1 de cada, provee Laura)';
$labels['1b4b41db56ffb7255722cf280fd5ba39'] = 'Peluquería';
$labels['900c0b28e823c02a7872b65dadc9f416'] = 'Manicura';
$labels['aefa929c5e0b7f9c422c2deb59b49790'] = 'Sastre & Modista';
$labels['878e1fb26a49324688789e2f6c5c52e8'] = 'Maquillaje';
$labels['2379701788f4592b7ddd1e2e6e69585a'] = 'RESTAURANTES';
$labels['59dd201ab1d82a4ac25891791366502f'] = 'Tradicional "XXXXXXX"';
$labels['2ce0348db145eed5774f5bf4ab6dda7b'] = 'De autor "XXXXXXX"';
$labels['34d0709acfed4d41610788dd292af799'] = 'Vistas "XXXXXXX"';
$labels['2273bc717fd8e7a4ece361ed4a23d04a'] = 'IMPERDIBLES';
$labels['757232ed1919a7008ca59cb087cd9adc'] = 'Real Alcázar de Sevilla';
$labels['1018586e824f8fb9b29fc0707d21afe3'] = 'Visita uno de los palacios reales más antiguos y activos del mundo';
$labels['c39310bed69b54948ab9b10672c914c2'] = 'Patrimonio de la Humanidad por la Unesco';
$labels['efbfe3502b6415c9d82dc4ed40dca258'] = 'La Catedral de Sevilla & Giralda';
$labels['ce3f7919954d35805d490a8a3cb1e54c'] = 'Visita la catedral gótica más grande del mundo.';
$labels['0f7f6f217ae60b91c8dfce89d251c67f'] = 'El Archivo de Indias';
$labels['f8141af7fc20977362cf25fcc6be3438'] = 'Visita al edificio que centralizó toda la documentación de los';
$labels['6437465d04480eeb6e2e84e65ff98751'] = 'territorios ultramarinos españoles, tras la conquista de América.';
$labels['77d0277dacf1275bf1ce9f976bab9e72'] = 'Torre del Oro, Parque Maria Luisa y Casco antiguo';
$labels['f3028853246a7d541c44836f005c9a30'] = 'Paseo imperdible que debe hacerse a pie para disfrutarlo todo.';
$labels['07d059d93e774241e3a6612cc101b780'] = 'Calle MAteos Gago';
$labels['59f025310c7c69251e3034fa4354216d'] = 'Sus bares de ambiente auténtico sevillano, una experiencia inolvidable.';
$labels['19ec4dc487b14136cb35cbd37e38cb65'] = 'Rio Guadalquivir';
$labels['78b68d5424dd547addb9755567227755'] = 'Paseo náutico. Fue uno de los puertos más importantes del mundo';
$labels['aa08ce804f19078be4b84b280e42c699'] = 'y a donde llegaban los barcos de gran tonelaje cargados de oro, plata';
$labels['2975ebaabdf1003ebc3287c561005132'] = 'y esmeraldas de América.';
$labels['082bbe94a6f8cbbcf85325134f691bcc'] = 'Triana';
$labels['ff842c44e7d5b77f412728826eb18967'] = 'Cruzando el Guadalquivir, Triana callecitas coloridas de buen tapeo';
$labels['f35d71d1c3785c10895cab65f5fec38b'] = 'y tiendas de cerámica Tradicional';
$labels['7f9f0d78f8195b567e63e8d0641b3d0c'] = 'ENTRANTES';
$labels['220ed3753031349214305b8dff72b481'] = 'Entrante 1';
$labels['b2fb4dc272853f659b0afe50da8ddd3a'] = 'Entrante 2';
$labels['0c7608c913599607d9ebb5755321aed3'] = 'PRIMEROS';
$labels['9f7968ce8405c1db57fd033f7d1444cf'] = 'Plato 1';
$labels['05728827477978a234daf33bbbdd2061'] = 'Plato 2';
$labels['0482da10cd11e40207508f2acc398fe3'] = 'SEGUNDOS';
$labels['b3bef0e1f855dd9b62c1ef082fbb3bb9'] = 'POSTRE';
$labels['92a0c7192da7775509b6c596c27d4327'] = 'Postre 1';
$labels['d7835724cea1b427989e3b957ef013a1'] = 'Postre 2';
$labels['57ae08f140c253548fd14e6736e52285'] = 'VINOS & CHAMPAGNE';
$labels['da0b8c925be346137c71e72f6cac3551'] = 'Bodegas XXXX';
$labels['d2f5d6d7d9afd3647d21330014c85d6a'] = 'BEBIDAS SIN ALCOHOL';
$labels['2e9e7e07f5f0ad822b26f93cc0667ce3'] = 'CAFE/TE';
$labels['e50f525ed16303987ac2b7eebf9e6621'] = 'CONFIRMAR';
$labels['7844f8ee53b032b0a8fda9f2ddb86555'] = 'CONFIRMAR ASISTENCIA';
$labels['4777bbaaa0aebe104606b77947d0e22d'] = 'Nombre';
$labels['1492943afc1cb7a32f27a0392cf49921'] = 'Asistentes';
$labels['1f4a3ca12b1c9b46ba2bc70747de0603'] = 'Agree';
$labels['ba9079c57dce99db7e92d28a2a3747aa'] = 'Escribe tu mensaje';
$labels['c291164b5756538b4d93d5f32ffc93d5'] = 'LISTA DE REGALOS';
$labels['85cfdc49476d9e231dc08db2ed1fc4d4'] = 'FUNDACIÓN XXXX';
$labels['fb7a862104e991dd01f833e0c385985b'] = 'ESXX XXXX XXXX XXXX XXXX';
$labels['92eb39a1407d02c39fc0403548241472'] = 'Cerrar';
$labels['78b68d5424dd547addb9755567227755'] = 'Paseo náutico. Fue uno de los puertos más importantes del mundo';
$labels['bd362577e734989661aa1bc6bc8296de'] = 'menú';
$labels['a29ac065e918d25f614de72d9a62a2dc'] = 'Menú';
$labels['f6f941aa76089cc1a37fbd25243c3347'] = '¡NOVEDADES!';
$labels['a2188625a20cedfedad6e2374b97b21e'] = 'PASEO EN BARCO: Amigos y familia: Hemos reservado un paseo en barco por el río el día 1 de septiembre a 13 a 15hrs. Los que quieran acompañarnos. deben avisarnos antes del 15 de agosto pues el cupo es limitado e incluirá brunch de despedida SRC ariannaytomas@gmail.com o a nuestros whatsapp.';
$labels['3c89325a1e16bd6b1d9635dbe11aca52'] = 'NIÑOS: Hemos contratado dos animadoras para llevar a los niños mayores de 4 años a la "isla Mágica", un parque temático y acuático muy divertido, durante el cocktail previo a la boda la tarde del 30. El drop in/drop off será en el restaurante del cocktail. SRC indicando número de niños a ariannaytomas@gmail.com o a nuestros whatsapp.';
$labels['6fd8a3273e88a9afc3f82503f0acb5d7'] = 'Vuestros pensamientos serán un recuerdo que guardaremos para siempre ....';
$labels['5e3a6a68b8807cfd067e4f75a6643a71'] = 'El regalo más bonito para nosotros será celebrarlo con vosotros y si queréis hacernos un presente ayudamos a los que realmente lo necesitan con un gesto de amor';
$labels['fc558d1348e7938b3624cbffd7c54aea'] = '(haciendo clic en Lista de regalos solidarios)/(transferencia bancaria IT43K 02008 03284 000400543111 motivo del pago "Lista de regalos-boda Arianna y Tomas"';
$labels['81c3daa742c54ade7e26ebe97a8ec2b3'] = 'Hércules me edificó.';
$labels['f024891dd1240589f731944068f9bbaf'] = 'Julio César me cercó';
$labels['7bd627d7617ee76ac97059a570bcd713'] = 'de muros y torres altas.';
$labels['043130b2dbecab48221211ae7f14723a'] = 'Y el Rey Santo me ganó';
$labels['372298552b04393d2c940dc1652130ab'] = 'con Garci Pérez de Vargas.';
$labels['80b52e2785dbd5df6810a291494caec9'] = 'Julio César avistó por primera vez la ciudad de Sevilla –llamada en la época romana Híspalis– en el año 68 a.C., cuando vino a la península como cuestor del pretor Antistio Tuberon. Tenía 32 años y unas ambiciones ya en ciernes de poder. Julio César estuvo en Sevilla entre los años 68 y 65 a.C., cuando era cuestor —magistrado de la antigua Roma— de la provincia. En esta época, acometió algunas restauraciones como las principales murallas y sus torreones, reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro industrial de la Bética.';
$labels['cdd63c4956995198329cee736f120cb9'] = 'Julio César avistó por primera vez la ciudad de Sevilla –llamada en la época romana Híspalis– en el año 68 a.C., cuando vino a la península como cuestor del pretor Antistio';
$labels['44258993a63e2764d789b7c3060218e7'] = 'Tuberon. Tenía 32 años y unas ambiciones ya en ciernes de poder. Julio César estuvo en Sevilla entre los años 68 y 65 a.C., cuando era cuestor —magistrado de la antigua Roma—';
$labels['13e7062772e024f472f8a31be76ce30b'] = 'de la provincia. En esta época, acometió algunas restauraciones como las principales murallas y sus torreones, reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro industrial de la Bética.';
$labels['3db3482fb173174e001344ad3c557621'] = 'Julio César avistó por primera vez la ciudad de Sevilla –llamada en la época romana ';
$labels['ccff140bafee10492e74e222939318c2'] = 'Híspalis– en el año 68 a.C., cuando vino a la península como cuestor del pretor Antistio';
$labels['b83434dc91bf01f9121447f66a7a1789'] = 'Tuberon. Tenía 32 años y unas ambiciones ya en ciernes de poder. Julio César estuvo en Sevilla entre los años 68 y 65 a.C., ';
$labels['2b6c526e91ac544fa1efb078c7b864fc'] = 'cuando era cuestor —magistrado de la antigua Roma— de la provincia. En esta época, acometió algunas restauraciones como las  ';
$labels['b4e345b440428a057dd6832ad88749d1'] = 'principales murallas y sus torreones, reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro industrial de la Bética.';
$labels['0a25b821909c3ac9d6bce4c60add48b8'] = 'Tuberon. Tenía 32 años y unas ambiciones ya en ciernes de poder. ';
$labels['54ddf12187a6d934c281ef77663ea5e5'] = 'Julio César estuvo en Sevilla entre los años 68 y 65 a.C., ';
$labels['b8e9fcd42f3741bdc92cb50c67f10397'] = 'cuando era cuestor —magistrado de la antigua Roma— de la provincia. ';
$labels['87dc0b72765e7758a21fb2bdb20bebc5'] = 'En esta época, acometió algunas restauraciones como las  ';
$labels['37d4bdf5a62b221327c97027d0a9b79a'] = 'principales murallas y sus torreones, reemplazando la antigua empalizada. ';
$labels['c88a1c6b0b1023b4121864013c227874'] = 'Consiguió convertir la ciudad en un importante centro industrial de la Bética.';
$labels['a53fefc4a6c55463be39e233a1dfa5a6'] = 'Julio César avistó por primera vez la ciudad de Sevilla –llamada en la época romana Híspalis– en el año 68 a.C.,';
$labels['d4f54f1b7397c0e122e3c1b9f0c4e26a'] = 'cuando vino a la península como cuestor del pretor Antistio Tuberon.';
$labels['b436744a3e288e652800dcec092b9ded'] = 'Tenía 32 años y unas ambiciones ya en ciernes de poder. ';
$labels['fa0908dd5a304ca537227f3f4f7f774b'] = 'cuando era cuestor —magistrado de la antigua Roma— de la provincia. principales murallas y sus torreones,';
$labels['7f7e82379dab359f214bd8b2db6b1ae6'] = 'reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro industrial de la Bética.';
$labels['ccff140bafee10492e74e222939318c2'] = 'Híspalis– en el año 68 a.C., cuando vino a la península como cuestor del pretor Antistio';
$labels['8487931b03e598d8cd275ba9c316da39'] = 'Confirmar';
$labels['072859ea5e7f55b60b9e088a0cf5f9cc'] = 'Gracias por confirmar tu asistencia';
$labels['51c349c34a51770c54e029e8c6d407cf'] = 'Ha ocurrido un error';
$labels['dfb29c877f18b3372d1f4bf49610d8a2'] = 'Debes rellenar todos los campos';
$labels['285040207c135ba085de5494f8316e86'] = 'Gracias por firmar';
$labels['6dffcd04ac0399e4bf30c698f4fab1c7'] = 'Itálica, en Santiponce (Sevilla), fue la primera ciudad creada por Roma fuera de la Península ';
$labels['8483a4d1c3c650640ed95adf1f2b7cc1'] = 'Itálica y la cuna de los emperadores Trajano y Adriano, dos de los personajes principales de la ';
$labels['3727e98c2c86e7802dda994fc8caa623'] = 'historia de lo que ahora es España.';
$labels['c108b491d1d2287ac440c9965e32dba2'] = 'Calle Mateos Gago';
$labels['42655346b11c077ae27cb7cb772783ed'] = 'Hércules me edificó. Julio César me cercó de muros y torres altas. Y el Rey Santo me ganó con Garci Pérez de Vargas.';
$labels['6615fec4c09076a0402ef29a636b872d'] = 'cuando vino a la península como cuestor del pretor Antistio Tuberon. Tenía 32 años y unas ambiciones ya en ciernes ';
$labels['042caad0683afaec725210d463a5341c'] = 'de poder. Julio César estuvo en Sevilla entre los años 68 y 65 a.C., cuando era cuestor —magistrado de la antigua ';
$labels['8c969267b72610eae861f09818184efb'] = 'Roma— de la provincia. En esta época, acometió algunas restauraciones, como las principales murallas y sus ';
$labels['2bd506b86b689b5be772524c3ba573c2'] = 'torreones, reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro ';
$labels['6dd916247ede06a13e2920a5965cefbe'] = 'industrial de la Bética. Itálica, en Santiponce (Sevilla), fue la primera ciudad creada por Roma fuera de la Península ';
$labels['1837a0cc9f4b3847eb9ac00b5db9f185'] = 'Itálica y la cuna de los emperadores Trajano y Adriano, dos de los personajes principales';
$labels['dc070876a50ae495637138ca84fd05b6'] = 'de la historia de lo que ahora es España.';
$labels['5ad3486b887664efdc04a78478f07a91'] = 'PASEO EN BARCO: Amigos y familia: Hemos reservado un paseo en barco por el río el día 1 de septiembre a 13 a 15hrs. Los que quieran acompañarnos. deben avisarnos antes del 15 de agosto pues el cupo es limitado e incluirá brunch de despedida <b>SRC ariannaytomas@gmail.com o a nuestros whatsapp.</b>';
$labels['6a99c9b3bf5b0a785a4b4d8752c92984'] = 'NIÑOS: Hemos contratado dos animadoras para llevar a los niños mayores de 4 años a la "isla Mágica", un parque temático y acuático muy divertido, durante el cocktail previo a la boda la tarde del 30. El drop in/drop off será en el restaurante del cocktail. <b>SRC indicando número de niños a ariannaytomas@gmail.com o a nuestros whatsapp.</b>';
$labels['5d4257cadd8cc0b926312ad929ced4c0'] = 'Acompañantes';
$labels['289e1725ca11ead3456365b178c35dad'] = 'Apellido';
$labels['b0a7f04ada44777baef3d2495fd2990b'] = 'Alergenos';
$labels['b61541208db7fa7dba42c85224405911'] = 'Menu';
$labels['dddf0d58442ebfd809f99d05ab7c69f9'] = 'La Ciudad...';
$labels['0347999ca227a8b2700648a9186c3291'] = 'Haciendo clic en <span class="cursiva">“Lista de regalos solidarios”</span>';
$labels['0b91ca77c8f602ca69afd247ae7e3dcc'] = 'Transferencia bancaria <strong>IT43K 02008 03284 000400543111</strong>';
$labels['c1cd9ae85184c68dcfffa66e20219c15'] = 'Motivo del pago <span class="cursiva">"Lista de regalos-boda Arianna y Tomas"</span>';
$labels['30cc00aea30ec70b7c1292b6458181c0'] = 'Enviar';
