<?php
Yii::setAlias('@apps', dirname(dirname(__DIR__)). '/apps');
Yii::setAlias('@common', dirname(__DIR__));

Yii::setAlias('@frontend', Yii::getAlias('@apps'). '/frontend');
Yii::setAlias('@backend', Yii::getAlias('@apps'). '/backend');
Yii::setAlias('@console', Yii::getAlias('@apps'). '/console');

//Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
//Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
//Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
