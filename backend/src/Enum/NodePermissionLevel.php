<?php
namespace App\Enum;

enum NodePermissionLevel: string
{
    case VIEW = 'view';
    case EDIT = 'edit';
    case ADMIN = 'admin';
}
