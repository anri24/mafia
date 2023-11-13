<?php

namespace App\Enums;

enum UserRole: string
{
case CITIZEN = 'მოქალაქე';
case DOCTOR = 'ექიმი';
case DETECTIVE  = 'დეტექტივი';
case MAFIOSO = 'მაფიოზი';
case DON = 'დონი';
case KILLER = 'სერიული მკვლელი';

}
