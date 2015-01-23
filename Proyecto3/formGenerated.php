<?php
$userForm = array(
    'id'=>array(
        'label'=>null,
        'type'=>'hidden',
        'value'=>1
    ),
    'id'=>array(
        'label'=>'Nombre',
        'type'=>'text',
        // 'value'=>null,
        'placeholder'=> 'Aquí va el nombre',
        'help'=>'El nomrbreeeee!!',
        'validation'=>array('required'=>true,
                            'minsize'=>3,
                            'maxsize'=>250,
                            'error_message'=>'Error aquí'
        ),
        'filters'=>array('striptags', 'striptrim'), // para evitar en el nombre "Agustin<script>..."
        'decorators'=>array('readonly', 'class'=>'nameform')
    ),
    'id'=>array(),
    'id'=>array(),
    'id'=>array(),
    'id'=>array(),
    'id'=>array(),
);