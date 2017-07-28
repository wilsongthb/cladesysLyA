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
    // TICKET
    /**
        Esta constante y la anterior
        reemplazan a la tabla tickets, 
        por ello de ser necesario volver a
        usar la tabla, evite usar ids duplicados en las dos
    */
    'ticket' => [
        'default' => 10,
        'type' => [
            10 => 'BOLETA',
            11 => 'FACTURA'
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