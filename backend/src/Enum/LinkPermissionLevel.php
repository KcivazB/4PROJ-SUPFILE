<?php
namespace App\Enum;

enum LinkPermissionLevel: string
{
    case VIEW = 'view';
    case DOWNLOAD = 'download';
    case EDIT = 'edit';
    case UPLOAD = 'upload';
}
