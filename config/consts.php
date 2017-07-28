<?php

////////////////////////////////////777
// CONSTANTES DE LA APLICACION
////////////////////////////77777777777

return [
    // DOCUMENTO DE IDENTIDAD
    'doc' => [
        'default' => 1,
        'type' => [
            1 => 'DNI',
            2 => 'RUC',
            3 => 'IDCARD'
        ]
    ],
    // TIPO DE LOCALIZACION
    'location' => [
        'default' => 1,
        'type' => [
            1 => 'ALMACEN',
            /**
                Puede registra entradas y salidas
                Puede generar comprobantes
                Puede hacer costeos,
                Puede hacer requerimientos
                Puede ver requerimientos de las sucursales u otros almacenes
            */
            2 => 'SUCURSAL'
            /**
                Puede registrar salidas
                Puede hacer requerimientos
            */
        ]
    ]
];